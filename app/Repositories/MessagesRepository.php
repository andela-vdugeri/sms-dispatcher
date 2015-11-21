<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 10:04 PM
 */

namespace App\Repositories;


use App\UserMessage;

class MessagesRepository
{

    private $userMessage;

    public function __construct(UserMessage $userMessage)
    {
        $this->userMessage = $userMessage;
    }


    public function saveUserMessage($transactionId, $message, $userId)
    {
        $this->userMessage->transaction_id = $transactionId;
        $this->userMessage->user_id = $userId;
        $this->userMessage->message = $message;
        $this->userMessage->save();
    }

}