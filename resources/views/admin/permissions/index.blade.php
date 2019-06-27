@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>دسترسی ها</h2>
            <div class="btn-group">
                <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-danger">ایجاد دسترسی</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام دسترسی</th>
                    <th>توضیحات</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->label }}</td>
                        <td>
                            <a href="{{ route('permissions.edit' , ['id' => $permission->id]) }}" class="btn btn-success">ویرایش</a>
                            <form id="delete-form-{{ $permission->id }}" method="post" action="{{ route('permissions.destroy',$permission->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                            <a href="" class="btn btn-danger" onclick="
                            if(confirm('دسترسی مورد نظر را حذف می کنید؟'))
                                {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $permission->id }}').submit();
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
            {!! $permissions->render() !!}
        </div>
    </div>
@endsection