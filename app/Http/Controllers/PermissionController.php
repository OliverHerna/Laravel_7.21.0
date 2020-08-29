<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.permissions.index',[
            'permissions'=>Permission::all()
        ]);
    }

    public function store(){
        request()->validate([
            'name' => ['required']
        ]);

        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')

        ]);
        return back();
    }

    public function edit(Permission $permission){
        return view('admin.permissions.edit',['permission'=>$permission]);
    }

    public function update(Permission $permission){
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');

        if($permission->isDirty('name')){
            session()->flash('permission-updated', 'El permiso fue editado correctamente');

            $permission->save();
        }else{
            session()->flash('permission-updated', 'No se detecto ninguna edición');
        }


        return back();
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return back();
    }
}
