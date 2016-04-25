<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 9:07 PM
 */

namespace App\Repositories;

use App\User;
use App\Pricing;
use App\UserPayment;
use App\UserSubscription;

class UserRepository
{

  private $userSubscription;

  public function __construct(UserSubscription $subscription)
  {
    $this->userSubscription = $subscription;
  }

  /**
   * @param $id
   * @return mixed
   */
  public function find($id)
  {
    return User::find($id);
  }

  /**
   * @param User $user
   */
  public function update(User $user)
  {
    $user->save();
  }

  /**
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function findAll()
  {
    return User::all();
  }

  /**
   * @param $id
   */
  public function destroyUser($id)
  {
    $user = $this->find($id);

    $user->delete();
  }

  /**
   * @param $user
   * @return static
   */
  public function findBySocialIdOrCreate($user)
  {
    $authUser = User::firstOrNew(['social_id' => $user->id]);

    if(! is_null($authUser->id)) {
        return $authUser;
    }

    $authUser->name         = ($user->name)? $user->name : $user->nickname;
    $authUser->email        = ($user->email)? $user->email : "";
    $authUser->password     = bcrypt($user->id);
    $authUser->social_id    = $user->id;

    $authUser->save();

    return $authUser;
  }

  public function confirmUserpayment($id)
  {
    $payment = UserPayment::find($id);

    if($payment->status == 1) {
        return false;
    }
    $payment->status = 1;
    $payment->save();

    return $this->subscribe($payment->user_id, $payment->amount);
  }

  public function subscribe($userId, $amount)
  {
    $this->userSubscription->user_id = $userId;
    $this->userSubscription->message_units = $this->computeUnits($amount);

     return $this->userSubscription->save();

  }


  public function computeUnits($amount)
  {
    $pricing = Pricing::all()->first()->unit_price;

    return floor($amount/$pricing);
  }


  public function findSubscription()
  {
    return UserSubscription::where('user_id', auth()->user()->id)->first();
  }


  public function updateSubscription($expendedUnits)
  {
    $subscription = UserSubscription::where('user_id', auth()->user()->id)->first();

    $subscription->message_units = ($subscription->message_units - $expendedUnits);

    $subscription->save();
  }

}
