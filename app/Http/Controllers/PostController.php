<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
/*use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
			//$image_path = time()."_".$image->getClientOriginalName();
			$image_path = time()."_".$image->getClientOriginalName();
			storage::disk('images')->put($image_path, \File::get($image));
			$post->image = $image_path;
		}

		$post->save();
		return redirect('/home')->with('status','Tu mensaje se ha insertado correctamente');
	}

	public function delete($id, Request $request){

		//DB::table('posts')->where('id',$id)->delete();
		$post = Post::find($id);
		$post->delete();
		return redirect('/home')->with('status','El mensaje se ha borrado correctamente');;
	}

	public function getPostImage($filename){
		$file =  storage::disk('images')->get($filename);
		return Response($file);
	}

	public function diffForHumans(){
		echo "tiempo";
	}
}
