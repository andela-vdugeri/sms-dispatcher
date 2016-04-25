<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 9:11 PM
 */

namespace App\Repositories;

use DB;
use App\User;
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
    $id = auth()->user()->id;
    $user = User::find($id);

    return $user->transactions;
  }

  public function destroyUserTransaction($id, $userId)
  {
    $userTransaction = UserTransaction::where('id', '=', $id)
        ->where('user_id', '=', $userId);

    $userTransaction->delete();
  }

  public function createTransaction(Request $request, $units)
  {
    $this->transaction->user_id = Auth::user()->id;
    $this->transaction->message_units = $units;
    $this->transaction->receivers = $request->get('numbers');
    $this->transaction->save();

    return $this->transaction->id;
  }

  public function calculateUnits($requestBody)
  {
    $data             = json_decode($requestBody);
    $messageLength    = strlen($data->text);
    $numbers          = count($data->to);
    $numberOfMessages = ceil($messageLength/160);
    $units            =  $numberOfMessages * $numbers;

    return $units;
  }


  public function calculateScheduledUnits($data)
  {
    $messageLength = strlen($data['message']);
    $numbers = count($data['numbers']);
    $numberOfMessages = ceil($messageLength/160);
    $units = $numberOfMessages * $numbers;

    return $units;
  }

  public function userHasUnits($expendedUnits)
  {
    $availableUnits = DB::table('user_subscription')
                        ->where('user_id', auth()->user()->id)
                        ->first()
                        ->message_units;

    return ($availableUnits - $expendedUnits) >= 0 ;

  }

}
