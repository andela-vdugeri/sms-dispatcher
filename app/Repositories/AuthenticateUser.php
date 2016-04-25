<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 22/11/15
 * Time: 5:24 PM
 */

namespace App\Repositories;

use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser
{

  private $socialite;
  private $auth;
  public function __construct(Socialite $socialite, Guard $auth)
  {
      $this->socialite = $socialite;
      $this->auth = $auth;
  }

  public function execute($hasCode, $listener, $provider)
  {
    if ( !$hasCode ) {
        return $this->getAuthorization($provider);
    }

    $user = $this->getSocialUser($provider);

    return $listener->userAuthenticated($user);
  }

  public function getAuthorization($provider)
  {
    return $this->socialite->driver($provider)->redirect();
  }

  public function getSocialUser($provider)
  {
    return $this->socialite->driver($provider)->user();
  }

}
