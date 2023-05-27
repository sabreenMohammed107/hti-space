<?php

use App\Http\Controllers\Auth\LoginController;
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
use App\Http\Controllers\Website\MainController;
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



Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::get('/web-login' , [LoginController::class , 'webLogin'])->name('web-login');
Route::get('/web-register' , [LoginController::class , 'webRegister'])->name('web-register');
Route::post('/save-user', [LoginController::class, 'saveLogin'])->name('save-user');
Route::post('/save-register', [LoginController::class, 'saveRegister'])->name('save-register');

// Route::group(['middleware' => ['auth', 'user-access:user'], 'prefix' => 'user'], function () {

Route::middleware(['auth', 'user-access:user'])->group(function () {


    Route::get('/', [MainController::class, 'index'])->name('/');
    Route::get('user/all/subjects', [MainController::class, 'subjects'])->name('user.all.subjects');
    Route::get('user/all/posts', [MainController::class, 'posts'])->name('user.all.posts');
    Route::get('user/add/comment',[MainController::class,'addComment'] )->name('add.comment');
    Route::post('user/enroll/now',[MainController::class,'enrollNow'] )->name('enroll.now');
    Route::post('user/cancel/registeration',[MainController::class,'cancelRegisteration'] )->name('cancel.registeration');
    Route::get('user/single-subject/{id}',[MainController::class, 'singleSubject'])->name('single-subject');

    Route::get('user/single-assignment/{id}',[MainController::class, 'singleAssignment'])->name('single-assignment');
    Route::post('user/upload-solution',[MainController::class,'uploadSolution'] )->name('upload-solution');
    Route::get('user/del-solution/{id}',[MainController::class, 'delSolution'])->name('del-solution');
    Route::get('user/contact', [MainController::class, 'contact'])->name('user.contact');

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
    Route::resource('all-professor-subjects', ProfessorSubjectsController::class);
    Route::resource('all-subject-materials', SubjectMaterialsController::class);
    Route::get('dynamicSubject/fetch',[SubjectMaterialsController::class,'fetchSubject'] )->name('dynamicSubject.fetch');
    Route::resource('all-subject-assignment', SubjectAssignmentController::class);
    //student data
    Route::resource('students', StudentsController::class);
    Route::resource('student-subjects', StudentSubjectsController::class);
    Route::resource('student-solutions', StudentSolutionsController::class);
    Route::resource('all-posts', PostsController::class);
    Route::get('myProfile/{id}',[HomeController::class, 'myAdminProfile'])->name('myProfile');
//saveProfile
Route::post('saveProfile',[HomeController::class, 'saveAdminProfile'])->name('saveProfile');

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
    Route::post('/solutionDegree',[SubjectAssignmentOfProfController::class, 'solutionDegree'])->name('solutionDegree');
    Route::get('editSub/{id}',[SubjectOfProfController::class, 'editSub'])->name('editSub');
    Route::get('repoSolution/{id}',[SubjectAssignmentOfProfController::class, 'repo'])->name('repoSolution');
    Route::get('profProfile/{id}',[HomeController::class, 'profProfile'])->name('profProfile');
    Route::post('saveProfProfile',[HomeController::class, 'saveProfile'])->name('saveProfProfile');

});

