<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Models\ArticleCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia {
    use InteractsWithMedia, HasSlug, HasSEO;

    protected $guarded = [ 'id' ];

    public function category() {
        return $this->belongsTo( ArticleCategory::class, 'article_category_id' );
    }
}
