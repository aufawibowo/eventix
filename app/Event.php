<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
      'id', 'type', 'name', 'date1', 'date2', 'quota', 'description',
      'owner', 'price', 'sport_type', 'city', 'approved', 'deleted'
  ];
  protected $table = 'event';
  public $timestamps = false;

  public function orders(){
    return $this->hasMany('App\Order');
  }

  public function pictures(){
    return $this->hasMany('App\EventPicture');
  }
}
