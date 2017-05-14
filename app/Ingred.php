<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingred extends Model
{
        public function orders() {
            return $this->belongsToMany('App\Order')->withTimestamps();
    }
}
