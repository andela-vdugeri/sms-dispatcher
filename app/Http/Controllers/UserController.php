<?php

namespace App\Http\Controllers;

use App\Repositories\MessagesRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserTransactionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserTransactionRepository
     */
    private $userTransaction;

    /**
     * @var MessagesRepository
     */
    private $messageRepo;

    /**
     * @param UserRepository $userRepo
     * @param UserTransactionRepository $transRepo
     * @param MessagesRepository $messageRepo
     */
    public function __construct(UserRepository $userRepo, UserTransactionRepository $transRepo,
                                MessagesRepository $messageRepo)
    {
        $this->userRepository     = $userRepo;
        $this->userTransaction    = $transRepo;
        $this->messageRepo        = $messageRepo;
    }

    /**
     *
     */
    public function history()
    {
        $transactions   = $this->userTransaction->getAllTransactions();
        $messages       = $this->messageRepo->getAllMessages();

        return view('pages.messages.history', compact('transactions', 'messages'));
    }

    public function deleteHistory($id)
    {
        //$transaction =
    }
}
