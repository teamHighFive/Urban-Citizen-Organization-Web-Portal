<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationEvent extends Model
{
    protected $table = 'donation_events';
    protected $fillable = ['name','description','coverimage'];

    public function Donations(){
        return $this->has_many('donations');
    }
}
