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

    @endsection
</x-admin-master>
