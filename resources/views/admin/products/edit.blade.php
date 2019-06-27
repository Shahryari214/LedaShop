@extends('admin.master')
    @section('style')
        <link rel="stylesheet" href="/css/tags.css">
    @endsection
    @section('script')
    <script src="/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('body' ,{
                filebrowserUploadUrl : '/products/upload-image',
                filebrowserImageUploadUrl :  '/products/upload-image'
            });
        </script>
        <script src="/js/jquery.min.js"></script>

        <script src="/js/tags.js"></script>
    @endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="page-header head-section">
        <h2>ویرایش محصول</h2>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('admin.layouts.errors')
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">عنوان محصول</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}" placeholder="">
            </div>
        </div>
        <div class="form-group row">
        <label for="body" class="col-sm-2 col-form-label">متن</label>
            <div class="col-sm-10">
                <textarea rows="5" class="form-control" name="body" id="body" value="{{ $product->body }}" placeholder="متن مقاله را وارد کنید">{{ $product->body }}</textarea>
            </div>
        </div>

        
        <div class="form-group row">
            <label for="formats" class="col-sm-2 col-form-label">فرمت</label>
            <div class="col-sm-10">
                <input type="text" id="metastuff" class="mtag" name="formats" value="{{ $product->formats }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="size_documents" class="col-sm-2 col-form-label">سایز</label>
            <div class="col-sm-10">
            <input type="text" id="metaempty" class="mtag" name="size_documents" value="{{ $product->size_documents }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="size_disk" class="col-sm-2 col-form-label">حجم</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="size_disk" name="size_disk" value="{{ $product->size_disk }}" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="mode" class="col-sm-2 col-form-label">مد</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="mode" name="mode" value="{{ $product->mode }}" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="resolution" class="col-sm-2 col-form-label">رزولیشن</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="resolution" name="resolution" value="{{ $product->resolution }}" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="images" class="col-sm-2 col-form-label">تصویر مقاله</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر مقاله را وارد کنید">
                    <div class="col-sm-12">
                        <div class="row">
                            @foreach( $product->images['images'] as $key => $image)
                                <div class="col-sm-2">
                                    <label class="control-label">
                                        {{ $key }}
                                        <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $product->images['thumb'] == $image ? 'checked' : '' }} />
                                        <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">قیمت</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="tags" class="col-sm-2 col-form-label">برچسب ها</label>
            <div class="col-sm-10">
            <input type="text" id="metaet" class="mtag" name="tags" value="{{ $product->tags }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">دسته  بندی</label>
            <div class="col-sm-10">
                <ul class="list-group">
                @php
                    $traverse = function ($categories,$prefix = 'ـ',$level=1) use (&$traverse) {
                    foreach ($categories as $category) {
                        echo '<li class="list-group-item level'.$level.'">
                            <input type="checkbox" name="categories[]" value="'.$category->id.'">'.$prefix.' '.$category->title.'
                        </li>';
                        $traverse($category->children,$prefix.'ـ',$level+1); 
                    }
                    
                };
                
                $traverse($nodes);
                @endphp   
                </ul>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">توضیحات کوتاه</label>
            <div class="col-sm-10">
            <textarea rows="5" class="form-control" name="description" id="description" value="{{ $product->description }}">{{ $product->description }}</textarea>
            </div>
        </div>  
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="status" name="status">
            <label class="form-check-label" for="status">
                منتشر شود
            </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">ارسال</button>
    </form>
</div>
@endsection
