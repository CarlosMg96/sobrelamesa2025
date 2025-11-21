@extends('layouts.master')

@section('title')
    Pedidos
@stop

@section('css')
    {{-- datatables css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <style nonce="newN0nc3ForS3cur1ty" >
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
@stop

@section('page-title')
    Pedidos
@stop

@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Pedidos</li>
        </ol>
    </div>
@stop

@section('body')
    <body data-topbar="dark" class="bg-color">
    @endsection

    @section('content')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Lista de Pedidos</h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <div class="gap-2">
                        <div class="gap-2">
                            <button class="btn btn-warning text-black" data-bs-toggle="modal" data-bs-target="#qrModal">
                                <i class="bx bx-cart me-1"></i> Escanear Pedido
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div class="dropdown">
                        <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a id="btn-export-excel" class="dropdown-item" href="#">
                                <i class="bx bxs-download me-2"></i> Exportar a Excel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle" id="orders-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th># Orden</th>
                                        <th>Cliente</th>
                                        <th>Paquete</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Hora de Entrega</th>
                                        <th>Estado</th>
                                        <th  nonce="newN0nc3ForS3cur1ty" style="width: 120px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td>00{{ $order->id }}</td>
                                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                                            <td>{{ $order->menuItem->name ?? 'N/A' }}</td>
                                            <td>${{ number_format($order->total_amount, 2) }}</td>
                                            <td>{{ $order->created_at ? \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') : 'N/A' }}</td>
                                            <td>{{ $order->delivery_time ? \Carbon\Carbon::parse($order->delivery_time)->format('H:i') : 'N/A' }}</td>
                                            <td>
                                                @php
                                                    $statusClass = 'order-status-' . strtolower($order->status);
                                                @endphp
                                                <span class="badge rounded-pill {{ $statusClass }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span>Proximamente</span>
                                                <!-- <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('orders.edit', $order->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                                            class="px-2 text-primary">
                                                            <i class="bx bx-pencil font-size-18"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link p-0 border-0 bg-transparent" 
                                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"
                                                                    onclick="return confirm('¿Está seguro de eliminar este pedido?')">
                                                                <i class="bx bx-trash-alt font-size-18 text-danger"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul> -->
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No hay pedidos registrados</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
            <!-- Modal para escanear QR -->
        <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrModalLabel">Escanear Código QR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div id="reader"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;"></div>
                <p class="mt-3"><strong>Resultado:</strong> <span id="qr-result">Esperando escaneo...</span></p>
            </div>
            </div>
        </div>
        </div>
    @endsection

    @section('scripts')
        {{-- datatables js --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" integrity="sha384-MgwUq0TVErv5Lkj/jIAgQpC+iUIqwhwXxJMfrZQVAOhr++1MR02yXH8aXdPc3fk0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js" integrity="sha384-ytWx70TEZNWKvhA4mV4nQPHLRzPJeBf42voNnsXOSCv7ZxlBWQIceO1G8bJirjxl" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js" integrity="sha384-m1YnvBcNGjKAtJ9d9O4s6EuBhKPlLADOZwIu9q7rZBl9d52CUmsHElEO7fNmajv9" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js" integrity="sha384-tMI2NOtgmf/QM9L3vlG0tyNSWXuAnVHcIOhU6+PDkOqN1a5BAZRMrXCvQIgk9KyG" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha384-+mbV2IY1Zk/X1p/nWllGySJSUN8uMs+gUAN10Or95UBH0fpj6GfKgPmgC5EXieXG" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js" integrity="sha384-MjweF+FY5MNbjB5ONlHWtlrou29MgBI/+acgSv4n5CBD79xUbMbLyka8NeCoK0D7" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js" integrity="sha384-c9d8RFSL+u3exBOJ4Yp3HUJXS4znl9f+z66d1y54ig+ea249SpqR+w1wyvXz/lk+" crossorigin="anonymous"></script>

        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty" >
            $(document).ready(function() {
                // Initialize DataTable
                var table = $('#orders-datatable').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                    },
                    order: [[3, 'desc']], // Sort by date column (index 3) descending
                    responsive: true,
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                         "<'row'<'col-sm-12'tr>>" +
                         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [{
                        extend: 'excel',
                        text: '<i class="bx bxs-download me-1"></i> Exportar a Excel',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }]
                });

                // Add export button to the dropdown
                table.buttons().container()
                    .appendTo('#export-buttons');

                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Show success message if exists
                @if(session('success'))
                    alertify.success("{{ session('success') }}");
                @endif

                // Show error message if exists
                @if(session('error'))
                    alertify.error("{{ session('error') }}");
                @endif
            });

            let html5QrCode;
                let isScanned = false;

                $('#qrModal').on('shown.bs.modal', function () {
                    isScanned = false;
                    html5QrCode = new Html5Qrcode("reader");

                    html5QrCode.start(
                        { facingMode: "environment" },
                        {
                            fps: 10,
                            qrbox: 250
                        },
                        qrCodeMessage => {
                            if (!isScanned) {
                                isScanned = true;
                                //document.getElementById("qr-result").innerText = "Código leído";
                                document.getElementById("qr-result").innerText = qrCodeMessage;
                                html5QrCode.stop();

                                const match_id = qrCodeMessage.match(/ID de Orden:\s*(\d+)/);
                                const match_date = qrCodeMessage.match(/Fecha:\s*([\d\/]+)/);
                                const orderId = match_id ? match_id[1] : null;
                                const orderDate = match_date ? match_date[1] : null;

                                if (!orderId) {
                                    alertify.error("No se pudo leer el ID del pedido del QR");
                                    return;
                                }

                                if (!orderDate) {
                                    alertify.error("No se pudo leer la fecha del pedido del QR");
                                    return;
                                }

                                fetch("{{ route('orders.scan.qr') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({ order_id: orderId, order_date: orderDate })
                                })

                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        alertify.success(data.message);
                                        setTimeout(() => location.reload(), 1500);
                                    } else {
                                        alertify.error(data.message || "Código inválido");
                                    }
                                })
                                .catch(err => {
                                    console.error(err);
                                    alertify.error("Error al validar QR");
                                });
                            }
                        },
                        errorMessage => {
                            // Ignorar errores momentáneos de escaneo
                        }
                    );
                });

                $('#qrModal').on('hidden.bs.modal', function () {
                    if (html5QrCode) {
                        html5QrCode.stop().then(() => {
                            html5QrCode.clear();
                        });
                    }
                });
        </script>
    @endsection
