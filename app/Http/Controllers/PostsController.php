<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use File;
use Illuminate\Database\QueryException;
class PostsController extends Controller
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
        $this->viewName = 'admin.posts.';
        $this->routeName = 'all-posts.';
    }
    public function index()
    {
        $rows = Post::orderBy("created_at", "Desc")->get();

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
        $row = post::where('id',$id)->first();
        return view($this->viewName . 'show', compact(['row']));
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
        $row = Post::where('id', $id)->first();
        // Delete File ..
        $file = $row->image;
        $file_name = public_path('uploads/post/' . $file);
        try {
            File::delete($file_name);

            $row->comments()->delete();
           $row->delete();
           return redirect()->back()->with('flash_del', 'Successfully Delete!');

       } catch (QueryException $q) {
           // return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());
           return redirect()->back()->withInput()->with('flash_danger', 'Can’t delete This Row
           Because it related with another table');
       }
    }
}
