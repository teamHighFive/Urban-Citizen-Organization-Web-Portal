<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class urbanModel extends Model
{
    protected $table = 'urbandocs_2';
    protected $fillable = ['docName','userId','event','file'];
}
