<?php
namespace App\Interfaces;
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 8:54 PM
 */
use App\UserTransaction;

interface UserTransactionInterface
{
    public function createUserTransaction(UserTransaction $transaction);

    public function findUserTransactions($id);

    public function getAllTransactions();

    public function destroyUserTransaction($id, $userId);
}