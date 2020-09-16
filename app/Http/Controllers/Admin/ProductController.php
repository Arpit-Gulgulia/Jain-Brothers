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
        return view('admin.product.index', [
            'products' => Product::orderBy('product_id', 'desc')->paginate(4)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     */
    public function create(Request $request)
    {
        return view('admin.product.create', [
            'persons' => Person::all()
        ]);
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
           'person_id' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'product_image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2000',
            'product_color' => 'required|string',
            'product_size' => 'required|string',
            'product_stock' => 'required|string',
            'product_description' => 'required|string',
        ]);
        if ($request->has('product_image')){
            if ($request->file('product_image')->isValid()){
                $imagePath = $request->file('product_image')->store('Uploads/Products', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->fit(350, 350);
                $image->save();

                $validatedData['product_image'] = $imagePath;

                $product = Product::create($validatedData);
                $product->productDetails()->create($validatedData);

                return Redirect::to(route('admin.product.index'))->with('message', 'Product added successfully!');
            }
        }
        return Redirect::to(route('admin.product.create'))->with('error', 'Something went wrong. Could not add product');

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
        $persons = Person::all();
        $productDetails = $product->productDetails;
        return view('admin.product.edit', compact('persons','product', 'productDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product)
    {
        $validatedData = request()->validate([
            'person_id' => 'nullable|numeric',
            'product_category_id' => 'required_with:person_id',
            'product_subcategory_id' => 'required_with:person_id',
            'product_name' => 'nullable|string|max:255',
            'product_price' => 'nullable|integer',
            'product_image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:1000',
            'product_color' => 'nullable|string',
            'product_size' => 'nullable|string',
            'product_stock' => 'nullable|string',
            'product_description' => 'nullable|string',
        ]);

        if (request()->has('product_image')){
            if (request()->file('product_image')->isValid()){
                unlink(('storage/'.$product->product_image));
                $imagePath = request()->file('product_image')->store('Uploads/Products', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->fit(350, 350);
                $image->save();

                $validatedData['product_image'] = $imagePath;

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
    protected function getCategories(Request $request){
        $person_id = $request->input('person_id');
        $categories = Category::where('person_id', $person_id)->get();
//        $categories = Person::find($person_id)->categories;
        return response()->json($categories);
    }

    protected function getSubcategories(Request $request){
        $category_id = $request->input('category_id');
        $subcategories = Subcategory::where('product_category_id', $category_id)->get();
//        $subcategories = Category::find($category_id)->subcategories;
        return response()->json($subcategories);
    }
}
