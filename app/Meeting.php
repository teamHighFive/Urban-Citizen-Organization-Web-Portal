<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meetings';
    protected $primaryKey = 'meeting_id';
    public $timestamps = false;
}
