@extends('layouts.master-without-nav')
@section('title')
    Error 401
@endsection
@section('page-title')
    Error 401
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
                          <h1 class="error-title error-text mb-0">401</h1>
                          <h4 class="error-subtitle text-uppercase mb-0">Unauthorized</h4>
                          <p class="font-size-16 mx-auto text-muted w-50 mt-4">Access is denied due to invalid credentials</p>
                       </div>
                        <div class="mt-4 text-center">
                            <a class="btn btn-lg btn-warning" href="{{ url('/') }}">Back to Login</a>
                            <a class="btn btn-lg btn-dark" href="https://login.microsoftonline.com/common/oauth2/v2.0/logout?post_logout_redirect_uri={{ url('/') }}">Sign out of Microsoft Account</a>
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