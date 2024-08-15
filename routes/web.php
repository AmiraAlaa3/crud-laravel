<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
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
})->name('home');
// lab 1
Route::get('/users',function()
{
   $users=[
    ["id"=>1,"name"=>"ayaat","age"=>24],
    ["id"=>2,"name"=>"nada","age"=>27],
    ["id"=>3,"name"=>"eman","age"=>25],
   ];
return view('usersData',["users"=>$users]);
});

Route::get('/users/{id}', function ($id) {
    $users = [
        ["id" => 1, "name" => "ayaat", "age" => 24],
        ["id" => 2, "name" => "nada", "age" => 27],
        ["id" => 3, "name" => "eman", "age" => 25],
    ];

    $user = collect($users)->firstWhere('id', $id);
    if (!$user) {
        abort(404, 'User not found');
    }

    return view('show', compact('user'));
})->name('users.show')->where('id', '[0-9]+');


// lab 2
Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');
Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/{id}', [TrackController::class, 'show'])->name('tracks.show');
Route::delete('/tracks/{id}', [TrackController::class, 'destroy'])->name('tracks.destroy');
// lab 3
Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');
//edit
Route::get('/tracks/{id}/edit',[TrackController::class,'edit'])->name('tracks.edit');
Route::put('/tracks/{id}/update',[TrackController::class,'update'])->name('tracks.update');

// student
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::get('/students',[StudentController::class,'index'])->name('students.index');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('students.destroy');
Route::post('/students/store',[StudentController::class,'store'])->name('students.store');
Route::get('/students/{id}/edit',[StudentController::class,'edit'])->name('students.edit');
Route::put('/students/{id}/update',[StudentController::class,'update'])->name('students.update');


//lab 4
Route::resource('courses',CourseController::class);
