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
    protected $redirectTo = '/dashboard'; // Default redirect to dashboard

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
            // Owner memiliki akses ke semua bagian, arahkan ke dashboard utama atau halaman khusus owner
            return redirect()->route('owner.dashboard');
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('supervisor')) {
            return redirect()->route('supervisor.dashboard');
        } elseif ($user->hasRole('kasir')) {
            return redirect()->route('kasir.dashboard');
        } elseif ($user->hasRole('gudang')) {
            return redirect()->route('gudang.dashboard');
        }

        // Default redirect jika role tidak cocok
        return redirect()->route('home');
    }
}
