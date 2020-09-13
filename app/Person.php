<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "persons";

    protected $primaryKey = 'person_id';

    /**
     * Get the comments for the blog post.
     */
    public function categories(){
        return $this->hasMany('App\Category', 'product_category_id', 'person_id');
    }
}
