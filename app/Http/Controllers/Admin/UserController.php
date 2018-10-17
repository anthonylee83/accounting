<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AccessLevel;
use App\Profile;
use App\User;
use DB;
use Hash;
use App\Http\Requests\NewUserRequest;
use App\EventLog;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function showUsers(Request $request, $deleted = false)
    {
        $user = '';
        if ($deleted === false) {
            $users = User::paginate(15);
        } else {

            $users = User::withTrashed()->paginate(15);
        }
        $path = $request->path();
        return view('admin.users', compact('users', 'path'));
    }

    public function viewUser($id)
    {
        $user         = User::withTrashed()->findOrFail($id);
        $accessLevels = AccessLevel::all();
        return view('admin.view-user', compact('user', 'accessLevels'));
    }

    public function newUser()
    {
        $accessLevels = AccessLevel::all();
        return view('admin.create-user', compact('accessLevels'));
    }


    public function storeUser(NewUserRequest $request){
        
        DB::beginTransaction();
        
            $user = User::create($request->all());
            $user->password = Hash::make($request->password);
            $user->save();
            $profile = Profile::create(
                [
                    'access_level_id' => $request->access_level_id,
                    'user_id' => $user->id
                ]
            );
        
        DB::commit();
		EventLog::create([
		'email'       =>  session('email'),
		'action' => "Created New User: {$user->email}"
		]);
        
        return redirect()->action('Admin\UserController@showUsers');
    }

    public function disableUser(Request $request){
        $user = User::find($request->id);
		EventLog::create([
		'email'       =>  session('email'),
	'action' => "Deactivated user: {$user->email}"
		]);
        $user->delete();
        return redirect()->action('Admin\UserController@showUsers');
    }


    public function updateUser(Request $request){
        $user = User::find($request->id);
		$oldname = $user->name;
		$oldemail = $user->email;
		$oldlevel = $user->profile->access_level_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->access_level_id = $request->access_level_id;
        if($request->has('password'))
            $user->password = Hash::make($request->password);
        $user->save();
        $user->profile->save();
		if($user->name !== $oldname)
			EventLog::create([
			'email'       =>  session('email'),
			'action' => "Updated {$user->email} Name: {$oldname} to {$user->name}"
			]);
		if($user->email !== $oldemail)
			EventLog::create([
			'email'       =>  session('email'),
			'action' => "Updated User's Email: {$oldemail} to {$user->email}"
			]);
		if($user->profile->access_level_id !== $oldlevel)
			EventLog::create([
			'email'       =>  session('email'),
			'action' => "Updated {$user->email} Access Level: {$oldlevel} to {$user->profile->access_level_id}"
			]);
        return redirect()->action('Admin\UserController@showUsers');
    }

    public function activateUser(Request $request){
        $user = User::withTrashed()->find($request->id);
        $user->restore();
		EventLog::create([
		'email'       =>  session('email'),
		'action' => "Activated User: {$user->email}"
		]);
        return redirect()->action('Admin\UserController@showUsers');
    }
}
