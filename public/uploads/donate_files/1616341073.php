<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table='documents';
    protected $primary = 'document_id';
    public $timestamps = false;
}
