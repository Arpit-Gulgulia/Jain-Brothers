<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $primaryKey = 'product_details_id';

    protected $fillable = [
        'product_id', 'product_size', 'product_color', 'product_stock', 'product_description'
    ];

}
