<?php

namespace App\Models;

use App\Models\Website;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\CategoryProduct;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model implements HasMedia {
    use InteractsWithMedia;

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

}
