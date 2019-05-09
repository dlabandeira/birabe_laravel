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

    //Relacion One To One
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    

}
