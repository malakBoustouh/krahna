<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
   // protected $redirectTo = '/admin';
protected function redirectTo(){
    if(Auth::user()->usertype=='admin'){
        return '/admin';
    }
    else{
        if(Auth::user()->usertype=='specialiste'){
            return('/pagecarsspecialiste');
        }
        else{
            if(Auth::user()->usertype=='traitant'){
                return('/pagetraitant');
            }
        }


        ///pagespecialiste/diagnostics
    }
}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
