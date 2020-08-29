<x-admin-master>

    @section('content')

    @if (session()->has('permission-updated'))
        <div class="alert alert-success">
            {{session('permission-updated')}}
        </div>

    @endif
        <h1>Editar Permiso: {{$permission->name}}</h1>

        <div class="row">


            <div class="col-sm-6">

            <form method="post" action="{{route('permissions.update', $permission->id)}}">
                @csrf
                @method('PATCH')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name"
                       class="form-control"
                       type="text"
                       name="name"
                       value="{{$permission->name}}">
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
            </div>
        </div>
    @endsection

</x-admin-master>
