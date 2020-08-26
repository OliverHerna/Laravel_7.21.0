<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    public function show(User $user){
        return view('admin.users.profile', ['user'=>$user]);
    }

    public function update(User $user){

        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    public function destroy(User $user){

        $user->delete();
        session()->flash('user-deleted','El usuario ha sido dado de baja del sistema');
        return back();


    }

}

