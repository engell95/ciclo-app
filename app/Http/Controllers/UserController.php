<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index(){
        $users = User::latest()->get();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name'      => 'required|min:2|max:255',
            'email'     => 'required|email:rfc,dns|unique:users|max:255',
            'password'  => 'required|password:api'
        ]);

        $users = User::create([
            'name'      => $request ->name,
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        return back();
    }

    public function update(Request $request){

        $users = User::find($request ->id);
        $users->name = $request ->name;
        $users->email = $request ->email;
        $users->password = $request ->password;
        $users->save();

        return back();
    }

    public function destroy(User $user){
        $user->delete();
        return back();
    }

}
