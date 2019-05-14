@extends('layouts.app')

@section('content')

<? use Carbon\Carbon; ?>

<div class="row">
    <div class="col-md-12 ">
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        <div class="panel-posts">

            <div class="panel-new">
                
                <div class="panel-heading">Crear publicación</div>

                <div class="panel-body">
                    

                    @include('forms.post-new', array('user'=>auth()->user()))
                </div>
            </div>

            <ul class="panel-list">
                @foreach($posts as $post)

                    <div class="panel-post">
                         <div class="row">
                            
                            <!--Imagen -->
                            <div class="col-xs-2">
                               @include('home.profile-image', array('image' => $post->user->image))
                            </div>
                            
                            <!--Post -->
                            <div class="col-xs-10">
                                <?php $date = new Carbon($post->created_at) ?>
                                <p><strong>{{$post->user->name}} {{$post->user->surname}}</strong> compartió una publicación</p>
                                <p>Publicado {{ $date->diffForHumans() }}<a href="{{ route('deletePost',$post->id)}} ">Borrar</a></p>
                            </div>

                            <div class="col-xs-12">
                                
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
                                <div class="col-xs-6 text-left">{{ $post->comments->count() }} me gusta</div>
                                <div class="col-xs-6 text-right">{{ $post->comments->count() }} comentarios</div>
                            </div>

                            <!--Separador -->
                            <div class="col-xs-12 separator">
                                <hr/>
                            </div>
                            

                            <!--Barra -->
                            <div class="col-xs-12">
                                <div class="col-xs-6 text-center">
                                    <a href="">Me gusta</a>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <a href="">Comentar</a>
                                </div>
                            </div>
                            
                            <!--Separador -->
                            @if($post->comments->count() > 0)
                            <div class="col-xs-12 separator">
                                <hr/>
                            </div>
                            @endif
                            
                            <!--Comentarios -->
                            <div class="col-xs-12">
                                @include('comments.comments', array('comments' => $post->comments))
                            </div>
                            
                            <!--Separador -->
                            <div class="col-xs-12 separator">
                                <hr/>
                            </div>

                            <!-- Crear comentario -->
                            <div class="col-xs-12">
                                @include('forms.comment-new', array(
                                                                'user'=>auth()->user(),
                                                                'post_id'=>$post->id
                                                                )
                                        )
                            </div>
                     
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </ul>
        </div>
    </div>
</div>

@endsection
