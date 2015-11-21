<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 9:01 PM
 */

namespace App\Interfaces;

use App\UserMessage;

interface UserMessagesInterface {

    public function createUserMessage(UserMessage $message);

    public function findUserMessages($id);

    public function getAll();

    public function destroyUserMessage($id, $userId);

}