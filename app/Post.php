<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('category_id', 'name', 'content', 'file');

    public function post(){
        return $this -> belongsTo('App\Category');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
