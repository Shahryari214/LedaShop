@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>نقش ها</h2>
            <div class="btn-group">
                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-danger">ایجاد نقش</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-info">بخش دسترسی ها</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام نقش</th>
                    <th>توضیحات</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role-> name }}</td>
                        <td>{{ $role-> label }}</td>
                        <td>
                            <a href="{{ route('roles.edit' , ['id' => $role->id]) }}" class="btn btn-success">ویرایش</a>
                            <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('roles.destroy',$role->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                            <a href="" class="btn btn-danger" onclick="
                            if(confirm('فایل را حذف می کنید؟'))
                                {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $role->id }}').submit();
                                }
                                else{
                                    event.preventDefault();
                                }" >حذف</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $roles->render() !!}
        </div>
    </div>
@endsection