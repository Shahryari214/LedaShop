<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>پنل ادمین</title>
    <link rel="stylesheet" href="/css/admin.css">
    @yield('style')
</head>

<body>

    @include('user.layouts.header')
        @yield('content')
    @include('user.layouts.footer')

</body>
</html>
