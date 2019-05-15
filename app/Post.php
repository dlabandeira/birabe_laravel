<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    //Relacion One To Many
    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    public function likes(){
    	return $this->hasMany('App\Like');
    }

    public function likes_user(){
        return $this->hasMany('App\Like')->where('user_id','=', auth()->user()->id);
    }

    //Relacion One To One
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    

}
