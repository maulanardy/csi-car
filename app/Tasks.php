<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tasks extends Model
{
  public function driver()
  {
      return $this->belongsTo('App\Drivers');
  }

  public function car()
  {
      return $this->belongsTo('App\Cars');
  }

  public function requestedBy()
  {
    return $this->belongsTo('App\User', 'created_by');
  }
}
