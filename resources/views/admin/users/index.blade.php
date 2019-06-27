@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>کاربران</h2>
            <div class="btn-group">
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-info">سطوح دسترسی</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>ایمیل</th>
                    <th>وضعیت ایمیل</th>
                    <th>نقش</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @foreach($user->roles as $role)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ($user->email_verified_at)==null ? 'تائید نشده':'تائید شده' }}</td>
                        <td>{{ $role->name }} - {{ $role->label }}</td>
                        <td>
                            <a href="{{ route('users.edit' , ['id' => $user->id]) }}" class="btn btn-success">ویرایش</a>
                            <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('users.destroy',$user->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                            <a href="" class="btn btn-danger" onclick="
                            if(confirm('کاربر مورد نظر را حذف می کنید؟'))
                                {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $user->id }}').submit();
                                }
                                else{
                                    event.preventDefault();
                            }" >حذف</a>
                        </td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $users->render() !!}
        </div>
    </div>
@endsection