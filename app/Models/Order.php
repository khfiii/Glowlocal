<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_PROCESSING = 'processing';
    const STATUS_CANCELED = 'canceled';

    protected $guarded = [
        'id'
    ];

    public function orderItems() {
        return $this->hasMany( OrderItem::class );
    }
}
