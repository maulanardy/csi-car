<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{

  public function car()
  {
      return $this->belongsTo('App\Cars', 'default_car_id');
  }
}
