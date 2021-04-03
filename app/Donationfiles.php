<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donationfiles extends Model
{
    
    protected $table='donation_files';
    protected $primary = 'document_id';
    public $timestamps = false;
}
