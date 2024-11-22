<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\CategoryProduct;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia {
    use InteractsWithMedia, HasSEO, HasFactory;

    protected $guarded = [ 'id' ];

    public function website() : HasOne {
        return $this->hasOne( Website::class );

    }

    public function category() {
        return $this->belongsTo( Category::class );

    }

    public  static function boot() {
        parent::boot();
        
        static::creating(function($product){
            if(empty($product->slug)){
                $product->slug = Str::slug($product->title); 
            }
        });


        static::updating(function ($product) {
            $product->slug = Str::slug($product->title);
                
        });
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }


}
