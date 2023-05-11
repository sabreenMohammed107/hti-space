<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Subject;
use App\Models\Subject_assignment;
use App\Models\Subject_material;
use Illuminate\Http\Request;

class SubjectAssignmentController extends Controller
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
        $this->viewName = 'admin.subject-assignment.';
        $this->routeName = 'subject-assignment.';
    }
    public function index()
    {
        $rows = Subject_assignment::orderBy("created_at", "Desc")->get();

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
        $request->validate([
            'file_attach' => 'required',
        ]);
        $input = $request->except(['_token','file_attach','image']);
        if ($request->hasFile('file_attach')) {
            $attach_image = $request->file('file_attach');

            $input['file_attach'] = $this->UplaodFile($attach_image);

        }
        if ($request->hasFile('image')) {
            $attach_image2 = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image2);

        }
        Subject_assignment::create($input);
        return redirect()->route($this->routeName.'index')->with('flash_success', 'Successfully Saved!');    }


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
        $row=Subject_assignment::where('id',$id)->first();
        $professors=Professor::all();
        $subjects=Subject::all();
        return view($this->viewName . 'edit', compact(['row','professors','subjects']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'file_attach' => 'mimes:pdf,csv,xls,xlsx,doc,docx|max:2048',
        ]);
        $input = $request->except(['_token','file_attach','image']);
        if ($request->hasFile('file_attach')) {
            $attach_image = $request->file('file_attach');

            $input['file_attach'] = $this->UplaodFile($attach_image);

        }
        if ($request->hasFile('image')) {
            $attach_image2 = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image2);

        }
        Subject_assignment::findOrFail($id)->update($input);
        return redirect()->route($this->routeName.'index')->with('flash_success', 'Successfully Saved!');    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        // $ext = $file->getClientOriginalExtension();
        // $size = $file->getSize();
        // $path = $file->getRealPath();
        // $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/subject_assignments');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }


    public function UplaodFile($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        // $ext = $file->getClientOriginalExtension();
        // $size = $file->getSize();
        // $path = $file->getRealPath();
        // $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/subject_assignments');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
