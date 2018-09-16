<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showUsers(){
        return view('admin.users');
    }

    public function viewUser($id){
        $user = User::findOrFail($id);
        return view('admin.user', compact('user'));
    }

    public function newUser(Request $request){
        
    }
}
