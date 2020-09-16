<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'person_id', 'product_name', 'product_price', 'product_image', 'product_active'
    ];

    public function productDetails(){
        return $this->hasOne(ProductDetail::class, 'product_id');
    }
}
