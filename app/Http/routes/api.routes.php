<?php

use Illuminate\Support\Facades\Auth;

Route::group([ 'prefix' => 'v1'],function (){

    //this section requires api_token authentication
    Route::group(['middleware'=>'auth:api'],function(){
        Route::get('upper/{word}', function ($word) {
            return ['original' => $word,'upper'    => strtoupper($word)];
        });

        //profile api token
        Route::get('profile', function () {
            return Auth::guard('api')->user();
        });
    });
});

