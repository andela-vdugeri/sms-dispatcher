<?php

 namespace App\Interfaces;
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 21/11/15
 * Time: 8:56 PM
 */
use App\UserPayment;

interface UserPaymentsInterface {

    public function createUserPaymentsInterface(UserPayment $payment);

    public function findUserPayments($id);

    public function findAllPayments();

    public function destroyUserPayments($id, $userId);
}