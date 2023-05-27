<?php

namespace App\Http\Controllers;

use App\Models\Assignment_solution;
use App\Models\Post;
use App\Models\Professor;
use App\Models\Professor_subject;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_assignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $professors=Professor::all()->count();
        $subjects=Subject::all()->count();
        $students=Student::all()->count();
        $posts=Post::all()->count();
        $subjectsTable=Student::take(10)->get();
        $postsTable=Post::take(10)->get();
        return view('adminHome',compact('professors','subjects','students','posts','subjectsTable','postsTable'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profHome()
    {
        $professors=Professor::all()->count();
        $students=Student::all()->count();

        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        $ids = Professor_subject::where('professor_id', $profId->id)->pluck('subject_id');

        $subjectsTable = Subject::whereIn('id', $ids)->orderBy("created_at", "Desc")->get();
        $subjects=Subject::whereIn('id', $ids)->orderBy("created_at", "Desc")->get()->count();
        $posts = Post::where('professor_id',$profId->id)->orderBy("created_at", "Desc")->get()->count();

        // $subjectsTable=Student::take(10)->get();
        $postsTable=Post::take(10)->get();


        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();

        $rowsIds = Subject_assignment::where('professor_id',$profId->id)->pluck('id');
        $solutionTable=Assignment_solution::whereIn('assignment_id',$rowsIds)->take(10)->get();

        return view('profHome',compact('professors','subjects','students','posts','subjectsTable','solutionTable'));
    }

    public function myAdminProfile($id){
        $row=User::where('id',$id)->first();
        return view('admin.profile', compact(['row']));
    }

    public function profProfile($id){

$row=Professor::where('user_id',$id)->first();
return view('admin.professors.profile', compact(['row']));
    }
public function saveProfile(Request $request){

    $professor = Professor::where('id',$request->professor_id)->first();
$validator = Validator::make($request->all(), [

    'mobile' => ['required', 'min:11', 'max:11', 'regex:/(01)[0-2,5]{1}[0-9]{8}/'],
    'email' => 'required|unique:users,email,' . $professor->user_id,
    'name' => 'required',
    //    'password' => ['required', 'same:confirm-password'],
       'password' => ['required_with:confirmed', 'nullable', 'min:8'],

], [

    'mobile.required' => 'phone_required',

    'name.required' => 'name_required',

    'email.required' => 'email_required',

    'email.unique' => 'email.unique',
    'password.confirmed' =>'password_same',
            'password.min' =>'password_min',

]);
if ($validator->fails()) {

    return redirect()->back()->withInput()
        ->withErrors($validator->messages());

}
DB::beginTransaction();
try {
    // Disable foreign key checks!
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    //update user

    $input = [
        'name' => $request->get('name'),
     'email'=>$request->get('email'),
    ];

    if (!empty($request->get('password'))) {
        $input['password'] = Hash::make($request->get('password'));
    }
    $user = User::find($professor->user_id);

    $user->update($input);
    $professorList = [
        'user_id' => $user->id,
        'mobile' => $request->mobile,
        'address' => $request->address,
        'position' => $request->position,


    ];
    if ($request->hasFile('image')) {
        $attach_image = $request->file('image');

        $professorList['image'] = $this->UplaodImage($attach_image);
    }


    $professor->update($professorList);



    DB::commit();
    // Enable foreign key checks!
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    return redirect()->back()->with('flash_del', 'Successfully Update!');
    // return redirect()->route('profProfile'.$request->user_id)->with('flash_del', 'Successfully Saved!');

} catch (\Throwable $e) {
    // throw $th;
    DB::rollback();
    return redirect()->back()->withInput()->withErrors($e->getMessage());
    // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
}
}
public function saveAdminProfile(Request $request){

    $user = User::where('id',$request->user_id)->first();
$validator = Validator::make($request->all(), [

    'email' => 'required|unique:users,email,' . $user->id,
    'name' => 'required',
       'password' => ['required_with:confirmed', 'nullable', 'min:8'],

], [


    'name.required' => 'name_required',

    'email.required' => 'email_required',

    'email.unique' => 'email.unique',
    'password.confirmed' =>'password_same',
            'password.min' =>'password_min',

]);
if ($validator->fails()) {

    return redirect()->back()->withInput()
        ->withErrors($validator->messages());

}
DB::beginTransaction();
try {
    // Disable foreign key checks!
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    //update user

    $input = [
        'name' => $request->get('name'),
     'email'=>$request->get('email'),
    ];

    if (!empty($request->get('password'))) {
        $input['password'] = Hash::make($request->get('password'));
    }
    $user = User::find( $request->get('user_id'));

    $user->update($input);



    DB::commit();
    // Enable foreign key checks!
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    return redirect()->back()->with('flash_del', 'Successfully Update!');
    // return redirect()->route('profProfile'.$request->user_id)->with('flash_del', 'Successfully Saved!');

} catch (\Throwable $e) {
    // throw $th;
    DB::rollback();
    return redirect()->back()->withInput()->withErrors($e->getMessage());
    // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
}

}
}
