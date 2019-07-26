<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ETicket extends Model
{
    protected $table = 'e-ticket';

    protected $fillable = [
        'user_id'
    ];

    public function orders(){
      return $this->hasMany('App\Order');

    }

    public function user(){
      return $this->belongsTo('App\User');
    }
}
