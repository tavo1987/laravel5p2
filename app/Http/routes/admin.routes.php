<?php

use App\Post;
use Illuminate\Foundation\Http\Middleware\Authorize;

Route::bind('post',function($post){
    $post =  new Post();
    $post->title = 'Example title';
    return $post;
});

Route::get('dashboard',function (){
    return '<h1>Welcome to the dashboard</h1>';
});


Route::get('posts',function (){
    return '<h1>Post List</h1>';
})->middleware(Authorize::class.':view,'.Post::class);


Route::get('posts/create',function (){
    return '<h1>Post create Form</h1>';
});


Route::post('posts',function (){
    return '<h1>Post create</h1>';
});

Route::get('posts/{post}/edit',function ($post){
    return '<h1>Post '.$post->title.' edit</h1>';
})->middleware(Authorize::class.':edit,post');


Route::put('posts/{post}',function (){
    return '<h1>Post update</h1>';
});

Route::delete('posts/{posts}',function (){
    return '<h1>Post delete</h1>';
});


