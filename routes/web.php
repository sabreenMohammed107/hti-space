<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\ProfessorSubjectsController;
use App\Http\Controllers\StageController;
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

    Route::resource('stage', StageController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('post-type', PostTypeController::class);
    Route::resource('professors', ProfessorsController::class);
    Route::resource('professor-subjects', ProfessorSubjectsController::class);
    Route::resource('subject-materials', SubjectMaterialsController::class);
    Route::resource('subject-assignment', SubjectAssignmentController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:prof'])->group(function () {

    Route::get('/prof/home', [HomeController::class, 'profHome'])->name('prof.home');
});

