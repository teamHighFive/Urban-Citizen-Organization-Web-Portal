<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table='announcement';
    protected $primary = 'id';
    public $timestamps = false;
}
