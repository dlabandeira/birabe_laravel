@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('createPost') }}" method="post" id="post-form">
                        <input type="text" name="post-content" placeholder="¿En qué estás pensando?" required/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="crear" />
                    </form>

                    @foreach($posts as $post)
                        <h1>{{$post->description}}</h1>
                        <p>Creado por {{$post->user->name}} {{$post->user->surname}}</p>
                        <ul>
                            <li><a href="{{ route('deletePost',$post->id)}} ">Borrar</a></li>
                        </ul>
                        <ul>
                             @foreach($post->comments as $comment)
                                <li>
                                    <h3>{{$comment->body}}</h3>
                                    <p>{{$comment->user->name}} {{$comment->user->surname}}</p>
                                </li>

                            @endforeach
                        </ul>

                        <hr/>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
