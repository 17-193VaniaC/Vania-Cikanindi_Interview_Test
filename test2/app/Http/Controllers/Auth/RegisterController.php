<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'tahun_masuk' => ['required', 'int', 'max:2022' , 'min:2000'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'fungsional' => ['required', 'string'],
            'struktural'=> ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function setID(array $data){
        $NIP = '';
        $lastID = NULL;
        $NIP .= strval(substr($data['tahun_masuk'], -2));
        $NIP .= $data['fungsional'];
        $lastID = User::getLastID();
        $lastID = strval((int)substr($lastID[0]->id, 4)+1);
        $NIP.= $lastID;
        return $NIP;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'id' => $this->setID($data),
            'name' => $data['name'],
            'tahun_masuk' => $data['tahun_masuk'],
            'email' => $data['email'],
            'fungsional' => $data['fungsional'],
            'struktural'=> $data['struktural'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
