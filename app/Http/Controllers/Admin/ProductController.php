<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read-product'); 
        $products =Product::latest()->paginate(20);
        return view('Admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-product'); 
        $nodes = Category::get()->toTree();
        return view('admin.products.create', compact('nodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('create-product'); 
        if($request->status==1){
            $status=1;
        }
        else{
            $status=0;
        }
        $product=new product;
        $imagesUrl = $this->uploadImages($request->file('images'));

        $product = $product->create([
            'title' =>  $request->title,
            'description' =>  $request->description,
            'body' =>  $request->body,
            'tags' =>  $request->tags,
            'price' =>  $request->price,
            'formats' =>  $request->formats,
            'size_disk' =>  $request->size_disk,
            'size_documents' =>  $request->size_documents,
            'mode' =>  $request->mode,
            'status' =>  $status,
            'resolution' =>  $request->resolution,
            'user_id' => auth()->user()->id,
            'images' =>  $imagesUrl,
        ]);
        $product->categories()->sync($request->categories);
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update-product'); 
        $product_id= $product->id;
        $product=product::find($product->id);
        $nodes = Category::get()->toTree();
        //$product = product::with('categories')->where('id',$product->id)->first();
        return view('admin.products.edit',compact('product','nodes','product_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('update-product'); 
        $product = product::find($product->id);
        $file = $request->file('images');
        if($file) {
            $imagesUrl = $this->uploadImages($request->file('images'));
        } else {
            $imagesUrl = $product->images;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->slug = $request->slug;
        $product->body = $request->body;
        $product->tags = $request->tags;
        $product->price=   $request->price;
        $product->formats = $request->formats;
        $product->size_disk = $request->size_disk;
        $product->size_documents = $request->size_documents;
        $product->mode = $request->mode;
        $product->status = $request->status;
        $product->resolution = $request->resolution;
        $product->images=  $imagesUrl;
        $product->user_id = auth()->user()->id;
        $product->save();
        $product->categories()->sync($request->categories);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete-product');
        product::where('id',$product->id)->delete();
        return redirect()->back();
    }
}
