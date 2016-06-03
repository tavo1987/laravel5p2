<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];


    protected $dates = ['last_logged_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];


    public function getFullNameAttribute(){
        return $this->first_name .' '. $this->last_name;
    }


    public function getSlugAttribute()
    {
        return str_slug($this->first_name.$this->id,'-');
    }
}
