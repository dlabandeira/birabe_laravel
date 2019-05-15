<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use \App\Like;

class CommentController extends Controller
{
    //Metodos
    public function create(Request $request){
    	
    	$comment = new Comment();
		$comment->body = $request->Input('comment-content');
		$comment->post_id = $request->Input('comment-post-id');
		$comment->comment_id = $request->Input('comment-parent-id');
		$comment->user_id = auth()->user()->id;

		//Subir el archivo
		/*$image = $request->file('image-post');
		if($image){
			$image_tmp = $image->getClientOriginalName();
			$extension = explode('.',$image_tmp);
			$image_path = "i".time().time().".".$extension[1];
			storage::disk('images')->put($image_path, \File::get($image));
			$post->image = $image_path;
		}

		//Subir el video
		$video = $request->file('video-post');
		if($video){
			$video_tmp = $video->getClientOriginalName();
			$extension = explode('.',$video_tmp);
			$video_path = "v".time().time().".".$extension[1];
			storage::disk('videos')->put($video_path, \File::get($video));
			$post->video_path = $video_path;
		}*/

		$comment->save();
		return redirect('/home')->with('status','Tu comentario se ha insertado correctamente');
    }

    public function like($id){

		$registro = new Like();
		$registro->user_id = auth()->user()->id;
		$registro->post_id = "0";
		$registro->comment_id = $id;
		$registro->status = "0";
		$registro->save();
		return redirect('/home');

	}

	public function unlike($id){
		$registro = Like::where('comment_id', $id)->first();
		$registro->delete();
		return redirect('/home');
	}
}
