<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = '/dashboard'; // Default redirect to dashboard

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Cek role pengguna dan arahkan sesuai dengan role mereka
        if ($user->hasRole('owner')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('cashier')) {
            return redirect()->route('dashboard.cashier');
        } elseif ($user->hasRole('supervisor')) {
            return redirect()->route('dashboard.supervisor');
        } elseif ($user->hasRole('warehouse')) {
            return redirect()->route('dashboard.warehouse');
        } elseif ($user->hasRole('manager')) {
            return redirect()->route('dashboard.manager');
        }

        // Default redirect jika role tidak cocok
        return redirect()->route('welcome');
    }
}
