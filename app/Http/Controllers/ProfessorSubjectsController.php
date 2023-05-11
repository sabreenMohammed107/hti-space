<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Professor_subject;
use App\Models\Subject;
use Illuminate\Http\Request;

class ProfessorSubjectsController extends Controller
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
        $this->viewName = 'admin.professor-subjects.';
        $this->routeName = 'professor-subjects.';
    }
    public function index()
    {
        $ids=Professor_subject::pluck('professor_id');
        $rows = Professor::whereIn('id',$ids)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact(['rows']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professors=Professor::all();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prof=Professor::where('id',$id)->first();
        $profSubjects=Professor_subject::where('professor_id',$id)->get();
        $professors=Professor::all();
        $subjects=Subject::all();
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
        $prof=Professor::where('id',$id)->first();
        $prof->subjects()->detach();
        return redirect()->back()->with('flash_del', 'Successfully Delete!');

    }
}
