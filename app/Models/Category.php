<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [ 'id' ];

    public function products() {
        return $this->HasMany( Product::class );
    }

    public  static function boot() {
        parent::boot();
        
        static::creating(function($category){
            if(empty($category->slug)){
                $category->slug = Str::slug($category->name); 
            }
        });


        static::saving(function ($category) {
                    if (empty($category->slug) || $category->iswDirty('name')) {
                        $category->slug = Str::slug($category->name);
                    }
                });
    }
}
