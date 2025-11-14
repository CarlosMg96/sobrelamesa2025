@extends('layouts.master-without-nav')
@section('title')
    Error 41
@endsection
@section('page-title')
    Error 419 - Page Expired
@endsection
@section('body')

    <body>
    @endsection
    @section('content')

    <style nonce="newN0nc3ForS3cur1ty" >
        .error-title {
            text-shadow: 9px 0px #FFC629;
        }
    </style>

    <div class="min-vh-100"  nonce="newN0nc3ForS3cur1ty" style="background: url(images/bg-2.png) top;">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-5 mt-5">
                       <div class="position-relative">
                          <h1 class="error-title error-text mb-0">419</h1>
                          <h4 class="error-subtitle text-uppercase mb-0">Opps, La sesión expiro</h4>
                          <p class="font-size-16 mx-auto text-muted w-50 mt-4">Por favor, vuelve a cargar la página.</p>
                       </div>
                        <div class="mt-4 text-center">
                            <a class="btn btn-lg btn-warning" href="{{ route('login') }}">Volver al Login</a>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end authentication section -->

@endsection