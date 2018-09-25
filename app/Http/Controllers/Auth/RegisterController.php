<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Profile;
use App\AccessLevel;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create() // DUPLICATE EMAILS WILL THROW EXCEPTION. ALSO, TRYING TO LOG INTO AN ACCOUNT IMMEDIATELY AFTER CREATING IT REDIRECTS TO THE REGISTER PAGE FOR SOME REASON
    {
        $user =  User::create([
            'name' => Request::input('name'),
            'email' => Request::input('email'),
            'password' => Hash::make(Request::input('password')),
        ]);
        $profile = new Profile();
        $profile->access_level_id = AccessLevel::STANDARD;
        $user->profile()->save($profile);
        $user->save();
        $user->delete();
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
    return view('auth.register');
    }

    public function register()
    {

    }
}
