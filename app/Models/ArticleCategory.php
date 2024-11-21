<?php

namespace App\Models;

use App\Models\wArticle;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model {
    use HasSlug;

    protected $guarded = [ 'id' ];

    public function articles() {
        return $this->hasMany( Article::class );

    }
}
