<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Order extends Model {
    use HasUuids;

    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_PROCESSING = 'processing';
    const STATUS_CANCELED = 'canceled';

    protected $guarded = [
        'id'
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function items() {
        return $this->hasMany( OrderItem::class );
    }

}
