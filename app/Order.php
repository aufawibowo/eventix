<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
      'id', 'event_id', 'user_id', 'e_ticket_id'
  ];
  protected $table = 'order';
  public $timestamps = true;

  public function event(){
    return $this->belongsTo('App\Event');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function e_ticket(){
    return $this->belongsTo('App\ETicket', 'e_ticket_id');
  }
}
