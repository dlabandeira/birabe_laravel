<form action="{{ route('createPost') }}" method="post" id="post-form" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
    
    <!--Imagen -->
    <div class="col-xs-2">
      @include('home.profile-image', array('image' => $user['image']))
    </div>
    
    <!--Contenido -->
    <div class="col-xs-10">
      <textarea type="text" class="form-control-custom" id="post-content" name="post-content" placeholder="¿En qué estás pensando?" required ></textarea>
    </div>  
    
    <div id="preview" class="preview">
      <a id="preview-image" class="preview-item" onclick="borrarImagen('image-post')"></a>
      <a id="preview-video" class="preview-item" onclick="borrarImagen('video-post')"></a>
      <a id="preview-gif" class="preview-item" onclick="borrarImagen('gif-post')"></a>
    </div>
    
    <div class="col-xs-12 separator">
      <hr />
    </div>
    
    <!--Barra opciones -->
    <div class="col-xs-12">
      <ul class="nav nav-links">
        
        <li class="nav-item col-xs-3">
          <div class="image-upload">
            <label for="image-post">
              <i class="fas fa-camera"></i>
              <span>Foto</span>
            </label>
            <input id="image-post" name="image-post" type="file" class="input-upload" />
          </div>
        </li>

        <li class="nav-item col-xs-3 ">
          <div class="image-upload">
            <label for="video-post">
              <i class="fas fa-video"></i>
              <span>Video</span>
            </label>
            <input id="video-post" name="video-post" type="file" class="input-upload" />
          </div>
        </li>

        <li class="nav-item col-xs-3 ">
          <div class="image-upload">
            <label for="gif-post">
              <i class="fas fa-grin"></i>
              <span>Gifs</span>
            </label>
            <input id="gif-post" name="gif-post" type="file" class="input-upload" />
          </div>
        </li>

        <li class="nav-item col-xs-3 ">
          <div class="image-upload">
            <label for="tag-post">
              <i class="fas fa-id-card"></i>
              <span>Etiqueta</span>
            </label>
            <input id="tag-post" name="tag-post" type="file" />
          </div>
        </li>
        
      </ul>
    </div>
    
    <div class="col-xs-12 separator">
      <hr />
    </div>

    <div class="nav-item col-xs-12">
      <!--<span>{{ config('app.name', 'Birabe') }}</span>-->
      <input type="submit" name="" value="Publicar" class="btn btn-success pull-right" />
    </div>

</div>
</form>

