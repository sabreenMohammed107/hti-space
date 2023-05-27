<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
            }


            else{
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

    public function saveLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'user') {
                return redirect()->to('/');

            }else{
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                return redirect('/web-login')->withErrors('error','Email-Address And Password Are Wrong.');
            }
        }else{
            return redirect('/web-login')->with('msg', 'Email-Address And Password Are Wrong.');
        }
    }

public function saveRegister(Request $request){
    $input = $request->all();

    $this->validate($request, [
        'email' => 'required|email|regex:/(.*)hti\.edu\.eg$/i',
        'password' => 'required|min:8|confirmed',
        'name' => 'required',
    ],
[
    'email.regex'=>'email must be example@hti.edu.eg'
]);
    DB::beginTransaction();
    try {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
   $user= User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'type' => 0,
        'password' => Hash::make($input['password']),
    ]);
    $student = new Student();
    $student->user_id = $user->id;
    if ($request->hasFile('image')) {
        $attach_image = $request->file('image');

        $student->image = $this->UplaodImage($attach_image);
    }
    $student->mobile = $request->mobile;
    $student->stage_id = $request->stage_id;
    $student->save();

    DB::commit();
    // Enable foreign key checks!
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    if(auth()->attempt(array('email' => $input['email'], 'password' =>$input['password'])))
    {
        if (auth()->user()->type == 'user') {

             return redirect()->to('/');

        }else{

            Auth::guard('web')->logout();
            $request->session()->invalidate();
             return redirect()->route(('web.login'))->withErrors('error','Email-Address And Password Are Wrong.');
        }
    }else{

     return redirect()->back()->with('msg', 'Email-Address And Password Are Wrong.');
    }

} catch (\Throwable $e) {
    // throw $th;
    DB::rollback();
    return redirect()->back()->withInput()->withErrors($e->getMessage());
    // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
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
        }
        else if (auth()->user()->type == 'user') {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            return redirect()->route('/');
        }
         else {

            return redirect('/web-login');
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
            return redirect('/web-login');
        }
        return redirect('/web-login');
    }

    //site login
    public function webLogin(){
        return view('auth.webLogin');
    }

    public function webRegister(){
        $stages=Stage::all();
        return view('auth.webRegister',compact('stages'));
    }

    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/students');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
