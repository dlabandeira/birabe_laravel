<?php use Carbon\Carbon; ?>

<div class="comments-panel">
     @foreach($comments as $comment)
     	<?php $date = new Carbon($comment->created_at); ?>
        <div class="comments-item">
        	<div class="col-xs-1 comment-item-image text-center">@include('home.profile-image', array('image' => $comment->user->image))</div>
             <div class="col-xs-11 comment-item-text">
        		<a href="">{{$comment->user->name}} {{$comment->user->surname}}</a>
        		<h5>{{$comment->body}}</h5>
            </div>
            <div class="col-xs-11 col-xs-offset-1 comment-item-buttons">
        		<a>Me gusta</a>
        		<a>Responder</a>	
        		<a>{{ $date->diffForHumans() }}</a>
            </div>
        </div>

    @endforeach
</div>