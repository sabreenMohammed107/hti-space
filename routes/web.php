<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\Prof\MaterialSubjectOfProfController;
use App\Http\Controllers\Prof\PostsOfProfController;
use App\Http\Controllers\Prof\SubjectAssignmentOfProfController;
use App\Http\Controllers\Prof\SubjectOfProfController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\ProfessorSubjectsController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentSolutionsController;
use App\Http\Controllers\StudentSubjectsController;
use App\Http\Controllers\SubjectAssignmentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectMaterialsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => ['auth', 'user-access:admin'], 'prefix' => 'admin'], function () {
// Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/home', [HomeController::class, 'adminHome'])->name('admin.home');
//general data
    Route::resource('stage', StageController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('post-type', PostTypeController::class);
// prof data
    Route::resource('professors', ProfessorsController::class);
    Route::resource('professor-subjects', ProfessorSubjectsController::class);
    Route::resource('subject-materials', SubjectMaterialsController::class);
    Route::resource('subject-assignment', SubjectAssignmentController::class);
    //student data
    Route::resource('students', StudentsController::class);
    Route::resource('student-subjects', StudentSubjectsController::class);
    Route::resource('student-solutions', StudentSolutionsController::class);
    Route::resource('posts', PostsController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['middleware' => ['auth', 'user-access:prof'], 'prefix' => 'prof'], function () {

// Route::middleware(['auth', 'user-access:prof'])->group(function () {

    Route::get('/home', [HomeController::class, 'profHome'])->name('prof.home');
    Route::resource('professor-subjects', SubjectOfProfController::class);
    Route::post('/storeDegree',[SubjectOfProfController::class, 'saveDegree'])->name('storeDegree');
    Route::resource('subject-materials', MaterialSubjectOfProfController::class);
    Route::resource('subject-assignment', SubjectAssignmentOfProfController::class);
    Route::resource('posts', PostsOfProfController::class);

});

