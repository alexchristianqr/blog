<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

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
        $this->middleware(['guest'])->except('logout');
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
                        return redirect()->back()->withInput()->withErrors(['message_failed' => ['Your session has expired because your account is deactivated.']]);
                        break;
                    default:
                        $request->session()->regenerate();
                        $this->clearLoginAttempts($request);
                        //Redirect
                        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath())->with('message_auth','Usted se ha logeado');
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

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver, Request $request)
    {
        try {
            $user = Socialite::driver($driver)->user();
            $data_auth = User::where('email', $user->getEmail())->where('provider_id', $user->getId())->first();
            if($data_auth){
                $isLogged = true;
            } else {
                if($this->storeUser($user,$driver)){
                    $isLogged = true;
                }else{
                    $isLogged  = false;
                }
            }
            if ($isLogged ){
                Auth::login(User::where('role_id',2)->where('email', $user->getEmail())->where('provider_id', $user->getId())->first());
                switch(auth()->user()->status){
                    case 'I':
                        $this->guard()->logout();
                        $request->session()->invalidate();
                        return redirect()->route('get.login')->withInput()->withErrors(['message_failed' => ['Your session has expired because your account is deactivated.']]);
                        break;
                    default:
                        $request->session()->regenerate();
                        $this->clearLoginAttempts($request);
                        //Redirect
                        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectPath())->with('message_auth','Welcome to my website');
                        break;
                }
            }
//            return redirect()->route('get.login')->withErrors(['message_failed'=>['Las credenciales ingresadas, no son válidas']]);
        } catch (Exception $e) {
            return redirect()->route('get.login')->withErrors(['message_failed' => [$e->getMessage()]]);
        }
    }

    function storeUser($user,$driver)
    {
        return User::create([
            'name'=>$user->getName(),
            'email'=>$user->getEmail(),
            'username'=>$user->getNickname(),
            'provider_id'=>$user->getId(),
            'provider_avatar'=> ($driver == 'google') ? $user->avatar_original : $user->getAvatar(),
        ]);
    }
}