<? use Carbon\Carbon; ?>

<div class="search-list row">
    
    <!--Imagen -->
    <div class="col-xs-2 search-image">
       @include('home.profile-image', array('image' => $search->user->image))
    </div>

    <!--Post -->
    <div class="col-xs-10 search-data">
        <?php $date = new Carbon($search->created_at) ?>
        <p class="col-xs-12">
                <a class="font-bold">{{$search->user->name}} {{$search->user->surname}}</a> compartió una publicación
        </p>
        <p class="col-xs-12">
            <span>Publicado el {{ $date->format('d-m-Y') }} a las {{ $date->toTimeString() }}</span>

            @if( Auth::check() && ( (Auth::user()->id == $search->user->id) || (Auth::user()->role == 'admin') ) )
                <a href="{{ route('deletePost',$search->id)}} " class="pull-right" title="Borrar publicación"><i class="fas fa-trash-alt"></i></a>
                {{--<a href="{{ route('editPost',$search->id)}} " class="pull-right"><i class="fas fa-edit"></i>&nbsp;&nbsp;</a>  --}}
            @endif
        </p>
    </div>

    <div class="col-xs-12 search-item">
        <hr/>
         <!--Titulo -->
        <div class="search-text col-xs-9">{{(isset($search->description)) ? $search->description : $search->body}}</div>
        
        <!--Imagen -->
        @if ( Storage::disk('images')->has($search->image) )
            <img src="{{ route('getPostImage',$search->image) }}" class="search-image col-xs-3" />
        @endif

        <!--Videos -->
        @if ( Storage::disk('videos')->has($search->video_path) )
            <video controls class="search-image col-xs-3">
                <source src="{{ route('getPostVideo',$search->video_path) }}"  height="480" >Tu navegador no soporta videos</source>

            </video>
        @endif
    </div>   

 </div>   