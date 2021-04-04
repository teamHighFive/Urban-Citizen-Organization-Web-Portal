<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    // public function user(){
    // 	return $this->belongsTo('App\User');
    // }
    protected $table='membership_payments';
    protected $primary = 'payment_id';
}
