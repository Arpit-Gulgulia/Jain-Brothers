<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'person_id', 'category_id', 'name', 'code', 'price', 'image', 'status'
    ];

    public function productDetails(){
        return $this->hasOne(ProductDetail::class, 'product_id');
    }

    public function person(){
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
