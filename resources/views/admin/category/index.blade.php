@extends('Admin.master')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>دسته بندی ها</h2>
            <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">افزودن دسته</a>
        </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                               
                                <th>عنوان دسته بندی</th>
                                <th>توضیحات</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $traverse = function ($categories, $prefix = '-',$level=1) use (&$traverse) {
                                foreach ($categories as $category) {
                                    echo '
                                    <tr>
                                        
                                        <td>'.$prefix.' '.$category->title.'</td>
                                        <td>'.$category->description.'</td>
                                        <td>
                                        <form action="'.route('category.destroy'  , ['id' => $category->id]).'" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="'.csrf_token().'">
                                            <a href="'.route('category.edit' , ['id' => $category->id]).'"  class="btn btn-success">ویرایش</a>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                        </td>
                                    </tr>';
                                    $traverse($category->children,$prefix.'-',$level+1); 
                                }
                                
                            };
                            
                            $traverse($category);
                            @endphp
                            </tfoot>
                        </table>
                    </div>          
                </div>

@endsection