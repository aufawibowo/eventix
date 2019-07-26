<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
  protected $guarded = [''];
  protected $fillable = [
      'id', 'name', 'price'
  ];
  protected $table = 'cinemas';
}
