<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Requests;
use App\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request as Guzzle;
use App\Repositories\MessagesRepository;
use App\Repositories\UserTransactionRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MessagesController extends Controller
{

    private $transactionsRepository;
    private $messagesRepository;

    public function __construct(UserTransactionRepository $transactionRepository, MessagesRepository $messagesRepository)
    {
        $this->transactionsRepository   = $transactionRepository;
        $this->messagesRepository       = $messagesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**Send a message and save the transaction details
     *
     * @param Request $request
     * @param Client $client
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function send(Request $request, Client $client)
    {

        if($request->ajax()){
           //send the message
           $response = $this->sendMessage($client, $request);

           //save user transaction
           $transId = $this->transactionsRepository->createTransaction($request);

            //save message details;
           $this->messagesRepository->saveUserMessage($transId, $request->get('text'), Auth::user()->id);

           return response()->json($response);
        }

        return redirect()->back();
    }

    /**
     * Get the request headers
     * @return array
     */
    public function getRequestHeaders()
    {
        $user = env('SMS_ENDPOINT_USER');
        $password = env('SMS_ENDPOINT_PASS');

        $authorization = base64_encode($user.':'.$password);

        return [
            'acccept' => 'application/json',
            'content-type' => 'application/json',
            'authorization' => 'Basic '.$authorization,
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
            'to'   => $request->get('to'),
            'text' => $request->get('text')
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

}
