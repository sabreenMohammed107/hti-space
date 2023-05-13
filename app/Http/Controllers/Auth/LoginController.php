<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function login(Request $request)
    {
        $input = $request->all();

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        $validator =  Validator::make($input, [

            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if ($validator->fails()) {

            return redirect()->back()->withInput()
                ->withErrors($validator->messages());

        }
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.home');
            }else if (auth()->user()->type == 'prof') {
                return redirect()->route('prof.home');
            }else{
                return redirect()->route('login');
            }
        }else{
            // return "ff";
            // return redirect()->route('login')->withInput()
            // ->withErrors('Email-Address And Password Are Wrong.');
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }

    public function logout(Request $request)
    {
        if (auth()->user()->type == 'admin') {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            // return redirect('manager.home');
            return redirect()->route('admin.home');
        } else if (auth()->user()->type == 'prof') {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            // return redirect('manager.home');
            return redirect()->route('prof.home');
        } else {
            return redirect('/');
        }
    }
    protected function authenticated(Request $request, $user)
    {
        if (auth()->user()->type == 'admin') {
            $redirect = 'admin.home';
        } else if (auth()->user()->type == 'prof') {
            $redirect = 'prof.home';
        } else {
            // return redirect()->route('home');
            $redirect = '/';
        }
        return redirect($redirect);
    }
}
