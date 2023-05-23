<?php

namespace App\Http\Controllers;

use App\Models\Student_subject;
use Illuminate\Http\Request;

class StudentSubjectsController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Student_subject $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.student-subjects.';
        $this->routeName = 'student-subjects.';
    }
    public function index()
    {
        $ids= Student_subject::orderBy("created_at", "Desc")->get();
        $rows=$ids->unique('student_id');
        // dd($diff);
        // $rows = Student_subject::whereIn('id',$ids)->orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact(['rows']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row=Student_subject::where('id',$id)->first();
        $degrees=Student_subject::where('student_id',$row->student_id)->get();
        return view($this->viewName . 'subjects', compact(['row','degrees']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
