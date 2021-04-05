<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // public function user(){
    // 	return $this->belongsTo('App\Post');
    // }

    protected $table='comments';
    protected $primary = 'id';
    public $timestamps = false;
}
