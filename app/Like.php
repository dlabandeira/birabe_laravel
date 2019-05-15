<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    //Relacion One To Many
   /* public function posts(){
    	//return $this->hasMany('App\Post');
        return $this->belongsToMany('App\Post');
    }

     public function comments(){
    	return $this->hasMany('App\Comment');
    }

    //Relacion One To One
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }*/
}
