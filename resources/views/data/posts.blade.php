<? use Carbon\Carbon; ?>

<div class="post-list">
    
    <!--Imagen -->
    <div class="col-xs-2">
       @include('home.profile-image', array('image' => $post->user->image))
    </div>

    <!--Post -->
    <div class="col-xs-10 post-data">
        <?php $date = new Carbon($post->created_at) ?>
        <p class="col-xs-12">
                <a class="font-bold">{{$post->user->name}} {{$post->user->surname}}</a> compartió una publicación
        </p>
        <p class="col-xs-12">
            <span>Publicado {{ $date->diffForHumans() }}</span>

            @if( Auth::check() && ( (Auth::user()->id == $post->user->id) || (Auth::user()->role == 'admin') ) )
                <a href="{{ route('deletePost',$post->id)}} " class="pull-right" title="Borrar publicación"><i class="fas fa-trash-alt"></i></a>
                {{--<a href="{{ route('editPost',$post->id)}} " class="pull-right"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>  --}}
            @endif
        </p>
    </div>

    <div class="col-xs-12 post-item">
        
         <!--Titulo -->
        <div class="panel-post-text">{{$post->description}}</div>
        
        <!--Imagen -->
        @if ( Storage::disk('images')->has($post->image) )
            <img src="{{ route('getPostImage',$post->image) }}" class="panel-post-image" />
        @endif

        <!--Videos -->
        @if ( Storage::disk('videos')->has($post->video_path) )
            <video controls class="panel-post-image">
                <source src="{{ route('getPostVideo',$post->video_path) }}"  height="480" >Tu navegador no soporta videos</source>

            </video>
        @endif
    </div>   

    <div class="col-xs-12">
        <div class="col-xs-6 text-left">{{ $post->likes->count() }} me gusta</div>
        <div class="col-xs-6 text-right">{{ $post->comments->count() }} comentarios</div>
    </div>

    <!--Separador -->
    <div class="col-xs-12 separator">
        <hr/>
    </div>


    <!--Barra -->
    <div class="col-xs-12">
        <div class="col-xs-6 text-center">
            @if ($post->likes_user->count())
                <a href="{{ route('unlikePost',$post->id) }}"><strong>Ya no me gusta</strong></a>
            @else
                <a href="{{ route('likePost',$post->id) }}"><strong>Me gusta</strong></a>
            @endif
        </div>
        <div class="col-xs-6 text-center">
            <a href=""><strong>Comentar</strong></a>
        </div>
    </div>

    <!--Separador -->
    @if($post->comments->count() > 0)
    <div class="col-xs-12 separator">
        <hr/>
    </div>
    @endif

 </div>   