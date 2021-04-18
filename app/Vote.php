<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table='votes';
    protected $fillable=['poll_id', 'option_id','user_id','has_voted'];

    public function poll(){
        return $this->belongsTo(Poll::class);
   } 
}
