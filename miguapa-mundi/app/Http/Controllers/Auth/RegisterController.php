<?php

//Editor: Juan Felipe Pinzón 

namespace App\Http\Controllers\Auth;

use App\Enums\Nationality;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

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
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'budget' => ['required', 'numeric', 'min:0'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 0,
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'nationality' => $data['nationality'],
            'budget' => $data['budget'],
        ]);
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Miguapa Mundi';
        $viewData['nationalities'] = Nationality::$nationalities;

        return view('auth.register')->with('viewData', $viewData);
    }
}
