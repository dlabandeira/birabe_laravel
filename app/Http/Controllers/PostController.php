<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;*/

use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function create(Request $request){

		$post = new Post();
		$post->description = $request->Input('post-content');
		$post->user_id = auth()->user()->id;
		$post->save();
		return redirect('/home')->with('status','Tu mensaje se ha insertado correctamente');
	}

	public function delete($id, Request $request){

		DB::table('posts')->where('id',$id)->delete();
		return redirect('/home');
	}
}
