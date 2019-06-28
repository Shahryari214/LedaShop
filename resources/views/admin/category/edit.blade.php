@extends('Admin.master')
@section('script')
    <script>
        $(function() {
            var i = 0;
            $(".nestedSelect option").each(function () {
                i++;
                var content = $(this).html();
                $(this).html("&nbsp&nbsp".repeat(i) + "-".repeat(i) + content );
            });
        });
    </script>
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش مقاله</h2>
        </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('category.update',$category->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        @include('Admin.layouts.errors')
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">عنوان دسته بندی</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ $category->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">دسته والد</label>
                            <div class="col-sm-10">
                                <select name="parent" id="parent" class="form-control custom-select custom-select-sm">
                                @php
                                    echo $renderSelect;
                                @endphp   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">توضیحات کوتاه</label>
                            <div class="col-sm-10">
                            <textarea rows="5" class="form-control" name="description" id="description" value="{{ $category->description }}">{{ $category->description }}</textarea>
                            </div>
                        </div>  
                        <button type="submit" class="btn btn-primary">بروزرسانی</button>
                    </form>
                </div>
@endsection