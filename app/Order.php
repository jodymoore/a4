<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
	{
	    # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
	    return $this->belongsToMany('App\Product')->withTimestamps();
	}


	public function user() {
		# order belongs to User
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\User');
	}
}
