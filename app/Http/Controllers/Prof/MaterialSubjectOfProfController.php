<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Models\Professor_subject;
use App\Models\Subject;
use App\Models\Subject_material;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
class MaterialSubjectOfProfController extends Controller
{

    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Subject_material $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'prof.subject-materials.';
        $this->routeName = 'subject-materials.';
    }
    public function index()
    {
        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        $rows = Subject_material::where('professor_id', $profId->id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact(['rows']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        $ids = Professor_subject::where('professor_id', $profId->id)->pluck('subject_id');

        $subjects = Subject::whereIn('id', $ids)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'add', compact(['subjects']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        $request->validate([
            'file_path' => 'required|mimes:pdf,csv,xls,xlsx,doc,docx|max:10240',
        ]);
        $input = $request->except(['_token', 'file_path']);
        if ($request->hasFile('file_path')) {
            $attach_image = $request->file('file_path');

            $input['file_path'] = $this->UplaodImage($attach_image);

            $input['file_type_id'] = $request->file('file_path')->getClientOriginalExtension();
        }
        $input['upload_date'] = Carbon::now();
        $input['professor_id'] = $profId->id;
        Subject_material::create($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Successfully Saved!');}

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
        $row = Subject_material::where('id', $id)->first();
        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        $ids = Professor_subject::where('professor_id', $profId->id)->pluck('subject_id');

        $subjects = Subject::whereIn('id', $ids)->orderBy("created_at", "Desc")->get();
        return view($this->viewName . 'edit', compact(['row', 'subjects']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        $request->validate([
            'file_path' => 'mimes:pdf,csv,xls,xlsx,doc,docx|max:10240',
        ]);
        $input = $request->except(['_token', 'file_path']);
        if ($request->hasFile('file_path')) {
            $attach_image = $request->file('file_path');

            $input['file_path'] = $this->UplaodImage($attach_image);

            $input['file_type_id'] = $request->file('file_path')->getClientOriginalExtension();
        }
        $input['upload_date'] = Carbon::now();
        $input['professor_id'] = $profId->id;
        Subject_material::findOrFail($id)->update($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Successfully Saved!');}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $row=Subject_material::where('id',$id)->first();
        // Delete File ..
        $file = $row->file_attach;
        $file_name = public_path('uploads/subject_materials/' . $file);
        try {
            File::delete($file_name);


           $row->delete();
           return redirect()->back()->with('flash_del', 'Successfully Delete!');

       } catch (QueryException $q) {
           // return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());
           return redirect()->back()->withInput()->with('flash_danger', 'Can’t delete This Row
           Because it related with another table');
       }
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
        $uploadPath = public_path('uploads/subject_materials');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
