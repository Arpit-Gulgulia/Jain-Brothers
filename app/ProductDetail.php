<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $primaryKey = 'product_details_id';

    protected $fillable = [
        'product_id', 'size', 'color', 'stock', 'description'
    ];

}
