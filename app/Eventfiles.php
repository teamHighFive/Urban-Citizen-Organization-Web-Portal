<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventfiles extends Model
{
    protected $table='event_files';
    protected $primaryKey = 'event_id';
    public $timestamps = false;
}
