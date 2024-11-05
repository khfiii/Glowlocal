<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteDetail extends Model {

    protected $guarded = [ 'id' ];

    protected function casts(): array {
        return [
            'data' => 'array',
            'pagesHtml' => 'array',
        ];
    }

    public function user() {
        return $this->belongsTo( User::class );
    }

}
