<?php

namespace App\Http\Controllers;

use App\Pricing;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MessagesRepository;
use App\Repositories\UserTransactionRepository;

class PagesController extends Controller
{

    private $userTransaction;
    private $messagesRepo;


    public function __construct(UserTransactionRepository $transRepo, MessagesRepository $messageRepo)
    {
        $this->userTransaction = $transRepo;
        $this->messagesRepo   = $messageRepo;
    }

    public function about()
    {
        return view('pages.about');
    }

    public function messages()
    {
        return view('pages.messages.send');
    }

    public function getMessageUnits()
    {
        $pricing = Pricing::all()->first();
        return view('pages.messages.units', compact('pricing'));
    }

    public function history()
    {
        $pricing = Pricing::all()->first();
        $transactions = $this->userTransaction->getAllTransactions();
        $repo = $this->messagesRepo;
        return view('pages.messages.message', compact('pricing', 'transactions', 'repo'));
    }
}
