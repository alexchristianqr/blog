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

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
            if(User::where('email', $user->getEmail())->where('provider_id', $user->getId())->first()){
                $data_auth = User::where('email', $user->getEmail())->where('status', 'A')->first();
            } else {
                User::create([
                    'name'=>$user->getName(),
                    'email'=>$user->getEmail(),
                    'username'=>$user->getNickname(),
                    'provider_id'=>$user->getId(),
                    'provider_avatar'=>$user->getAvatar(),
                ]);
                $data_auth = User::where('email', $user->getEmail())->where('provider_id', $user->getId())->where('status', 'A')->first();
            }
            if ($data_auth){
                Auth::login($data_auth);
                return redirect()->to('/');
            }else{
                return redirect()->route('get.login')->with(['message' => 'este usuario no esta habilitado!, contacte con el ADMINISTRADOR.']);
            }

        } catch (Exception $e) {
            return redirect()->route('get.login')->with(['message' => $e->getMessage()]);
        }
//        dd($user,auth()->user());
        // OAuth Two Providers
//        $token = $user->token;
//        $refreshToken = $user->refreshToken; // not always provided
//        $expiresIn = $user->expiresIn;
//
//        // OAuth One Providers
//        $token = $user->token;
//        $tokenSecret = $user->tokenSecret;
//
//        // All Providers
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();
    }
}
