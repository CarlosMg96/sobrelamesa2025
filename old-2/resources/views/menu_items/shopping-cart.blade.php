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
    <body data-topbar="dark" class="bg-color">
@endsection

@section('content')

<div class="row align-items-center">
    <div class="col-md-12">
        <h5 class="card-title">@lang('Carrito de compras')</h5>
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

            @forelse ($cartItems as $item)
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-1">
                            {{ \Carbon\Carbon::parse($item->menuItem->available_date)->translatedFormat('l, d \d\e F') }}
                        </h5>
                        <h5 class="fw-bold">{{ $item->menuItem->name }}</h5>
                    </div>
                </div>

                <div class="d-flex align-content-start mb-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="{{ asset($item->menuItem->image) }}" alt="{{ $item->menuItem->name }}" class="img-fluid rounded"  nonce="newN0nc3ForS3cur1ty" style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted">{!! nl2br(e($item->menuItem->description)) !!}</p>
                        </div>
                    </div>
                </div>
<!-- 
                <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                    <h5>Instrucciones:</h5>
                    <p class="text-muted">{{ $item->special_instructions ?? 'Ninguna' }}</p>
                </div> -->

                <div class="d-flex justify-content-between align-items-center mt-1 mb-3">
                    <h4>Total del producto:</h4>
                    <h4 class="text-dark">${{ number_format($item->total_price, 2) }}</h4>
                </div>

                <div class="text-end mb-5">
                    <form action="{{ route('menu_items.shopping-cart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto del carrito?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">Eliminar</button>
                    </form>
                </div>

                <hr>
            @empty
                <div class="text-center py-5">
                    <h5 class="text-muted">Tu carrito está vacío.</h5>
                    <a href="{{ route('menu_items.index') }}" class="btn btn-warning mt-3 text-black">
                        <i class="bx bx-arrow-back me-1"></i> Volver al menú
                    </a>
                </div>
            @endforelse

            @if ($cartItems->isNotEmpty())
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <h4>Total general:</h4>
                    <h4 class="text-dark">
                        ${{ number_format($cartItems->sum('total_price'), 2) }}
                    </h4>
                </div>

                <div class="mt-4 text-center">
                    <form action="{{ route('orders.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning text-black">
                            <i class="bx bx-cart me-1"></i> @lang('Ordenar')
                        </button>
                    </form>
                </div>
            @endif
        </div>

    </div>
</div>

@endsection

@section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
    <!-- alertifyjs js -->
    <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
    <script nonce="newN0nc3ForS3cur1ty" >
        $(document).ready(function () {
            @if(session('status'))
                alertify.success("{{ session('status') }}");
            @endif

            @if(session('success'))
                alertify.success("{{ session('success') }}");
            @endif

            @if(session('error'))
                alertify.error("{{ session('error') }}");
            @endif
        });
    </script>
@endsection

