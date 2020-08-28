<x-admin-master>

    @section('content')
    <div>
        @if (session()->has('role-deleted'))
            <div class="alert alert-danger">
                {{session('role-deleted')}}
            </div>
        @endif
    </div>
    <h1>Roles</h1>
    <div class="row">


        <div class="col-sm-3">
        <form action="{{route('role.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control @error('name') is-invalid @enderror" >
                    <div>
                        @error('name')
                            <span><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-block"type="submit">Crear</button>
            </form>
        </div>

        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Fecha de Creación</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>{{$role->created_at}}</td>
                                <td>
                                    <form action="{{route('role.destroy',$role->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
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
        </div>
    </div>



    @endsection

</x-admin-master>
