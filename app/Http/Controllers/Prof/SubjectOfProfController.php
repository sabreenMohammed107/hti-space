<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;

use App\Models\Professor;
use App\Models\Professor_subject;
use App\Models\Student_subject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectOfProfController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Professor $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'prof.professor-subjects.';
        $this->routeName = 'professor-subjects.';
    }
    public function index()
    {
        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();
        $ids=Professor_subject::where('professor_id',$profId->id)->pluck('subject_id');

        $rows = Subject::whereIn('id',$ids)->orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact(['rows']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();
        $professors=Professor::where('id',$profId->id)->get();
        $subjects=Subject::all();
        return view($this->viewName . 'add', compact(['professors','subjects']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prof=Professor::where('id',$request->get('professor_id'))->first();
        if (!empty($request->get('subjects'))) {

            $prof->subjects()->attach($request->subjects);
            return redirect()->route($this->routeName.'index')->with('flash_del', 'Successfully Saved!  ');

        }else{
            return redirect()->back()->withInput()->with('flash_danger', 'please add subjects');

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row=Subject::where('id',$id)->first();
        return view($this->viewName . 'show', compact(['row']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row=Subject::where('id',$id)->first();
        $degrees=Student_subject::where('subject_id',$id)->get();
        return view($this->viewName . 'degree', compact(['row','degrees']));
    }

    public function editSub(string $id)
    {

        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();
        $professors=Professor::where('id',$profId->id)->get();
        $subjects=Subject::all();
        $prof=Professor::where('id',$profId->id)->first();
        $profSubjects=Professor_subject::where('professor_id',$profId->id)->get();

        return view($this->viewName . 'edit', compact(['prof','profSubjects','professors','subjects']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prof=Professor::where('id',$request->get('professor_id'))->first();
        if (!empty($request->get('subjects'))) {

            $prof->subjects()->sync($request->subjects);
            return redirect()->route($this->routeName.'index')->with('flash_del', 'Successfully Saved!  ');

        }else{
            return redirect()->back()->withInput()->with('flash_danger', 'please add subjects');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();
        $professors=Professor::where('id',$profId)->get;
        $prof=Professor::where('id',$profId)->first();
        $prof->subjects()->detach();
        return redirect()->back()->with('flash_del', 'Successfully Delete!');

    }


    public function saveDegree(Request $request){
        $count = $request->counter;
        $details = [];

        for ($i = 1; $i <= $count; $i++) {
            $row = Student_subject::where('id', $request->get('student_subjects_id'.$i))->first();

            $row->update([
                'grade_pct' =>$request->get('grade_pct'.$i),
            ]);
    }
    return redirect()->back()->with('flash_del', 'update done successfully!');

    }
}
