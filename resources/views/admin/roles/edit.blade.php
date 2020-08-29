<x-admin-master>

    @section('content')

    @if (session()->has('role-updated'))
        <div class="alert alert-success">
            {{session('role-updated')}}
        </div>

    @endif
    <h1>Editar Rol: {{$role->name}}</h1>
    <div class="row">


        <div class="col-sm-6">

        <form method="post" action="{{route('role.update', $role->id)}}">
            @csrf
            @method('PATCH')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input id="name"
                   class="form-control"
                   type="text"
                   name="name"
                   value="{{$role->name}}">
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
        </div>
    </div>

    <div class="row">
        @if ($permissions->isNotEmpty())


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datatables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="" id=""
                                            @foreach ($role->permissions as $role_permissions)
                                                @if ($role_permissions->slug == $permission->slug)
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                        </td>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        <td>
                                            <form method="post" action="{{route('role.permission.attach', $role->id)}}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="permission" id="permission" value="{{$permission->id}}">
                                                <button class="btn btn-primary"
                                                        @if ($role->permissions->contains($permission))
                                                            disabled
                                                        @endif
                                                >Asignar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('role.permission.detach', $role->id)}}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="permission" id="permission" value="{{$permission->id}}">
                                                <button class="btn btn-danger"
                                                        @if (!$role->permissions->contains($permission))
                                                            disabled
                                                        @endif
                                                >Desasignar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Fecha de Creación</th>
                                        <th>Attach</th>
                                        <th>Detach</th>

                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
        </div>
        @endif
    </div>

    @endsection
</x-admin-master>
