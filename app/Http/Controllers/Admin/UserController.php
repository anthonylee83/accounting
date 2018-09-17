<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AccessLevel;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showUsers(){
        return view('admin.users');
    }
    
    public function viewUser($id){
        $user = User::findOrFail($id);
        return view('admin.user', compact('user'));
    }

    public function newUser(){
        $accessLevels = AccessLevel::all();
        return view('create-user', compact('accessLevels'));
    }

    public function storeUser(Request $request){
        $user = User::create($request->all());
        return redirect()->action('Admin\UserController@showUsers');
    }

    public function disableUser(Request $request){
        User::find($request->user_id);
        $user->delete();
        return redirect()->action('Admin\UserController@showUsers');
    }

    public function updateUser(Request $request){
        $user = User::fill($request->all());
        $user->save();
        return redirect()->action('Admin\UserController@showUsers');
    }

    public function activateUser(Request $request){
        $user = User::find($request->user_id);
        $user->deleted_at = null;
        $user->save();
    }
}
