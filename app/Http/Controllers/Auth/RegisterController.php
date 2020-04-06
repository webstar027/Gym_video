<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Gym;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Requests\RegisterUserRequest;
use App\Services\GymService;

class RegisterController extends Controller
{
    protected $gymRepo;

    
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
    public function __construct(GymRepository $gymRepo)
    {
        $this->gymRepo = $gymRepo;
        $this->middleware('guest');
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
                'username' => $data['username'],
                'email' => $data['email'],
                'role_id' => $data['role_id'],
                'password' => Hash::make($data['password']),
            ]);

            if($data['role_id'] == 2)
            {
                $gym = $this->gymRepo->create($data);
               //  $gym =  Gym::create([
               //     'owner_id' => $user ->id,
               //     'gym_name' => $data['gym_name'],
               //     'gym_address_1' => $data['gym_address_1'],
               //     'gym_address_2' => $data['gym_address_2'],
               //     'city' => $data['city'],
               //     'state_province' => $data['state_province'],
               //     'country' => $data['country'],
               //     'website' => $data['website'],
               //     'zip_code' => $data['zip_code']
               // ]);
               // */
                
            }

            return $user;
    }

    public function register(RegisterUserRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
