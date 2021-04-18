<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';


    protected $fillable = ['title','description','coverimage'];

    public function Photos(){

        return $this->has_many('photos');
      }
}
