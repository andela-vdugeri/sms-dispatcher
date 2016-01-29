<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Requests;
use App\UserTransaction;
use Illuminate\Http\Request;
use App\Http\Requests\SmsRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use GuzzleHttp\Psr7\Request as Guzzle;
use App\Repositories\MessagesRepository;
use App\Repositories\UserTransactionRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MessagesController extends Controller
{

    private $transactionsRepository;

    private $messagesRepository;

    private $userRepository;

    public function __construct(UserTransactionRepository $transactionRepository, 
        MessagesRepository $messagesRepository, UserRepository $userRepository)
    {
        $this->transactionsRepository   = $transactionRepository;
        $this->messagesRepository       = $messagesRepository;
        $this->userRepository           = $userRepository;
    }

    /**
     * Send a message and save the transaction details
     *
     * @param Request $request
     * @param Client $client
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function send(Request $request, Client $client)
    {


        //send the message
        $response = $this->sendMessage($client, $request);

        //calculate number of units to be deducted
        $units = $this->transactionsRepository->calculateUnits($this->getRequestBody($request));

        //save user transaction
        $transId = $this->transactionsRepository->createTransaction($request, $units);

        //save message details;
        $this->messagesRepository->saveUserMessage($transId, $request->get('message'), Auth::user()->id);

        return redirect()->back()->with('info', 'message sent')->withInput();
    }

    /**
     * Get the request headers
     * @return array
    */
    public function getRequestHeaders()
    {
        $user     = env('SMS_ENDPOINT_USER');
        $password = env('SMS_ENDPOINT_PASS');

        $authorization = base64_encode($user.':'.$password);

        return [
            'acccept'         => 'application/json',
            'content-type'    => 'application/json',
            'authorization'   => 'Basic '.$authorization,
        ];
    }

    /**
     * Get the body of the request.
     *
     * @param Request $request
     * @return string
    */
    public function getRequestBody(Request $request)
    {
        return json_encode([
            'from' => Auth::user()->name,
            'to'   => $this->getNumbers($request->get('numbers')),
            'text' => $request->get('message')
        ]);

    }


    /**
     * Send the actual message to the client.
     *
     * @param Client $client
     * @param $request
     * @return mixed|string
    */
    public function sendMessage(Client $client, $request)
    {

        $smsRequest = new Guzzle('POST', env('SMS_ENDPOINT'), $this->getRequestHeaders(), $this->getRequestBody($request));

        try{
            return $client->send($smsRequest);
        } catch (HttpException $e) {

            return $e->getMessage();
        }

    }

    /**
     * Get the numbers from the request
    */
    public function getNumbers($numbers)
    {
        $numberArray = explode(',', $numbers);
        $trimmedNumbers = [ ];

        foreach ($numberArray as $key => $value) {
          $trimmedNumber = trim($value);

          if ($trimmedNumber == "") {
            continue;
          }

          $trimmedNumbers[$key] = $trimmedNumber;
        }

        return $this->trimLeadingZero($trimmedNumbers);
    }


    /**
     * Append +234 to numbers (II8N)
    */
    public function addCodeToNumbers(array $numbers)
    {
        $prefixedNumbers = [];

        foreach ($numbers as $key => $value) {

          $prefixedNumbers[$key] = '+234'.$value;
        }

        return $prefixedNumbers;
    }

    /**
     * Remove leading 0 from phone numbers
    */
    public function trimLeadingZero(array $numbers)
    {
        $trimmedNumbers = [ ];

        foreach ($numbers as $key => $value) {

          if ($value[0] === 0) {

            $trimmedNumbers[$key] = substr($value, 1);
          }

          $trimmedNumbers[$key] = $value;
        }

        return $this->addCodeToNumbers($trimmedNumbers);
    }

    /**
     * Display the schedule message page
    */
    public function loadSchedulePage()
    {
        return view('pages.messages.schedule');
    }


    /**
     * schedule Sms sending
     * @param  SmsRequest $request 
     * @return 
    */
    public function scheduleSms(SmsRequest $request, MessagesRepository $repository)
    {

        if (! ($this->userRepository->findSubscription() === null) ) {

            if($this->transactionsRepository->userHasUnits($this->getExpendedUnits($request))) {

                $scheduleId = $repository->scheduleSms($request);

                $saved = $repository->saveScheduledNumber($this->getNumbers($request->get('numbers')), $scheduleId);

                if ($saved) {

                    $this->updateUserUnits($request);
                    
                    return redirect()
                        ->back()
                        ->with('info', 'Messages scheduled. Your account has beeen updated accordingly');
                }

                return redirect()->back()->with('info', 'An uknown error occured. Please try again');

            } else {

               return redirect()
                ->back()
                ->with('info', 'Sorry. You do not have sms units for this transaction.')
                ->withInput(); 
            }
            
        } else {

            return redirect()
                ->back()
                ->with('info', 'Sorry. You do not have sms units for this transaction.')
                ->withInput();
        }
        
    }


    /**
     * updateUserUnits update user subscription (units) on Sms schedule
     * @param  SmsRequest $request 
     * @return [type]              
    */
    protected function updateUserUnits(SmsRequest $request)
    {
        $numbers        = $this->getNumbers($request->get('numbers'));
        $message        = $request->get('message');

        $expendedUnits  = $this->getExpendedUnits($request);

        $this->userRepository->updateSubscription($expendedUnits);

    }

    protected function getExpendedUnits(SmsRequest $request)
    {
        return $this->transactionsRepository
                ->calculateScheduledUnits([
                    'numbers' => $this->getNumbers($request->get('numbers')),
                    'message' => $request->get('message')
                ]);
    }


}
