<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PLTDPMUnit;
use App\Models\PLTDUnit;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function auth(Request $r){
        if (Auth::attempt(['email' => $r->email, 'password' => $r->password])) {
            return ['res' => 0, 'auth' => Auth::user()];
        }else{
            return ['res' => 1, 'auth' => null,];
        }
    }

    public function unit(){
        $unit = PLTDUnit::all();
        return compact('unit');
    }

    public function pltdPmUnit(){
        $unit = PLTDPMUnit::all();
        return compact('unit');
    }
}
