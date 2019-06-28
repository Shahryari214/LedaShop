<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>وبسایت رسمی رقیه شهریاری</title>
    <link rel="stylesheet" href="/css/admin.css">
    @yield('style')
    @yield('script')
</head>

<body>

    @include('admin.layouts.header')
        @yield('content')
    @include('admin.layouts.footer')
</body>
</html>
