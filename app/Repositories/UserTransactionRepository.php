<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 9:11 PM
 */

namespace App\Repositories;

use App\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTransactionRepository
{
    private $transaction;

    public function __construct(UserTransaction $transaction)
    {
        $this->transaction = $transaction;
    }
    public function createUserTransaction(UserTransaction $transaction)
    {
        $transaction->save();
    }

    public function findUserTransactions($id)
    {
        return UserTransaction::find($id);
    }

    public function getAllTransactions()
    {
        return UserTransaction::all();
    }

    public function destroyUserTransaction($id, $userId)
    {
            $userTransaction = UserTransaction::where('id', '=', $id)
                ->where('user_id', '=', $userId);

            $userTransaction->delete();
    }

    public function createTransaction(Request $request)
    {
        $this->transaction->user_id = Auth::user()->id;
        $this->transaction->message_Units = $request->get('units');
        $this->transaction->receivers = implode(',', $request->get('to'));
        $this->transaction->save();

        return $this->transaction->id;
    }
}