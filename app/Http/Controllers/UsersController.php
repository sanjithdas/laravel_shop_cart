<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index(){
        
        return view('users.index')->with('users',User::all());
    }
    public function create(){
        return view('users.create');
    }
    public function makeAdmin(User $user){
        $user->role='admin';
        $user->save();
        session()->flash('success','User role changed to admin now.');
        return redirect()->back();
    }
    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }
    public function update(UpdateProfileRequest $request){
        $user = auth()->user();
        $user->name = $request->name;
        $user->about= $request->about;
        $user->update();
        session()->flash('success','User profile updated succcessfully.');
        return redirect()->back();
    }

}
