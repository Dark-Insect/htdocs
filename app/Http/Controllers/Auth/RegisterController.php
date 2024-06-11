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
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return route('admin.member.index'); // Redirect to admin dashboard
        } else {
            return route('user.dashboard'); // Redirect to user dashboard
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        // Redirect any requests directly to the registration page to a 404 page
        $this->middleware(function ($request, $next) {
            if ($request->is('register')) {
                abort(405);
            }
            return $next($request);
        });
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'role' => ['required']
        ]);
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'role' => $data['role'],
            'is_active' => 1
        ]);
    }
}


//--------------------------------the following section is shorthand logic above---------------------------------------------------------


// <?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class RegisterController extends Controller
// {

//     |--------------------------------------------------------------------------
//     | Register Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles the registration of new users as well as their
//     | validation and creation. By default, this controller uses a trait to
//     | provide this functionality without requiring any additional code.
//     |


//     use RegistersUsers;


//      * Create a new controller instance.
//      *
//      * @return void

//     public function __construct()
//     {
//         $this->middleware('guest');

//          Redirect any requests directly to the registration page to a 404 page
//         $this->middleware(function ($request, $next) {
//             if ($request->is('register')) {
//                 abort(404);
//             }
//             return $next($request);
//         });
//     }
// }
