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
            <h2>ویرایش نقش</h2>
        </div>
        <form class="form-horizontal" action="{{ route('roles.update' , ['id' => $role->id ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('Admin.layouts.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">عنوان نقش</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="عنوان را وارد کنید" value="{{ $role->name}}">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-sm-12">
                <label for="inputText" class="col-sm-2 col-form-label">دسترسی ها</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="انتخاب دسترسی" name="permissions[]" style="width: 100%;">
                    @foreach(\App\Models\Permission::latest()->get() as $permission)
                        <option value="{{ $permission->id }}" {{ in_array(trim($permission->id) , $role->permissions->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $permission->name }} - {{ $permission->label }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="label" class="control-label">توضیحات کوتاه</label>
                    <textarea rows="5" class="form-control" name="label" id="label" placeholder="توضیحات را وارد کنید">{{ $role->label}}</textarea>
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