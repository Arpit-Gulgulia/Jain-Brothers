<?php

namespace App\Http\Controllers;

use App\Category;
use App\Person;
use App\Product;
use App\Subcategory;
use App\Tag;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $consumer
     * @return void
     */
    public function listing(Person $consumer, $category)
    {
        //Check and Get categoryModel associated with person
        $categoryModel = $consumer->categories()->where('product_category_name', $category)->firstOrFail();

        //If category found is Main category, found its all subcategory
        $subcategories = $categoryModel->parentId==0 ? Category::where('parentId', $categoryModel->product_category_id)->get() : $categoryModel;

        //Fetch all products corresponding to subcategory or all categories of maincategory
        $products = Product::where([
            'person_id' => $consumer->person_id,
        ])->whereIn('product_category_id', $subcategories)->get();

        return view('product.listing', compact('products'));
    }

    public function fashionStore(Tag $tag){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
