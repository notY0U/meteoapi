<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $hidden = ['id', 'created_at', 'updated_at'];
    // protected $casts = ['price' => 'double'];

    public function getPriceAttribute(){
     $price = (double) $this->attributes['price'];
     return $price.' eur';
    }

    public function tags()
    {

        return $this->belongsToMany('App\Tag', 'taggables', 'product_id', 'tag_id' );
    
    }

}
