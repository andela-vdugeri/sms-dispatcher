<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 9:07 PM
 */

namespace App\Repositories;

use App\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository
{

    public function find($id)
    {
        return User::find($id);
    }

    public function update(User $user)
    {
        $user->save();
    }

    public function findAll()
    {
        return User::all();
    }

    public function destroyUser($id)
    {
        $user = $this->find($id);

        $user->delete();
    }

    public function findBySocialIdOrCreate($user)
    {
        $authUser = User::firstOrNew(['social_id' => $user->id]);

        if(! is_null($authUser->id)) {
            return $authUser;
        }

        $authUser->name = ($user->name)? $user->name : $user->nickname;
        $authUser->email = ($user->email)? $user->email : "";
        $authUser->password = bcrypt($user->id);
        $authUser->social_id = $user->id;

        $authUser->save();

        return $authUser;
    }

}