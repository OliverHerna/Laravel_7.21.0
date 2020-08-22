<x-admin-master>

    @section('content')
        <h1>User Profile From: {{$user->name}}  </h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <img height="50px" class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                    </div>

                    <div class="form-group">
                        <input type="file" name="" id="">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                               class="form-control"
                               name="username"
                               id="username">
                    </div>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               id="name"
                               value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                               class="form-control"
                               name="email"
                               id="email"
                               value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password"
                               class="form-control"
                               name="password"
                               id="password">
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirma tu Contraseña</label>
                        <input type="password"
                               class="form-control"
                               name="password-confirmation"
                               id="password-confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    @endsection
</x-admin-master>
