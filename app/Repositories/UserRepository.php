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

class UserRepository implements UserRepositoryInterface
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

}