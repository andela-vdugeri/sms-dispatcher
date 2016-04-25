<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use App\ScheduledNumber;
use App\ScheduledMessage;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Psr7\Request as Guzzle;

class ScheduleWorker
{


	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function sendScheduledMessages()
	{
		$currDate = date('Y-m-d');

		$unsentMessages = ScheduledMessage::where('sent', '=', false)->get();

		$unsentMessages->each(function($message) use ($currDate){
			if(($message->send_time <= $currDate) && !($message->sent)) {
				$this->sendMessage($message);
			}
		});
	}



	protected function sendMessage(ScheduledMessage $message)
	{
		$smsRequest = new Guzzle('POST', env('SMS_ENDPOINT'), $this->constructHeaders(), $this->constructBody($message));

		 try{
        $this->client->send($smsRequest);

        return $this->updateMessageSentStatus($message);
        } catch (HttpException $e) {
          return $e->getMessage();
        }
	}

	public function constructHeaders()
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



	public function constructBody($message)
	{

		$messages = [];
		$count = 0;
		foreach($message->numbers as $number) {
			$messages[$count] = $number->number;
			$count++;
		}

		return json_encode([
            'from' => Auth::user()->name,
            'to'   => $messages,
            'text' => $message->message
      ]);
	}

	public function updateMessageSentStatus(ScheduledMessage $message)
	{
		$message = ScheduledMessage::find($message->id);
		$message->sent = true;
		$message->save();
	}
}
