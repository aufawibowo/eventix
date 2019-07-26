<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmPicture extends Model
{
  protected $fillable = [
      'id', 'film_id', 'location'
  ];
  protected $table = 'film_picture';

  public function film(){
    return $this->belongsTo('App\Film','film_id');
  }
}
