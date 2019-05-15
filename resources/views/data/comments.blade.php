<?php use Carbon\Carbon; ?>

<div class="comments-panel">

     @foreach($post->comments as $comment)
		
		@if(!$comment->comment_id)
	     	<?php $date = new Carbon($comment->created_at); ?>
	        <div class="comments-item">
	        	<div class="col-xs-1 comment-item-image text-center">@include('home.profile-image', array('image' => $comment->user->image))</div>
	             <div class="col-xs-11 comment-item-text">
	        		<a href="">{{$comment->user->name}} {{$comment->user->surname}}</a>
	        		<h5>{{$comment->body}}</h5>
	            </div>
	            <div class="col-xs-11 col-xs-offset-1 comment-item-buttons">
	        		<a>Me gusta</a>
	        		<span>-</span>
	        		<a onclick="javascript:mostrar('responder_comment_{{$comment->id}}')">Responder</a>
	        		<span>-</span>
	        		<span class="publish">Publicado {{ $date->diffForHumans() }}</span>
	            </div>

				<div class="col-xs-12 comment-item-new" id="responder_comment_{{$comment->id}}">
					@include('forms.comment-new')
	            </div>
				
	            @include('data.comments-child')

	        </div>
		@endif
    @endforeach
</div>