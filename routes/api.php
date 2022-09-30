<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\DocsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (){
    return "Hello World";
});


Route::post('/product/add', function (Request $req){
     
    return User::create([
        'name'=>$req->input('name'),
        'email'=>$req->input('email'),
        'password'=>$req->input('password')    
    ]);


});

Route::apiResource('user',Usercontroller::class);

Route::post('/upload',[DocsController::class,'upload']);