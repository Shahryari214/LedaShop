@extends('Admin.master')
@section('style')
    <link rel="stylesheet" href="/css/selectstyle.css">
@endsection
@section('script')
    <script src="/js/jquery.min.js"></script>
    <script src="{{ asset('js/select2.full.min.js')}}"></script>
    <script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
    </script>
@endsection


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد نقش</h2>
        </div>
        <form class="form-horizontal" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.layouts.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">عنوان نقش</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="عنوان را وارد کنید" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-sm-12">
                    <label for="inputText" class="col-sm-2 col-form-label">دسترسی ها</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="انتخاب دسترسی" name="permissions[]" style="width: 100%;">
                        @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="label" class="control-label">توضیحات کوتاه</label>
                    <textarea rows="5" class="form-control" name="label" id="label" placeholder="توضیحات را وارد کنید">{{ old('label') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection