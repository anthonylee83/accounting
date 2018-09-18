<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AccessLevel;
use App\Profile;
use App\User;
use DB;
use App\Http\Requests\NewUserRequest;

class UserController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function showUsers(){
        $users = User::paginate(15);
        return view('admin.users', compact('users'));
    }
    
    public function viewUser($id){
        $user = User::findOrFail($id);
        return view('admin.user', compact('user'));
    }

    public function newUser(){
        $accessLevels = AccessLevel::all();
        return view('admin.create-user', compact('accessLevels'));
    }

    public function storeUser(NewUserRequest $request){
        
        DB::beginTransaction();
        
            $user = User::create($request->all());
            $profile = Profile::create(
                [
                    'access_level_id' => $request->access_level_id,
                    'user_id' => $user->id
                ]
            );
        
        DB::commit();
        
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
