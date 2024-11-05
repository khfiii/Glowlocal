<?php

namespace App\Models;

use App\Models\Product;
use App\Models\WebsiteDetail;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Website extends Model {

    protected $guarded = [ 'id' ];

    public function detail() {
        return $this->hasOne( WebsiteDetail::class );

    }

    public function product():BelongsTo {
        return $this->belongsTo( Product::class );

    }

}
