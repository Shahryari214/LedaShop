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
        <h2>افزودن محصول</h2>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('admin.layouts.errors')
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">عنوان محصول</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="">
            </div>
        </div>
        <div class="form-group row">
        <label for="body" class="col-sm-2 col-form-label">متن</label>
            <div class="col-sm-10">
                <textarea rows="5" class="form-control" name="body" id="body" placeholder="متن مقاله را وارد کنید">{{ old('body') }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="formats" class="col-sm-2 col-form-label">فرمت</label>
            <div class="col-sm-10">
                <input type="text" id="metastuff" class="mtag" name="formats" value=""/>
            </div>
        </div>
        <div class="form-group row">
            <label for="size_documents" class="col-sm-2 col-form-label">سایز</label>
            <div class="col-sm-10">
            <input type="text" id="metaempty" class="mtag" name="size_documents" value=""/>
            </div>
        </div>
        <div class="form-group row">
            <label for="size_disk" class="col-sm-2 col-form-label">حجم</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="size_disk" name="size_disk" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="mode" class="col-sm-2 col-form-label">مد</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="mode" name="mode" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="resolution" class="col-sm-2 col-form-label">رزولیشن</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="resolution" name="resolution" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">تصویر شاخص</label>
            <div class="col-sm-10">
            <input type="file" id="images" class="form-control" name="images" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">قیمت</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="price" name="price" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <label for="tags" class="col-sm-2 col-form-label">برچسب ها</label>
            <div class="col-sm-10">
            <input type="text" id="metaet" class="mtag" name="tags" value=""/>
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">دسته  بندی</label>
            <div class="col-sm-10">
                <ul class="list-group">
                @php
                    $traverse = function ($categories, $prefix = 'ـ',$level=1) use (&$traverse) {
                    foreach ($categories as $category) {
                        echo '<li class="list-group-item level'.$level.'">
                            <input type="checkbox" name="categories[]" value="'.$category->id.'">
                            <span>'.$prefix.' '.$category->title.'</span>
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
            <textarea rows="5" class="form-control" name="description" id="description" placeholder="توضیحات را وارد کنید">{{ old('description') }}</textarea>
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
