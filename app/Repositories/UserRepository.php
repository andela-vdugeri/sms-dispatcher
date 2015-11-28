<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 9:07 PM
 */

namespace App\Repositories;

use App\User;

class UserRepository
{

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

}