<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Assignment_solution;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Professor;
use App\Models\Professor_subject;
use App\Models\Stage;
use App\Models\Student;
use App\Models\Student_subject;
use App\Models\Subject;
use App\Models\Subject_assignment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class MainController extends Controller
{
    //
    public function index()
    {
        $professors = Professor::all();
        $subjects = Professor_subject::all();
        $blogs = Post::all();
        $counterProf = Professor::all()->count();
        $counterSubject = Subject::all()->count();
        $counterStud = Student::all()->count();
        $counterPost = Post::all()->count();
        return view('welcome', get_defined_vars());
    }

    public function contact(){
         return view('contact');
    }

    public function subjects()
    {
        $professors = Professor::all();
        $subjects = Professor_subject::paginate(6);
        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();

        $ids = Student_subject::where('student_id', $studId->id)->pluck('subject_id');
        $mySubjects = Student_subject::where('student_id', $studId->id)->get();

        $blogs = Post::all();

        return view('subjects', get_defined_vars());
    }

    public function posts()
    {

        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $ids = Student_subject::where('student_id', $studId->id)->pluck('subject_id');
        $blogs = Post::whereIn('subject_id', $ids)->orderBy("created_at", "Desc")->get();
        // $blogs=Post::all();
        $professors = Professor::all();
        return view('singlePost', get_defined_vars());
    }

    public function addComment(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->get('comment_text');
        $comment->post_id = $request->get('post_id');
        $comment->comment_date = Carbon::now();
        $comment->student_id = Student::where('user_id', $request->get('user_id'))->first()->id;
        $comment->save();

        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $ids = Student_subject::where('student_id', $studId->id)->pluck('subject_id');
        $blogs = Post::whereIn('subject_id', $ids)->orderBy("created_at", "Desc")->get();
        // $blogs=Post::all();
        $professors = Professor::all();
        return view('singlePost-ajax', get_defined_vars())->render();

    }
    public function addCommentSubject(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->get('comment_text');
        $comment->post_id = $request->get('post_id');
        $comment->comment_date = Carbon::now();
        $comment->student_id = Student::where('user_id', $request->get('user_id'))->first()->id;
        $comment->save();

        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $ids = Student_subject::where('student_id', $studId->id)->pluck('subject_id');
        $blogs = Post::where('subject_id', $request->get('subject_id'))->orderBy("created_at", "Desc")->get();
        // $blogs=Post::all();
        $professors = Professor::all();
        return view('singlePostSubject', get_defined_vars())->render();

    }

    public function enrollNow(Request $request)
    {
        $subject_student = new Student_subject();
        $subject_student->student_id = $request->get('student_id');
        $subject_student->subject_id = $request->get('subject_id');
        $subject_student->save();
        $professors = Professor::all();
        $subjects = Professor_subject::paginate(6);
        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $ids = Student_subject::where('student_id', $request->get('student_id'))->pluck('subject_id');
        $mySubjects = Student_subject::where('student_id', $request->get('student_id'))->get();

        $blogs = Post::all();

        return view('subject-ajax', get_defined_vars())->render();
    }

    public function cancelRegisteration(Request $request)
    {
        $subject_student = Student_subject::where('student_id', $request->get('student_id'))->
            where('subject_id', $request->get('subject_id'))->first();
        //condations of delete
        //if subject has assignments
        $subject_assignments_ids = Subject_assignment::where('subject_id', $request->get('subject_id'))->pluck('id');
        $solutions = Assignment_solution::whereIn('assignment_id', $subject_assignments_ids)->where('student_id', $request->get('student_id'))->get();
        $ids = Student_subject::where('student_id', $request->get('student_id'))->pluck('subject_id');
        $mySubjects = Student_subject::where('student_id', $request->get('student_id'))->get();
        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $blogs = Post::all();
        $professors = Professor::all();
        $subjects = Professor_subject::paginate(6);

        if (count($solutions) > 0) {
            $table_view = view('subject-ajax', get_defined_vars())->render();
            return response()->json(['succes' => false, 'table_view' => $table_view]);

        } else {

            $subject_student->delete();
            $mySubjects = Student_subject::where('student_id', $request->get('student_id'))->get();
            $studLogin = Auth::user()->id;
            $studId = Student::where('user_id', $studLogin)->first();
            $blogs = Post::all();
            $professors = Professor::all();
            $subjects = Professor_subject::paginate(6);
            $table_view = view('subject-ajax', get_defined_vars())->render();

            return response()->json(['succes' => true, 'table_view' => $table_view]);

        }
    }

    public function enrollNow1(Request $request)
    {
        $subject_student = new Student_subject();
        $subject_student->student_id = $request->get('student_id');
        $subject_student->subject_id = $request->get('subject_id');
        $subject_student->save();
        $professors = Professor::all();
        $subjects = Professor_subject::paginate(6);
        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $ids = Student_subject::where('student_id', $request->get('student_id'))->pluck('subject_id');
        $mySubjects = Student_subject::where('student_id', $request->get('student_id'))->get();
        $subject = Subject::find($request->get('subject_id'));
        $blogs = Post::all();

        return view('single-subject', get_defined_vars())->render();
    }

    public function cancelRegisteration1(Request $request)
    {

        $subject_student = Student_subject::where('student_id', $request->get('student_id'))->
            where('subject_id', $request->get('subject_id'))->first();

        $subject_assignments_ids = Subject_assignment::where('subject_id', $request->get('subject_id'))->pluck('id');
        $solutions = Assignment_solution::whereIn('assignment_id', $subject_assignments_ids)->where('student_id', $request->get('student_id'))->get();
        $ids = Student_subject::where('student_id', $request->get('student_id'))->pluck('subject_id');
        $mySubjects = Student_subject::where('student_id', $request->get('student_id'))->get();
        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $blogs = Post::all();
        $professors = Professor::all();
        $subjects = Professor_subject::paginate(6);
        $subject = Subject::find($request->get('subject_id'));
        if (count($solutions) > 0) {
            $table_view = view('subject-ajax', get_defined_vars())->render();
            return response()->json(['succes' => false, 'table_view' => $table_view]);

        } else {

            $subject_student->delete();
            $mySubjects = Student_subject::where('student_id', $request->get('student_id'))->get();
            $studLogin = Auth::user()->id;
            $studId = Student::where('user_id', $studLogin)->first();
            $blogs = Post::all();
            $professors = Professor::all();
            $subjects = Professor_subject::paginate(6);
            $table_view = view('single-subject', get_defined_vars())->render();

            return response()->json(['succes' => true, 'table_view' => $table_view]);

        }

    }
    public function singleSubject($id)
    {
        $subject = Subject::find($id);
        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $mySubjects = Student_subject::where('student_id', $studId->id)->get();
        $blogs = Post::where('subject_id', $id)->orderBy("created_at", "Desc")->get();
        return view("single-subject", get_defined_vars());
    }

    public function singleAssignment($id)
    {
        $assignment = Subject_assignment::find($id);
        $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $mySubjects = Student_subject::where('student_id', $studId->id)->get();
        $solutions = Assignment_solution::where('assignment_id', $id)->where('student_id', $studId->id)->get();
        return view("single-assignment", get_defined_vars());
    }

    public function uploadSolution(Request $request)
    {


        $solution = Assignment_solution::where('assignment_id', $request->get('assignment_id'))->where('student_id', $request->get('student_id'))->first();
        if ($solution) {

            if ($request->hasFile('attach_image')) {
                $solution->update([
                    'attach_image' => $this->UplaodImage($request->file('attach_image')),
                ]);
            }
        } else {
            $input = $request->except(['_token', 'attach_image']);
            if ($request->hasFile('attach_image')) {

                $input['attach_image'] = $this->UplaodImage($request->file('attach_image'));
            }
            $input['solution_date'] = Carbon::now()->format('Y-m-d');
            Assignment_solution::create($input);
        }
        return redirect()->back();
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
        $uploadPath = public_path('uploads/assignment_solutions');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
public function delSolution($id){
$solution=Assignment_solution::find($id);
$file = $solution->attach_image;
$file_name = public_path('uploads/assignment_solutions/' . $file);
try {
    File::delete($file_name);


   $solution->delete();
   return redirect()->back();

} catch (QueryException $q) {
   return redirect()->back()->withInput()->with('flash_danger', 'Can’t delete This Row
   Because it related with another table');
}
}

public function profile(){
    $studLogin = Auth::user()->id;
        $studId = Student::where('user_id', $studLogin)->first();
        $mySubjects = Student_subject::where('student_id', $studId->id)->get();
        $stages=Stage::all();
        return view("profile", get_defined_vars());
}


public function updateProfile(Request $request){
      $input = $request->all();
      $student = Student::where('id',$request->student_id)->first();
      $validator = Validator::make($request->all(), [

          'mobile' => ['required', 'min:11', 'max:11', 'regex:/(01)[0-2,5]{1}[0-9]{8}/'],
        //   'email' => ['required','email','regex:/(.*)hti\.edu\.eg$/i'. $request->user_id ],
        'email' => 'regex:/(.*)hti\.edu\.eg$/i|required|unique:users,email,' . $request->user_id,
          'name' => 'required',

      ], [

          'mobile.required' => 'phone_required',

          'name.required' => 'name_required',

          'email.required' => 'email_required',
          'email.unique' => 'email.unique',

      ]);
      if ($validator->fails()) {

          return redirect()->back()->withInput()
              ->withErrors($validator->messages());

      }

    DB::beginTransaction();
    try {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $user = User::find($request->user_id)->update([
            'name' => $input['name'],
            'email' => $input['email'],

        ]);
        if ($request->hasFile('password')) {
           User::find($request->user_id)->update([

                'password' => Hash::make($input['password']),
            ]);
        }
        $student = Student::where('id',$request->student_id)->first();
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


            return redirect()->back()->with('repo', "data update");


    } catch (\Throwable $e) {
        // throw $th;
        DB::rollback();
        return redirect()->back()->withInput()->withErrors($e->getMessage());
        // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
    }
}
}
