<x-admin-master>

    @section('content')
        <h1>Creacion</h1>

        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text">Titulo</label>
                <input type="text" name="title" 
                                   id="title"
                                   class="form-control"
                                   placeholder="Ingresa un Título">    
            </div>

            <div class="form-group">
                <label for="file">Archivo de Imagen</label>
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
                          placeholder="Ingresa el cuerpo de la publicación"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
            
        </form>
    @endsection
    
</x-admin-master>