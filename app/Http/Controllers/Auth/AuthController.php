<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Role;
use Validator;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\AuthenticateUser;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = "/messages";
    protected $registerPath = "/register";
    protected $loginPath = '/login';

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var Guard
     */
    private $auth;

    /**
     * 
     * @var UserRole
     */
    private $userRole;

    /**
     * @param UserRepository $userRepository
     * @param Guard $auth
     *
     * Construct the class instance.
     */
    public function __construct(UserRepository $userRepository, Guard $auth, UserRole $userRole)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->userRepository = $userRepository;
        $this->auth = $auth;
        $this->userRole = $userRole;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * @param AuthenticateUser $authenticate
     * @param Request $request
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * Initiate the social login process.
     */
    public function doSocial(AuthenticateUser $authenticate, Request $request, $provider)
    {
        return $authenticate->execute(($request->has('code') || $request->has('oauth_token')), $this, $provider);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     *
     * Log in the user into the system.
     */
    public function userAuthenticated($user)
    {
        $authUser = $this->userRepository->findBySocialIdOrCreate($user);

        $this->auth->login($authUser);

        return redirect()->route('messages.page');
    }


}
