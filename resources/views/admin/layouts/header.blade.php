<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">لداشاپ</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li><a href="#">Dashboard</a></li>--}}
                {{--<li><a href="#">Settings</a></li>--}}
                {{--<li><a href="#">Profile</a></li>--}}
                {{--<li><a href="#">Help</a></li>--}}
            {{--</ul>--}}
            {{--<form class="navbar-form navbar-right">--}}
                {{--<input type="text" class="form-control" placeholder="Search...">--}}
            {{--</form>--}}

            <div class="navbar-left">
            <a class="btn btn-sm btn-warning" style="margin: 15px" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('خروج از پنل کاربری') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="/admin/panel">پنل اصلی</a></li>
                @can('read-product')
                <li><a href="{{route('products.index')}}">محصولات</a></li>
                @endcan
                
                <!-- @can('read-article')
                <li><a href="">مقالات</a></li> 
                @endcan -->

                @can('read-category')
                <li><a href="{{route('category.index')}}">دسته بندی ها</a></li>
                @endcan

                @can('read-user')
                <li><a href="{{route('users.index')}}">کاربران</a></li> 
                @endcan

                @can('read-role')
                <li><a href="{{ route('roles.index') }}">نقش ها</a></li> 
                @endcan

                @can('read-permission')
                <li><a href="{{ route('permissions.index') }}">دسترسی ها</a></li> 
                @endcan
            </ul>
            
        </div>