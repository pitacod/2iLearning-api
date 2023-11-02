<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/instructors/{id}',[UserController::class,'show']);
Route::get('/instructors',[UserController::class,'index']);
Route::get('/courses',[CourseController::class,'index']);
Route::get('/courses/{id}',[CourseController::class,'show']);
Route::post('/courses/add',[CourseController::class,'store'])->middleware("auth:sanctum");
Route::post('/login',[LoginController::class,'login']);
Route::post('/contact',function(Request $request){
    $data = $request->validate([
        'fullname'=>['required','min:3'],
        'email'=>['required','email'],
        'subject'=>['required'],
        'message'=>['required']
    ]);

    $res = Contact::create($data);
    return ['message'=>'ok'];


});
