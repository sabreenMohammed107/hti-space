<?php

namespace App\Http\Controllers;

use App\Models\Assignment_solution;
use App\Models\Post;
use App\Models\Professor;
use App\Models\Professor_subject;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
