<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect(route('get.admin_dashboard'));
        }
        return view('Auth.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt([
            'admin_email' => $request->admin_email,
            'password'    => $request->admin_password,
        ])) {
            return redirect()->route('get.admin_dashboard');
        }

        return redirect()->route('get_login')->with('login_fail', trans('auth.failed'));
    }

    public function getLogout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('get_login');
        }
    }
}
