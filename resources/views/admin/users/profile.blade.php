<x-admin-master>

    @section('content')
        <h1>User Profile From: {{$user->name}}  </h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <img height="100px" class="img-profile rounded-circle" src="{{$user->avatar}}">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar" id="avatar">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                               class="form-control {{$errors->has('username') ? 'is-invalid': ''}}"
                               name="username"
                               id="username"
                               value="{{$user->username}}">

                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text"
                               class="form-control {{$errors->has('name') ? 'is-invalid': ''}}"
                               name="name"
                               id="name"
                               value="{{$user->name}}">

                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               class="form-control {{$errors->has('email') ? 'is-invalid': ''}}"
                               name="email"
                               id="email"
                               value="{{$user->email}}">

                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password"
                               class="form-control"
                               name="password"
                               id="password">

                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label for="password-confirmation">Confirma tu Contraseña</label>
                        <input type="password"
                               class="form-control"
                               name="password-confirmation"
                               id="password-confirmation">

                        @error('password-confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <br>

        @if (auth()->user()->userHasRole('Admin'))

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
                                    <th>Asignar</th>
                                    <th>Desasignar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="" id=""
                                            @foreach ($user->roles as $user_role)
                                                @if ($user_role->slug == $role->slug)
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                        </td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form method="post" action="{{route('user.role.attach', $user->id)}}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" id="role" value="{{$role->id}}">
                                                <button class="btn btn-primary">Asignar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('user.role.dettach', $user->id)}}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="role" id="role" value="{{$role->id}}">
                                                <button class="btn btn-danger">Desasignar</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach

                                <tfoot>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Slug</th>
                                        <th>Asignar</th>
                                        <th>Desasignar</th>
                                    </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
        </div>

        @endif

    @endsection
</x-admin-master>
