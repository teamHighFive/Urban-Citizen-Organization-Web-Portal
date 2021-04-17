<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conf_files extends Model
{
    //protected $table='conf_files';
    //protected $fillable=['document_name','location','description','created_by','event','p_member','p_visitor','file','type'];
    
    protected $table='conf_files';
    protected $primary = 'id';
    public $timestamps = false;
}
