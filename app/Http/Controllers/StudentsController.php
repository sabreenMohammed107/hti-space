<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Auth;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
class StudentsController extends Controller
{

    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Student $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.students.';
        $this->routeName = 'students.';
    }
    public function index()
    {
        $rows = Student::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact(['rows']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stages=Stage::all();
        return view($this->viewName . 'add', compact(['stages']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'mobile' => ['required', 'min:11', 'max:11', 'regex:/(01)[0-2,5]{1}[0-9]{8}/'],
            'email' => ['required', 'unique:users'],
            'name' => 'required',
            //    'password' => ['required', 'same:confirm-password'],

        ], [

            'mobile.required' => 'phone_required',

            'name.required' => 'name_required',

            'email.required' => 'email_required',
            // 'password.required' =>'password_required',
            'email.unique' => 'email.unique',
            // 'password.same' =>'password_same',

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withInput()
                ->withErrors($validator->messages());

        }
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'type' => 0,
                'password' => Hash::make('12345678'),
            ]);

            $student = new Student();
            $student->user_id = $user->id;
            if ($request->hasFile('image')) {
                $attach_image = $request->file('image');

                $student->image = $this->UplaodImage($attach_image);
            }
            $student->mobile = $request->mobile;
            $student->address = $request->address;
            $student->position = $request->position;
            $student->stage_id = $request->stage_id;
            $student->save();

            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route($this->routeName.'index')->with('flash_del', 'Successfully Saved! - Your Password is:12345678 ');

        } catch (\Throwable $e) {
            // throw $th;
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::orderBy("created_at", "Desc")->get();

        // $Company=Student::where('id',1)->first();
        $data = [
            'students' => $students,
            'Title' =>' Student Report',
            'Today' => date('Y-m-d'),
            // 'Logo'  => $Company->company_logo,
            // 'Company' => $Company,
            'User'  =>  Auth::user(),
        ];
        $pdf = PDF::loadView('admin.students.report', $data);
        $pdf->allow_charset_conversion = false;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        return $pdf->stream('student.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Student::where('id',$id)->first();
        $stages=Stage::all();
        return view($this->viewName . 'edit', compact(['row','stages']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::where('id',$id)->first();
        $validator = Validator::make($request->all(), [

            'mobile' => ['required', 'min:11', 'max:11', 'regex:/(01)[0-2,5]{1}[0-9]{8}/'],
            'email' => 'required|unique:users,email,' . $student->user_id,
            'name' => 'required',
            //    'password' => ['required', 'same:confirm-password'],

        ], [

            'mobile.required' => 'phone_required',

            'name.required' => 'name_required',

            'email.required' => 'email_required',
            // 'password.required' =>'password_required',
            'email.unique' => 'email.unique',
            // 'password.same' =>'password_same',

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


            $user = User::find($student->user_id);

            $user->update($input);
            $studentList = [
                'user_id' => $user->id,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'position' => $request->position,
                'stage_id' => $request->stage_id,


            ];
            if ($request->hasFile('image')) {
                $attach_image = $request->file('image');

                $studentList['image'] = $this->UplaodImage($attach_image);
            }


            $student->update($studentList);



            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route($this->routeName.'index')->with('flash_del', 'Successfully Saved!');

        } catch (\Throwable $e) {
            // throw $th;
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::where('id',$id)->first();

        // Delete File ..
        $file = $student->image;
        $file_name = public_path('uploads/students/' . $file);
        try {
            $user = User::find($student->user_id);

            File::delete($file_name);


           $student->delete();
           if($user){
            $user->delete();
           }
           return redirect()->back()->with('flash_del', 'Successfully Delete!');

       } catch (QueryException $q) {
           return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());
        //    return redirect()->back()->withInput()->with('flash_danger', 'Can’t delete This Row
        //    Because it related with another table');
       }
    }

     /* uplaud image
       */
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
