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
//    public function categories(){
//        return $this->hasMany(Category::class, 'person_id');
//    }

    public function products(){
        return $this->hasMany(Product::class, 'person_id');
    }

    public function categories(){
        return $this->hasMany(Category::class, 'person_id');
    }

//    public function getRouteKeyName()
//    {
//        return 'name'; // TODO: Change the autogenerated stub
//    }
}
