<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table='submission';
    protected $primary = 'sub-file_id';
    public $timestamps = false;
}
