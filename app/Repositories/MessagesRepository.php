<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 10:04 PM
 */

namespace App\Repositories;


use App\User;
use App\UserMessage;
use App\ScheduledNumber;
use App\ScheduledMessage;
use App\Http\Requests\SmsRequest;

class MessagesRepository
{
 /**
 * @var UserMessage
 */
 private $userMessage;


 /**
 * $message SheduledMessage instance property
 * @var ScheduledMessage
 */
 private $message;


 /**
 * $number ScheduledNumber instance
 * @var ScheduledNumber
 */
 private $number;

 /**
 * @param UserMessage $userMessage
 */
 public function __construct(UserMessage $userMessage, ScheduledMessage $message, ScheduledNumber $number)
 {
  $this->userMessage = $userMessage;
  $this->message = $message;
  $this->number = $number;
 }

 /**
 * @param $transactionId
 * @param $message
 * @param $userId
 */
 public function saveUserMessage($transactionId, $message, $userId)
 {
  $this->userMessage->transaction_id = $transactionId;
  $this->userMessage->user_id = $userId;
  $this->userMessage->message = $message;
  $this->userMessage->save();
 }

 /**
 * @return mixed
 */
 public function getAllMessages()
 {
  $id   = auth()->user()->id;
  $user = User::find($id);
  return $user->messages;
 }

 public function findTransactionMessages($id)
 {
  $userMessage = UserMessage::where('transaction_id', $id)->first();

  return $userMessage->message;

 }


 public function scheduleSms(SmsRequest $request)
 {
  $this->message->user_id   = auth()->user()->id;
  $this->message->message   = $request->get('message');
  $this->message->send_time = $request->get('date');
  $this->message->save();

  return $this->message->id;
 }


 public function saveScheduledNumber($numbers, $id)
 {
  $saved = false;
  foreach ($numbers as $number) {
    $this->number->number = $number;
    $this->number->schedule_id = $id;

    $saved = $this->number->save();
  }

  return  $saved;
 }

}
