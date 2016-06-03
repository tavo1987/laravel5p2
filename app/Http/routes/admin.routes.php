<?php

use App\Post;
use Illuminate\Foundation\Http\Middleware\Authorize;



Route::get('dashboard',function (){
    return '<h1>Welcome to the dashboard</h1>';
});

Route::resource('posts','PostController',['parameters' => ['posts' => 'post']]);

Route::get('users','UserController@index');

Route::post('users/session/{user}','UserController@session');



/*
Route::get('posts',function (){
    return '<h1>Post List</h1>';
})->middleware(Authorize::class.':view,'.Post::class);


Route::get('posts/create',function (){
    return '<h1>Post create Form</h1>';
});


Route::post('posts',function (){
    return '<h1>Post create</h1>';
});


//WITH OPTIONAL PARAM
Route::get('post/{post?}',function (Post $post = null){
    return dd($post);
});

//Route implicit
Route::get('posts/{post}/edit',function (Post $post){
    return '<h1>Post '.$post->title.' edit</h1>';
})->middleware(Authorize::class.':edit,post');


Route::put('posts/{post}',function (){
    return '<h1>Post update</h1>';
});

Route::delete('posts/{posts}',function (){
    return '<h1>Post delete</h1>';
});
*/

