@extends('layouts.master')

@section('title')
    @lang('Catering')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" />
    <style nonce="newN0nc3ForS3cur1ty" >
        div.dt-buttons {
            display: none;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .text-amber {
            color: #FFC629;
        }
        .bg-amber {
            background-color: #FFC629;
        }
        .zone-day {
            margin-top: 30px;
            width: 50%;
        }
        .bg-items {
            --bs-bg-opacity: 1;
            background-color: #5865F2 !important;
        }
    </style>
@endsection

@section('page-title')
    @lang('Catering')
@endsection

@section('body')
    <body data-layout="horizontal" data-topbar="dark">
@endsection

@section('content')

<div class="row align-items-center">
    <div class="col-md-6">
        <h5 class="card-title">@lang('Item')</h5>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-end">
            <div class="gap-2">
               <a href="{{ route('menu_items.create') }}" class="btn btn-warning text-black">
                    <i class="bx bx-cart me-1"></i> @lang('Carrito')
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">

     <div class="py-4">
    <div class="mb-3">
        <a href="{{ route('menu_items.index') }}" class="text-amber">
            <i class="bx bx-arrow-back"></i> Regresar
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1">
                {{ \Carbon\Carbon::parse($menuItem->available_date)->translatedFormat('l, d \d\e F') }}
            </h5>
            <h5 class="fw-bold">{{ $menuItem->name }}</h2>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3 mb-3">
        <span class="badge bg-amber">Solicitado</span>
        <!-- <img src="{{ asset('storage/qrcodes/' . $menuItem->qr_code) }}" alt="QR" width="100"> -->
    </div>
    <p class="text-muted">
        Recoge tu paquete con tu código QR o compártelo para que alguien más lo haga por ti.
    </p>

   

    <div class="d-flex justify-content-between align-items-center mt-4">
        <h4>Total:</h4>
        <h4 class="text-dark">${{ number_format($menuItem->price, 2) }}</h4>
    </div>

    <div class="mt-4 text-center">
        <button class="btn btn-amber w-100">Dejar en disponibilidad</button>
    </div>
</div>

    </div>
</div>

@endsection

@section('scripts')
    <script nonce="newN0nc3ForS3cur1ty" >
        $(document).ready(function () {
            // Mostrar mensaje de éxito si existe
            @if(session('status'))
                $('#success-btn').modal('show');
            @endif

            // Funcionalidad de tabs
            $('#tab-current').click(function () {
                $('#week-current').show();
                $('#week-next').hide();

                $('#tab-current').addClass('border-bottom border-warning text-amber fw-bold')
                                 .removeClass('text-muted');
                $('#tab-next').removeClass('border-bottom border-warning text-amber fw-bold')
                              .addClass('text-muted');
            });

            $('#tab-next').click(function () {
                $('#week-next').show();
                $('#week-current').hide();

                $('#tab-next').addClass('border-bottom border-warning text-amber fw-bold')
                              .removeClass('text-muted');
                $('#tab-current').removeClass('border-bottom border-warning text-amber fw-bold')
                                 .addClass('text-muted');
            });
        });
    </script>
@endsection

