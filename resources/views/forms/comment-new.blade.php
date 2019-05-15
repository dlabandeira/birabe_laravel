<form action="{{ route('createComment') }}" method="post" id="comment-form" class="comment-form" enctype="multipart/form-data">
  <div class="row">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="comment-post-id" value="{{ $post->id }}">
    @if(isset($comment))
      <input type="hidden" name="comment-parent-id" value="{{ $comment->id }}">
    @else
      <input type="hidden" name="comment-parent-id" value="0">
    @endif
    
    <!--Imagen -->
    <div class="col-xs-1 text-center comment-image">
      @include('home.profile-image', array('image' => auth()->user()->image))
    </div>
      
    <!--Contenido -->
    <div class="col-xs-7">
      <!--<textarea type="text" class="form-control-custom" name="comment-content" placeholder="Escribe tu comentario" required ></textarea>-->
      <input type="text" class="form-control-custom-min" name="comment-content" placeholder="Escribe tu comentario" required />
    </div>  
      
      
    <!--Barra opciones -->
    <div class="col-xs-4 pull-right">
      <ul class="nav ">
        
        <li class="nav-item col-xs-1">
          <div class="image-upload">
            <label for="image-post">
              <i class="fas fa-camera"></i>
            </label>
            <input id="image-post" name="image-post" type="file"/>
          </div>
        </li>

        <li class="nav-item col-xs-1 ">
          <div class="image-upload">
            <label for="video-post">
              <i class="fas fa-video"></i>
            </label>
            <input id="video-post" name="video-post" type="file"/>
          </div>
        </li>

        <li class="nav-item col-xs-1 ">
          <div class="image-upload">
            <label for="gif-post">
              <i class="fas fa-grin"></i>
            </label>
            <input id="gif-post" name="gif-post" type="file"/>
          </div>
        </li>

        <li class="nav-item col-xs-1 ">
          <div class="image-upload">
            <label for="tag-post">
              <i class="fas fa-id-card"></i>
            </label>
            <input id="tag-post" name="tag-post" type="file"/>
          </div>
        </li>
      
      </ul>

    </div>
  </div>
</form>