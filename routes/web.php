<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('index');
});

//Register
Route::group(['prefix'=>'register'],function (){
    Route::get('/form',[RegisterController::class,'view_register_form']);
    Route::post('/submit',[RegisterController::class,'register_form_save']);
    Route::get('/users_list',[RegisterController::class,'registerd_users_list']);
    Route::get('/user/delete/{id}',[RegisterController::class,'registerd_user_delete']);
});
