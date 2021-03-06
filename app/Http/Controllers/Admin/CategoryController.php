<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'name', 'description', 'image')->get();
        return view('admin.categories.index', ['option'=>'category'], compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create',['option'=>'category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        $category = new Category($request->only(
            [
                'name', 'description'
            ]
        ));
        if ($request->hasFile('image')) {
            $category->image=basename(Storage::put('categories-icon', $request->image));
        }

        $category->save();


        $request->session()->flash('cat_stored', true);
        return redirect()->route('admin.categories.show', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::withCount('news')->findOrFail($id);
        return view('admin.categories.show', compact('category'), ['option'=>'category']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'), ['option'=>'category']);   
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
        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $category = Category::findOrFail($id);

        $category->fill($request->only(
            [
                'name', 'description'
            ]
        ));

        if ($request->hasFile('image')) {
            $category->image=basename(Storage::put('categories-icon', $request->image));
        }

        $category->save();

        $request->session()->flash('cat_updated', true);
        return redirect()->route('admin.categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        News::where('category_id', $id)->delete();
        Category::destroy($id);

        $request->session()->flash('cat_destroy', true);
        return redirect()->route('admin.categories.index');
    }
}
