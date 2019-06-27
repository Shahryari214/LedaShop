@extends('Admin.master')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد دسته</h2>
        </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('Admin.layouts.errors')
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">نام دسته</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">دسته والد</label>
                            <div class="col-sm-10">
                                <select name="parent" id="parent" class="form-control custom-select custom-select-sm">
                                    <option value="" selected>هیچ کدام</option>
                                    @php
                                    $traverse = function ($categories, $prefix = '-',$level=1) use (&$traverse) {
                                    foreach ($categories as $category) {
                                        echo   '<option value="'.$category->id.'" class="level'.$level.'">'.$prefix.' '.$category->title.'</option>';
                                        $traverse($category->children,$prefix.'-',$level+1); 
                                    }
                                    
                                };
                                
                                $traverse($nodes);
                                @endphp   
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">توضیحات کوتاه</label>
                            <div class="col-sm-10">
                            <textarea rows="5" class="form-control" name="description" id="description" placeholder="توضیحات را وارد کنید">{{ old('description') }}</textarea>
                            </div>
                        </div>  
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </form>
                </div>
            
@endsection
