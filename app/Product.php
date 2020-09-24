<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'person_id', 'name', 'price', 'image', 'status'
    ];

    public function productDetails(){
        return $this->hasOne(ProductDetail::class, 'product_id');
    }


}
