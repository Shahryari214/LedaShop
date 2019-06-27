<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script src="js/all.js"></script>
    <title>وبسایت رسمی رقیه شهریاری</title>
    @yield('style')
</head>

<body>

    @include('Home.layouts.header')
        @yield('content')
    @include('Home.layouts.siderbar')
    @include('Home.layouts.footer')
</body>
</html>
