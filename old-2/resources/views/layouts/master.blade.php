<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') - #AppGalicia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="#AppGalicia" name="description" />
    <meta content="Marco Antonio Arcos Martínez & Oscar Barrios de Corral & Carlos Rodríguez" name="author" />
   <!-- Open Graph / Facebook -->
    <meta property="og:title" content="#AppGalicia" />
    <meta property="og:description" content="App Galicia." />
    <meta property="og:image" content="https://app.galicia.com.mx/images/logo/og_logo.jpeg" />
    <meta property="og:type" content="website" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/images/logo/logo.jpeg') }}">
    <link rel="manifest" href="{{ URL::asset('manifest.webmanifest') }}">

    <!-- include head css -->
    @include('layouts.head-css')
    
    <!-- Custom styles -->
    @stack('styles')
</head>

@yield('body')

<!-- Begin page -->
<div id="layout-wrapper">
    <!-- topbar -->
    @include('layouts.topbar')

    <!-- sidebar components -->
    @include('layouts.sidebar')
    @include('layouts.horizontal')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- footer -->
        @include('layouts.footer')

    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- customizer -->
@include('layouts.right-sidebar')

<!-- vendor-scripts -->
@include('layouts.vendor-scripts')

    @yield('script')
    @stack('scripts')
</body>

</html>