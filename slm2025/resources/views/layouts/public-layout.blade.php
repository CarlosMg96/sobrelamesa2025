<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="#AppGalicia" name="description" />
    <meta content="Marco Antonio Arcos" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}">
    <link rel="manifest" href="{{ URL::asset('manifest.webmanifest') }}">

    <!-- include head css -->
    @include('layouts.head-css')
</head>

<body>
    
    @yield('content')

    <!-- vendor-scripts -->
    <!-- @include('layouts.vendor-scripts') -->

</body>

</html>
