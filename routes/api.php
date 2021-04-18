<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as Register;
use App\Http\Controllers\ClassroomController as Classroom;
use App\Http\Controllers\StundetController as Student;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['student']], function () {

    Route::get('st', [Register::class, 'dashbord']);
});
Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [Register::class, 'dashboard'])->name('dsh');
});
Route::post('register', [Register::class, 'register']);
Route::post("login", [Register::class, 'login']);

Route::get('showStudentes', [Student::class, "show_details"]);
Route::get('classroom', [Classroom::class, 'CreateClassroom']);
