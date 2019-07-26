<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMovie extends Model
{
  protected $fillable = [
      'id', 'cinema_id', 'film_id', 'user_id', 'waktu', 'seat', 'total'
  ];
  protected $table = 'order_movie';

  public function film(){
    return $this->belongsTo('App\Film','film_id');
  }

  public function cinema(){
    return $this->belongsTo('App\Cinema', 'cinema_id');
  }
}
