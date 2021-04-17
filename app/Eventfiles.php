<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventfiles extends Model
{
    protected $table='event_files';
    protected $primary = 'id';
    public $timestamps = false;
}
