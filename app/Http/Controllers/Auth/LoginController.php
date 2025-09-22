<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        // Code here
        return '/admin/home';
    }

    // public function redirectTo()
    // {
    //     // User role
    //     $role = Auth::user()->role->name;

    //     // Check user role
    //     switch ($role) {
    //         case 'Manager':
    //             return '/dashboard';
    //             break;
    //         case 'Employee':
    //             return '/projects';
    //             break;
    //         default:
    //             return '/login';
    //             break;
    //     }
    // }

    // check if authenticated, then redirect to dashboard
    // protected function authenticated()
    // {
    //     if (Auth::check()) {
    //         return redirect()->route('dashboard');
    //     }
    // }

    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->role_id == 1) {
    //         return redirect('/admin');
    //     } elseif ($user->role_id == 2) {
    //         return redirect('/author');
    //     } else {
    //         return redirect('/blog');
    //     }
    // }

    // public function authenticated(Request $request, $user)
    // {
    //     switch ($user->rol) {
    //         case 'Administrator':
    //             return redirect()->route('home');
    //         case 'Docente':
    //             return redirect()->route('balance');
    //         default:
    //             return redirect()->route('profile');
    //     }
    // }
}
