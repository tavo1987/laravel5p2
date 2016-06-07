<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Styde\Html\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.index', compact('users'));
    }
    
    public function session(User $user)
    {
        $id_admin = Auth::user()->id; 

        Auth::logout();     

        Auth::loginUsingId($user->id);

        Session::put('id_admin', $id_admin);

        Alert::message('El final está cerca');

        return redirect('/');
    }

    public function sessionAdmin($id)
    {
        Auth::loginUsingId($id);
        return redirect('/');
    }
}
