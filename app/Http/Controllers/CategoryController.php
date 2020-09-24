<?php

namespace App\Http\Controllers;

use App\Person;
use App\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $consumer
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $consumer)
    {
        $personModel = Person::where('person_name', $consumer)->firstOrFail();
        $categories = $personModel->categories->pluck('product_category_name');
        return view('category.show', [
            'consumer' => ucwords($consumer),
            'categories' => $categories
        ]);
    }

}
