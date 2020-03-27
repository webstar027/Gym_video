<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Gym;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        if($data['role_id'] == 3){
            return Validator::make($data, [
                'first_name'=>['required','string'],
                'last_name'=>['required','string'],
                'role_id'=>['required','integer'],
                'name' => ['required', 'string', 'max:255','min:6', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        elseif($data['role_id'] == 2){
            return Validator::make($data, [
                'first_name'=>['required','string'],
                'last_name'=>['required','string'],
                'role_id'=>['required','integer'],
                'name' => ['required', 'string', 'max:255','min:6', 'unique:users'],
                'email' => ['required', 'String', 'email', 'max:255', 'unique:users'],
                // 'gym_name' => ['required','string'],
                // 'gym_address_1' => ['required','string'],
                // 'city' => ['required','string'],
                // 'state_province' => ['required','string'],
                // 'country' => ['required','string'],
                // 'zip_code' => ['required','string'],
                // 'wensite' => ['required','string'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     * @return \App\Gym
     */
    protected function create(array $data)
    {
        
            $user =  User::create([
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'name' => $data['name'],
                'email' => $data['email'],
                'role_id' => $data['role_id'],
                'password' => Hash::make($data['password']),
            ]);

            if($data['role_id'] == 2)
            {
                $gym =  Gym::create([
                    'owner_id' => $user ->id,
                    'gym_name' => $data['gym_name'],
                    'gym_address_1' => $data['gym_address_1'],
                    'gym_address_2' => $data['gym_address_2'],
                    'city' => $data['city'],
                    'state_province' => $data['state_province'],
                    'country' => $data['country'],
                    'website' => $data['website'],
                    'zip_code' => $data['zip_code']
                ]);
                
            }

            return $user;
    }
}
