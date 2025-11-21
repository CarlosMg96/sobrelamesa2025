@extends('layouts.master-without-nav')
@section('title')
    Error 404
@endsection
@section('page-title')
    Error 404
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <style nonce="newN0nc3ForS3cur1ty" >
            .error-title {
                text-shadow: 9px 0px #FFC629;
            }
            .btnCerrar {
                background-color: #FFC629 !important;
                color: #000 !important;
                border: none !important;
                border-radius: 0 !important;
                padding: 10px 20px !important;
                font-weight: bold !important;
                width: 60%;
                margin-top: 250px;
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
            }
        </style>

        <div class="min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center py-5 mt-5">
                            <div class="position-relative">
                                <img src="{{ asset('images/firma.svg') }}" alt="Firma" class="img-fluid pt-5">
                                <h4 class="error-subtitle text-uppercase mb-0 pt-5">Error 404</h4>
                                <p class="font-size-16 pt-5">La página que estás buscando no existe.
                                </p>
                            </div>
                            <div class="mt-4 text-center">
                                <a class="btn btnCerrar btn-square" href="{{ route('dashboard') }}">Cerrar</a>
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
