<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
/*use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;*/

use App\Post;
use App\Comment;
use Storage;
use Response;

class PostController extends Controller
{
    public function create(Request $request){

		$post = new Post();
		$post->description = $request->Input('post-content');
		$post->user_id = auth()->user()->id;

		//Subir el archivo
		$image = $request->file('image-post');
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
		}

		$post->save();
		return redirect('/home')->with('status','Tu mensaje se ha insertado correctamente');
	}

	public function delete($id, Request $request){

		//DB::table('posts')->where('id',$id)->delete();

		//Borro los comentarios asociados al post
		$comments = DB::table('comments')->where('post_id',$id)->delete();

		//Preparo el post
		$post = Post::find($id);

		//Borro la imagen si la tiene
		if(storage::disk('images')->has($post->image)){
			storage::disk('images')->delete($post->image);
		}

		//Borro la imagen si la tiene
		if(storage::disk('videos')->has($post->video_path)){
			storage::disk('videos')->delete($post->video_path);
		}

		//Elimino el registro en la base de datos
		$post->delete();

		//Muestro de nuevo el listado
		return redirect('/home')->with('status','El mensaje se ha borrado correctamente');;
	}

	public function getPostImage($filename){
		$file =  storage::disk('images')->get($filename);
		return Response($file);
	}

	public function getPostVideo($filename){
		$file =  storage::disk('videos')->get($filename);
		return Response($file);
	}

}
