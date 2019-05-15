@extends('layouts.app')

@section('content')

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
                            
                            <!--Posts -->
                            @include('data.posts')
                            
                            <!--Comentarios -->
                            <div class="col-xs-12">
                                @include('data.comments')
                            </div>
                            
                            <!--Separador -->
                            <div class="col-xs-12 separator">
                                <hr/>
                            </div>

                            <!-- Crear comentario -->
                            <div class="col-xs-12">
                                @include('forms.comment-new', array(
                                                                'user'=>auth()->user(),
                                                                'post_id'=>$post->id,
                                                                'comment_id'=> '0'
                                                                )
                                        )
                            </div>
                     
                        </div>
                    </div>
                @endforeach
                
                <!--Paginador -->
                {{ $posts->links() }}
            </ul>
        </div>
    </div>
</div>

@endsection
