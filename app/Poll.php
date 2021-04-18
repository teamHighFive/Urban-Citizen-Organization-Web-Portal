<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table='polls';
    protected $fillable=['descrition', 'end_date'];

    public function options(){
         return $this->hasMany(Option::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
   }
}
