<?php

namespace App\Models;

use App\Traits\HasSlug;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use App\Models\ArticleCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia {
    use InteractsWithMedia, HasSlug, HasSEO;

    protected $guarded = [ 'id' ];

    public function category() {
        return $this->belongsTo( ArticleCategory::class, 'article_category_id' );
    }

    // public function toSitemapTag(): Url | string | array {

    //     // return route( 'detail.article', [ 'slug' => $this->slug ] );

    //     return Url::create( route( 'detail.article', [ 'slug' => $this->slug ] ) )
    //     ->setLastModificationDate( Carbon::create( $this->updated_at ) )
    //     ->setChangeFrequency( Url::CHANGE_FREQUENCY_WEEKLY )
    //     ->setPriority( 0.8 );
    // }
}
