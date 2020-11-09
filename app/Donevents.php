<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donevents extends Model
{
    protected $table = 'donevents';


    protected $fillable = ['name','description','coverimage'];
}
