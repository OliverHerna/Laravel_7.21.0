<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Role;
use App\Permission;
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

    public function edit(Role $role){
        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);
    }

    public function update(Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');

        if($role->isDirty('name')){
            session()->flash('role-updated', 'El rol fue editado correctamente');

            $role->save();
        }else{
            session()->flash('role-updated', 'No se detecto ninguna edición');
        }


        return back();
    }

    public function destroy(Role $role){
        $role->delete();
        session()->flash('role-deleted', 'El rol '. $role->name . ' ha sido eliminado');
        return back();
    }

    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
