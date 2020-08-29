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
                                    <th>Borrar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        <td><button class="btn btn-danger">Borrar</button></td>
                                    </tr>
                                    @endforeach

                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Fecha de Creación</th>
                                        <th>Borrar</th>
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
