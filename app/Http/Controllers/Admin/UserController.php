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

    public function storeUser(NewUserRequest $request)
    {
        DB::beginTransaction();

        $user           = User::create($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        $profile = Profile::create(
            [
                'access_level_id' => $request->access_level_id,
                'user_id'         => $user->id
            ]
        );

        DB::commit();

        return redirect()->action('Admin\UserController@showUsers');
    }

    public function disableUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->action('Admin\UserController@showUsers');
    }

    public function updateUser(Request $request)
    {
        $user                           = User::find($request->id);
        $user->name                     = $request->name;
        $user->email                    = $request->email;
        $user->profile->access_level_id = $request->access_level_id;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->profile->save();
        return redirect()->action('Admin\UserController@showUsers');
    }

    public function activateUser(Request $request)
    {
        $user = User::withTrashed()->find($request->id);
        $user->restore();
        return redirect()->action('Admin\UserController@showUsers');
    }
}
