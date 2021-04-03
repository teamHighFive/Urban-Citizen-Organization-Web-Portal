<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    protected $table='posts';
    protected $primary = 'id';
    public $timestamps = false;
}
