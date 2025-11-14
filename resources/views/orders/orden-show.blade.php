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
          .badge {
            font-size: 0.8em;
            padding: 0.4em 0.8em;
        }
        .order-status-pending {
            background-color: #ffc107;
            color: #000;
        }
        .order-status-confirmed {
            background-color: #0d6efd;
            color: #fff;
        }
        .order-status-prepared {
            background-color: #fd7e14;
            color: #fff;
        }
        .order-status-delivered {
            background-color: #198754;
            color: #fff;
        }
        .order-status-cancelled {
            background-color: #dc3545;
            color: #fff;
        }
        div.dt-buttons {
            display: none;
        }
    </style>
@endsection

@section('page-title')
    @lang('Ordenes')
@endsection

@section('body')
    <body data-topbar="dark" class="bg-color">
@endsection

@section('content')

<div class="row align-items-center">
    <div class="col-md-12">
        <h5 class="card-title">@lang('Orden: ')</h5>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">

     <div class="py-4">
    <div class="mb-3">
        <a href="{{ route('orders.index') }}" class="text-amber">
            <i class="bx bx-arrow-back"></i> Regresar
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-1">
                {{ \Carbon\Carbon::parse($order->menuItem->available_date)->translatedFormat('l, d \d\e F') }}
            </h5>
            <h5 class="fw-bold">{{ $order->menuItem->name }}</h5>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            @if($order->status == 'pending')
                <span class="badge order-status-pending">@lang('Pendiente')</span>
            @elseif($order->status == 'confirmed')
                <span class="badge order-status-confirmed">@lang('Completada')</span>
            @elseif($order->status == 'cancelled')
                <span class="badge order-status-cancelled">@lang('Cancelada')</span>
            @elseif($order->status == 'prepared')
                <span class="badge order-status-prepared">@lang('Preparada')</span>
            @elseif($order->status == 'delivered')
                <span class="badge order-status-delivered">@lang('Entregada')</span>
            @endif
        </div>
        <div>
            <div id="qrcode"></div>
        </div>
    </div>

    <div class="d-flex align-content-start">
        <div class="row">
            <div class="col-sm-3">
                <img src="{{ asset($order->menuItem->image) }}" alt="{{ $order->menuItem->name }}" class="img-fluid rounded"  nonce="newN0nc3ForS3cur1ty" style="max-height: 200px; object-fit: cover;">
            </div>
            <div class="col-sm-9">
                <p class="text-muted">{!! nl2br(e($order->menuItem->description)) !!}</p>
            </div>
        </div>
    </div>   


    <div class="d-flex justify-content-between align-items-center mt-4">
        <h4>Total:</h4>
        <h4 class="text-dark">${{ number_format($order->menuItem->price, 2) }}</h4>
    </div>

    </div>
</div>

    </div>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js" integrity="sha384-c9d8RFSL+u3exBOJ4Yp3HUJXS4znl9f+z66d1y54ig+ea249SpqR+w1wyvXz/lk+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha384-3zSEDfvllQohrq0PHL1fOXJuC/jSOO34H46t6UQfobFOmxE5BpjjaIJY5F2/bMnU" crossorigin="anonymous"></script>
<!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
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

            let availableDate = "{{ \Carbon\Carbon::parse($order->menuItem->available_date)->translatedFormat('Y-m-d') }}";
            let menuName = "{{ $order->menuItem->name }}";
            let userName = "{{ $order->user->name ?? 'Cliente Desconocido' }}";
            let orderId = "{{ $order->id }}";

            // Construye el string del QR
            let qrData = `Fecha: ${availableDate}\nPlatillo: ${menuName}\nCliente: ${userName}\nID de Orden: ${orderId}`;

            // Genera el QR
            let qrcode = new QRCode(document.getElementById("qrcode"), {
                text: qrData,
                width: 100,
                height: 100
            });
        });
    </script>
@endsection

