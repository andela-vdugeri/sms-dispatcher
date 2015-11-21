<?php
namespace App\Interfaces;
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 8:52 PM
 */
use App\User;

interface UserRepositoryInterface
{
    public function find($id);

    public function update(User $user);

    public function findAll();

    public function destroyUser($id);

}