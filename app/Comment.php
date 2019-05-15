<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //Relacion One To One
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

   public function likes(){
        return $this->hasMany('App\Like');
    }

    public function likes_user(){
        return $this->hasMany('App\Like')->where('user_id','=', auth()->user()->id);
    }

    public function comments(){
    	return $this->hasMany('App\Comment','comment_id')->orderBy('id','asc');
    }


}