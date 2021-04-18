<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table='options';
    protected $fillable=['option_name', 'poll_id', 'votes'];

    public function poll(){
         return $this->belongsTo(Poll::class);
    } 
}
