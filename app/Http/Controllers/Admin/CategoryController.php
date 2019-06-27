<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read-category');
        $category = Category::get()->toTree();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(category $category)
    {
        $this->authorize('create-category'); 
        $nodes = Category::get()->toTree();
        return view('admin.category.create', compact('nodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create-category'); 
        $parent=Category::find($request->parent);
        $attributes=["title"=>$request->title,"description"=>$request->description];
        $node=Category::create($attributes,$parent);
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $this->authorize('update-category'); 
        $parent_id= $category->parent_id;
        $nodes = Category::get()->toTree();
        return view('admin.category.edit',compact('category','nodes','parent_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $this->authorize('update-category'); 
        $category = category::find($category->id);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent;
        $category->description = $request->description;
        $category->save();
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $this->authorize('delete-category');
        $category->delete();
        return redirect(route('category.index'));
    }
}
