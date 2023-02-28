<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $path = $request->file('image')->store('public/categories');
        // Generate a file name with extension
        //$fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();

        Category::create([
            'image'=> $path,
            'description' => $request->description,
            'name' => $request->name,
        ]);
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'=>['required'],
            'description'=>['required'],
        ]);
        $path = $category->image;
        if($request->hasFile('image')){
            Storage::delete($path);
            $path = $request->file('image')->store('public/categories');
        }
        Category::where('id',$category->id)->update([
            'image' => $path,
            'name' =>$request->name,
            'description' =>$request->description,
        ]);

        return to_route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();
        return to_route('admin.categories.index');
    }
}
