<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest', 'web'])->except('logout');
    }

    public function getLogin()
    {
        return view('pages.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $rememberme = $request->has('remember') ? true : false;
        if($this->guard()->attempt($credentials, $rememberme)){
            if(auth()->once($credentials)){
                switch(auth()->user()->status){
                    case 'I':
                        $this->guard()->logout();
                        $request->session()->invalidate();
                        return redirect()->back()->withInput()->withErrors('Your session has expired because your account is deactivated.');
                        break;
                    default:
                        $request->session()->regenerate();
                        $this->clearLoginAttempts($request);
                        //Redirect
                        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath())->with('logged_id','Usted se ha logeado');
                        break;
                }
            }
        }
        return redirect()->route('get.login')->withInput($credentials)->withErrors(['error_login'=>'Las credenciales ingresadas, no son válidas']);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('get.login');
    }

}
