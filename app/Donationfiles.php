<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donationfiles extends Model
{
    
    protected $table='donation_files';
    protected $primary = 'id';
    public $timestamps = false;
}
