<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
  protected $guarded = [''];
  protected $fillable = [
      'id', 'name', 'genre', 'duration', 'director', 'description', 'status'
  ];
  protected $table = 'films';

  public function picture(){
    return $this->hasOne('App\FilmPicture','film_id','id');
  }
}
