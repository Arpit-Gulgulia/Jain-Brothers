<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Person;
use App\Product;
use App\ProductDetail;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $consumer = request()->query('consumer', 'men');
        $consumer = Person::where('name', $consumer)->firstOrFail();
        $products = $consumer->products()->orderBy('product_id', 'asc')->paginate(4);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     */
    public function create(Request $request)
    {
        $consumer = request()->query('consumer', 'men');
        $consumer = Person::where('name', $consumer)->firstOrFail();

        $selectBoxHtml = $this->createCategoriesSelectBox($consumer);

        return view('admin.product.create', compact('consumer','selectBoxHtml'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate( [
           'person_id' => 'required|integer',
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2000',
            'color' => 'required|string',
            'size' => 'required|string',
            'stock' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->has('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()){

                $imagePath = $request->file('image')->store('Uploads/Admin/Products/Large', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->resize(1080, 1440);
                $image->save();

//                $imagePath = $request->file('image')->store('Uploads/Admin/Products/Medium', 'public');
//                $image = Image::make(public_path("storage/{$imagePath}"))->resize(540, 720);
//                $image->save();
//
//                $imagePath = $request->file('image')->store('Uploads/Admin/Products/Small', 'public');
//                $image = Image::make(public_path("storage/{$imagePath}"))->resize(270, 360);
//                $image->save();

                $validatedData['image'] = $image->basename;

                $product = Product::create($validatedData);
                $product->productDetails()->create($validatedData);

                return Redirect::to(route('admin.product.index'))->with('message', 'Product added successfully!');
            }
        }
        return Redirect::to(route('admin.product.create'))->with('message', 'Something went wrong. Could not add product');

    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return void
     */
    public function show(Product $product)
    {
        $productDetails = $product->productDetails;
        return view('admin.product.show', compact('product', 'productDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        $consumer = $product->person()->firstOrFail();

        $selectBoxHtml = $this->createCategoriesSelectBox($consumer);

        $productDetails = $product->productDetails;
        return view('admin.product.edit', compact('selectBoxHtml','product', 'productDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product)
    {
        $validatedData = request()->validate( [
            'person_id' => 'required|integer',
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpg,png,jpeg,svg|max:2000',
            'color' => 'required|string',
            'size' => 'required|string',
            'stock' => 'required|string',
            'description' => 'required|string',
        ]);

        if (request()->has('image')){
            if (request()->file('image')->isValid()){
                Storage::delete('public/Uploads/Admin/Products/Large/'.$product->image);
                $imagePath = request()->file('image')->store('Uploads/Admin/Products/Large', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->resize(1080, 1440);
                $image->save();

                $validatedData['image'] = $image->basename;;

            }
        }
        $product->update(array_filter($validatedData));
        $product->productDetails->update(array_filter($validatedData));
        return Redirect::to(route('admin.product.index'))->with('message', 'Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::to(route('admin.product.index'))->with('message', 'Product deleted successfully!');
    }

    //AJAX CALLS
//    protected function getCategories(Request $request){
//        $person_id = $request->input('person_id');
//        $categories = Category::where(['person_id' => $person_id, 'parent_id'])->get();
////        $categories = Person::find($person_id)->categories;
//        return response()->json($categories);
//    }

//    protected function getSubcategories(Request $request){
//        $category_id = $request->input('category_id');
//        $subcategories = Subcategory::where('product_category_id', $category_id)->get();
////        $subcategories = Category::find($category_id)->subcategories;
//        return response()->json($subcategories);
//    }

    protected function createCategoriesSelectBox(Person $consumer){

        $categories = $consumer->categories()->where('parent_id', 0)->get();

        $selectBoxHtml = "<select name='category_id' id='category_id' required>
                            <option value=''>Select Product Category</option>";

        foreach ($categories as $category){

            $selectBoxHtml .= "<option disabled class='text-white bg-secondary'>$category->name</option>";

            $subCategories = Category::where('parent_id', $category->category_id)->get();

            foreach ($subCategories as $subCategory){
                $selectBoxHtml .= "<option value='$subCategory->category_id'>$subCategory->name</option>";
            }
        }
        $selectBoxHtml .= "</select>";

        return $selectBoxHtml;
    }

}
