<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug(){
        
        if(empty($model->slug)){
            static::creating(function ($model) {
                $model->slug = Str::slug($model->title);
            });    
        }
        if(empty($model->slug)){

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
 
        }

    }
}
