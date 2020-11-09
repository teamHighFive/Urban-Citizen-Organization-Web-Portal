<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table = 'Albums';


    protected $fillable = ['title','description','coverimage'];
}
