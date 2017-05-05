<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function products()
	{
	    # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
	    return $this->belongsToMany('App\Products')->withTimestamps();
	}
}
