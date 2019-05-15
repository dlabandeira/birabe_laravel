<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use Response;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(3);
        
        $comments = Comment::all();

        return view('home',array(
            'posts'=>$posts,
            'comments' => $comments
        ));
    }

    public function getUserImage($filename){

       $file =  Storage::disk('profiles')->get($filename);
       return Response($file);
    }

    public function search(Request $request){

        $posts = Post::where("description", "LIKE", "%{$request->get('search-text')}%")->get();
        $comments = Comment::where("body", "LIKE", "%{$request->input('search-text')}%")->get();
        return view('data.buscador',array(
            'results_posts' => $posts, 
            'results_comments' => $comments,          
        ));
    }
}
