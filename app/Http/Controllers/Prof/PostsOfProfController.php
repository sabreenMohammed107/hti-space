<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Post_type;
use App\Models\Professor;
use App\Models\Professor_subject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Database\QueryException;

class PostsOfProfController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Post $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'prof.posts.';
        $this->routeName = 'posts.';
    }
    public function index()
    {
        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();

        $rows = Post::where('professor_id',$profId->id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact(['rows']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();
        $ids=Professor_subject::where('professor_id',$profId->id)->pluck('subject_id');
        $subjects = Subject::whereIn('id',$ids)->orderBy("created_at", "Desc")->get();
        $types=Post_type::all();
        return view($this->viewName . 'add', compact(['subjects','types']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        // $request->validate([
        //     'image' => 'required',
        // ]);
        $input = $request->except(['_token', 'image']);
        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image);

        }
        $input['professor_id'] = $profId->id;
        Post::create($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Successfully Saved!');}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = post::where('id',$id)->first();
        return view($this->viewName . 'show', compact(['row']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = post::where('id',$id)->first();
        $profLogin=Auth::user()->id;
        $profId=Professor::where('user_id',$profLogin)->first();
        $ids=Professor_subject::where('professor_id',$profId->id)->pluck('subject_id');
        $subjects = Subject::whereIn('id',$ids)->orderBy("created_at", "Desc")->get();
        $types=Post_type::all();
        return view($this->viewName . 'edit', compact(['row','subjects','types']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profLogin = Auth::user()->id;
        $profId = Professor::where('user_id', $profLogin)->first();
        // $request->validate([
        //     'image' => 'required',
        // ]);
        $input = $request->except(['_token', 'image']);
        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image);

        }
        $input['professor_id'] = $profId->id;
        Post::findOrFail($id)->update($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Successfully Saved!');}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Post::where('id', $id)->first();
         // Delete File ..
         $file = $row->image;
         $file_name = public_path('uploads/post/' . $file);
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
        $uploadPath = public_path('uploads/posts');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
