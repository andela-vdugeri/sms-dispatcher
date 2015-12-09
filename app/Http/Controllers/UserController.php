<?php

namespace App\Http\Controllers;

use App\UserMessage;
use App\Http\Requests;
use App\UserTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\MessagesRepository;
use App\Repositories\UserTransactionRepository;


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
        $repo = $this->messageRepo;
        return view('pages.messages.history', compact('transactions', 'repo'));
    }

    public function deleteHistory($id)
    {
        $transaction = UserTransaction::find($id);

        if( !(auth()->user()->id == $transaction->user->id)) {
            return redirect()->action('HomeController@index');
        }

        $userMessages = UserMessage::where('transaction_id', $transaction->id);
        $userMessages->delete();

        $transaction->delete();

        return redirect()->back();
    }
}