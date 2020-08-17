<x-admin-master>

    @section('content')
        <h1>Editar Publicación</h1>

        <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="text">Titulo</label>
                <input type="text" name="title"
                                   id="title"
                                   class="form-control"
                                   placeholder="Ingresa un Título"
                                   value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="file">Archivo de Imagen</label>
                <div><img height="150px" src="{{$post->post_image}}"></div>
                <br>
                <input type="file" name="post_image"
                                   class="form-control-file"
                                   id="post_image">
            </div>

            <div class="form-group">
                <textarea name="body"
                          id="body"
                          class="form-control"
                          cols="30"
                          rows="10"
                          placeholder="Ingresa el cuerpo de la publicación">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>

        </form>
    @endsection

</x-admin-master>
