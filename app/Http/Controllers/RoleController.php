<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Role;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::all();;
        return view('admin.roles.index',['roles'=>$roles]);
    }

    public function store(){

        request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => request('name'),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')

        ]);
        return back();
    }

    public function destroy(Role $role){
        $role->delete();
        session()->flash('role-deleted', 'El rol '. $role->name . ' ha sido eliminado');
        return back();
    }
}
