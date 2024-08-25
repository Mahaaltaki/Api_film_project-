<?php

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/user/{id}',function(string $id){
//  return new UserResource(User::findOrFail($id));
// });
// Route::get('/users',function(){
//     return UserResource::collection(User::all());
//    });

//    Route::get('/users',function(){
//     return new UserResource(User::all());
//    });