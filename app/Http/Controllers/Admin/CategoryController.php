<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumer = request()->query('consumer', 'men');
        $consumer = Person::where('name', $consumer)->firstOrFail();
//        dd($consumer->categories);
        $categories = $consumer->categories()->orderBy('parent_id', 'asc')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consumer = request()->query('consumer', 'men');
        $consumer = Person::where('name', $consumer)->firstOrFail();
        $categories = $consumer->categories()->where('parent_id', 0)->get();
        return view('admin.category.create', compact('consumer','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'parent_id' => ['required', 'integer'],
            'person_id' => ['required', 'integer'],
            'url' => ['required', 'string']
        ]);
//dd($validatedData);
        $category = Category::create($validatedData);

        return redirect(route('admin.category.index'))->with('message', 'Category added successfully!');
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
     * @param Category $id
     * @return void
     */
    public function edit(Category $id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $persons = Person::all();
        return view('admin.category.edit', ['data' => $id, 'categories' => $categories, 'persons' => $persons]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $id)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'integer'],
            'person' => ['required', 'integer'],
            'url' => ['required', 'string'],
            'status' => ['required', 'integer']
        ]);

        $id->update([
            'person_id' => $data['person'],
            'parent_id' => $data['category'],
            'name' => $data['name'],
            'url' => $data['url'],
            'status' => $data['status']
        ]);

        return redirect(route('admin.category.index'))->with('message', 'Category Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $id
     * @return void
     */
    public function destroy(Category $id)
    {

        $id->delete();
        return redirect(route('admin.category.index'))->with('message', 'Category deleted successfully!');
    }
}
