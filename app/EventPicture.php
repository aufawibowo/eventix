<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPicture extends Model
{
  protected $fillable = [
      'id', 'event_id', 'location'
  ];
  protected $table = 'event_picture';

  public function event(){
    return $this->belongsTo('App\Event');
  }
}
