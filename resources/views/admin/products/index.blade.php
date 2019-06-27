@extends('admin.master')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="page-header head-section">
        <h2>محصولات</h2>
        <a href="{{route('products.create')}}" class="btn btn-sm btn-primary">ارسال محصول</a>
    </div>
    <div class="table-responsive">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>عنوان پست</th>
                    <th>رزولیشن</th>
                    <th>برچسب ها</th>
                    <th>فرمت</th>
                    <th>سایز</th>
                    <th>حجم</th>
                    <th>مد</th>
                    <th>قیمت</th>
                    <th>وضعیت انتشار</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td><a href="{{ $product->path() }}">{{ $product->title }}</a></td>
                    <td>{{ $product->resolution }}</td>
                    <td>{{ $product->tags  }}</td>
                    <td>{{ $product->formats  }}</td>
                    <td>{{ $product-> size_documents }}</td>
                    <td>{{ $product-> size_disk  }}</td>
                    <td>{{ $product-> mode }}</td>
                    <td>{{ $product-> price }}</td>
                    <td>{{ ($product->status)==1 ? '1 فعال' :'0غیرفعال' }}</td>
                    <td>
                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-success">ویرایش</a>
                        <form id="delete-form-{{ $product->id }}" method="post" action="{{ route('products.destroy',$product->id) }}" style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <a href="" class="btn btn-danger" onclick="
                        if(confirm('فایل را حذف می کنید؟'))
                            {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $product->id }}').submit();
                            }
                            else{
                                event.preventDefault();
                            }" >حذف</a>
                    </td>
                </tr>
                @endforeach
                </tfoot>
            </table>
        </div>          
    </div>
    <div style="text-align: center">
        {!! $products->render() !!}
    </div>
</div>
@endsection