<form action="{{ route('createPost') }}" method="post" id="post-form" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
    
    <!--Imagen -->
    <div class="col-xs-2">
      @include('home.profile-image', array('image' => $user['image']))
    </div>
    
    <!--Contenido -->
    <div class="col-xs-10">
      <input type="text" class="form-control-custom" name="post-content" placeholder="¿En qué estás pensando?" required/>
    </div>  
    
    <!--Barra opciones -->
    <div class="col-xs-12">
      <ul class="nav ">
        
        <li class="nav-item col-xs-3 ">
          <div class="image-upload">
            <label for="image-post">
              <span class="glyphicon glyphicon-search"></span>
              <span>Foto/Video</span>
            </label>

            <input id="image-post" name="image-post" type="file"/>
          </div>
        </li>
        
        <!--<li class="nav-item col-xs-3">
          <div class="image-upload">
            <label for="file-input">
              <img src="http://files.softicons.com/download/toolbar-icons/mono-general-icons-3-by-custom-icon-design/png/256x256/camera.png" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
              <span>Foto/Video</span>
            </label>

            <input id="video" name="video" type="file"/>
          </div>
        </li>
        
        <li class="nav-item col-xs-3">
          <i class="glyphicon glyphicon-eye-open"></i>
          <div class="image-upload">
            <label for="file-input">
              <img src="http://files.softicons.com/download/toolbar-icons/mono-general-icons-3-by-custom-icon-design/png/256x256/camera.png" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
              <span>Foto/Video</span>
            </label>

            <input id="name-input" name="name-input" type="file"/>
          </div>
        </li>
        
        <li class="nav-item col-xs-3">
          <div class="image-upload">
            <label for="file-input">
              <img src="http://files.softicons.com/download/toolbar-icons/mono-general-icons-3-by-custom-icon-design/png/256x256/camera.png" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
              <span>Foto/Video</span>
            </label>

            <input id="name1-input" name="name1-input" type="file"/>
          </div>
        </li>-->
      
      </ul>
    </div>
</div>
</form>