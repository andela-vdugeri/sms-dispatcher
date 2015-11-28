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

class MessagesRepository
{
    /**
     * @var UserMessage
     */
    private $userMessage;

    /**
     * @param UserMessage $userMessage
     */
    public function __construct(UserMessage $userMessage)
    {
        $this->userMessage = $userMessage;
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
        $id = auth()->user()->id;
        $user = User::find($id);
        return $user->messages;
    }

}