<?php

namespace App\Models;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    protected $guarded = [ 'id' ];

    public function items() {
        return $this->hasMany( CartItem::class );
    }
}
