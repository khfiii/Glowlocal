<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    protected $guarded = [ 'id' ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function product() {
        return $this->belongsTo( Product::class );

    }

    public function order() {
        return $this->hasOne( Order::class, 'user_id', 'user_id' );
    }

}
