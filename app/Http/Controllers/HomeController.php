<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
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
        $posts = Post::all()->sortByDesc("id");

        return view('home',array(
            'posts'=>$posts
        ));
    }

    public function getUserImage($filename){

       $file =  Storage::disk('profiles')->get($filename);
       return Response($file);
    }
}
