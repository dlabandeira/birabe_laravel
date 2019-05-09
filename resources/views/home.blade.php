@extends('layouts.app')

@section('content')

<? use Carbon\Carbon; ?>

<div class="row">
    <div class="col-md-12 ">
        <div class="panel-posts">

            <div class="panel-new">
                
                <div class="panel-heading">Crear publicación</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                <!--<ul>
                                    <li></li>
                                </ul>-->
                            </div>

                             <div class="col-xs-12">
                                
                                 <!--Titulo -->
                                <h4>{{$post->description}}</h4>
                                
                                <!--Imagen -->
                                @if ( Storage::disk('images')->has($post->image) )
                                    <img src="{{ route('getPostImage',$post->image) }}" class="panel-post-image">
                                @endif
                                
                                <!--Barra -->
                                <hr/>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 text-center">
                                        <a href="">Me gusta</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="">Comentar</a>
                                    </div>
                                </div>
                                <hr/>

                                <!--Comentarios -->
                                <div class="col-xs-12">
                                    <ul class="panel-comments">
                                         @foreach($post->comments as $comment)
                                            <li>
                                                <h5>{{$comment->body}}</h5>
                                                <p>{{$comment->user->name}} {{$comment->user->surname}}</p>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
