<?php

namespace App\Album;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';


    protected $fillable = ['title','description','coverimage'];
}
