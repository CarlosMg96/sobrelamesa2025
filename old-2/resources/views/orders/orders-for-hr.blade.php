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
        .order-status-charged {
            background-color: #6f42c1;
            color: #fff;
        }
        .btn-amber {
            --bs-btn-bg: #FFC629;
            --bs-btn-border-color: #FFC629;
            --bs-btn-hover-bg: #e6b21e;
            --bs-btn-hover-border-color: #e6b21e;
            --bs-btn-focus-shadow-rgb: 255, 198, 41;
            --bs-btn-active-bg: #d4a21a;
            --bs-btn-active-border-color: #d4a21a;
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
    <body data-topbar="dark">
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

        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('orders.for.hr', ['period' => 'today']) }}"
                       class="btn btn-outline-secondary {{ request()->route('period') === 'today' ? 'active' : '' }}">
                        Hoy
                    </a>
                    <a href="{{ route('orders.for.hr', ['period' => 'weekly']) }}"
                       class="btn btn-outline-secondary {{ request()->route('period') === 'weekly' ? 'active' : '' }}">
                        Esta semana
                    </a>
                    <a href="{{ route('orders.for.hr', ['period' => 'biweekly']) }}"
                       class="btn btn-outline-secondary {{ request()->route('period') === 'biweekly' ? 'active' : '' }}">
                        Últimas dos semanas
                    </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="mb-1">Rango de fechas:</h5>
                                <p class="text-muted">
                                    Desde: {{ \Carbon\Carbon::parse($start_date)->format('d/m/Y') }} -
                                    Hasta: {{ \Carbon\Carbon::parse($end_date)->format('d/m/Y') }}
                                </p>
                            </div>
                            <div>
                                <button class="btn btn-amber"><i class="bx bxs-download me-2"></i> Exportar a Excel</button>
                            </div>
                        </div>

                      <div class="row g-3 mb-4">
                        <div class="col-12 col-md-4">
                            <div class="card h-100">
                                <div class="card-body p-3">
                                    <h5 class="mb-1">Total de pedidos:</h5>
                                    <h2 class="fw-bold">{{ $orders_grouped_by_user->count() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card h-100">
                                <div class="card-body p-3">
                                    <h5 class="mb-1">Total de órdenes:</h5>
                                    <h2 class="fw-bold">{{ $orders_grouped_by_user->flatten()->count() }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card h-100">
                                <div class="card-body p-3">
                                    <h5 class="mb-1">Total cobrado:</h5>
                                    <h2 class="fw-bold">$
                                        {{ number_format($orders_grouped_by_user->flatten()->sum('total_amount'), 2) }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                        
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle" id="orders-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Orden</th>
                                        <th>Folio</th>
                                        <th>Costo</th>
                                        <th>Estado</th>
                                        <th>Fecha / Hora de Entrega</th>
                                        <th  nonce="newN0nc3ForS3cur1ty" style="width: 120px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse($orders_grouped_by_user as $userId => $userOrders)
                                    @foreach($userOrders as $order)
                                        <tr>
                                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                                            <td>{{ $order->menuItem->name ?? 'N/A' }}</td>
                                            <td>#00{{ $order->id }}</td> 
                                            <td>${{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                @php
                                                    $statusClass = 'order-status-' . strtolower($order->status);
                                                @endphp
                                                <span class="badge rounded-pill {{ $statusClass }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $order->created_at ? \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') : 'N/A' }} / {{ $order->delivery_time ? \Carbon\Carbon::parse($order->delivery_time)->format('H:i') : 'N/A' }}</td>
                                            <td>
                                                <span>Proximamente</span>
                                            </td>
                                        </tr>
                                    @endforeach
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
    @endsection

    @section('scripts')
        {{-- datatables js --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" integrity="sha384-MgwUq0TVErv5Lkj/jIAgQpC+iUIqwhwXxJMfrZQVAOhr++1MR02yXH8aXdPc3fk0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js" integrity="sha384-ytWx70TEZNWKvhA4mV4nQPHLRzPJeBf42voNnsXOSCv7ZxlBWQIceO1G8bJirjxl" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js" integrity="sha384-m1YnvBcNGjKAtJ9d9O4s6EuBhKPlLADOZwIu9q7rZBl9d52CUmsHElEO7fNmajv9" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js" integrity="sha384-tMI2NOtgmf/QM9L3vlG0tyNSWXuAnVHcIOhU6+PDkOqN1a5BAZRMrXCvQIgk9KyG" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha384-+mbV2IY1Zk/X1p/nWllGySJSUN8uMs+gUAN10Or95UBH0fpj6GfKgPmgC5EXieXG" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js" integrity="sha384-MjweF+FY5MNbjB5ONlHWtlrou29MgBI/+acgSv4n5CBD79xUbMbLyka8NeCoK0D7" crossorigin="anonymous"></script>

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
        </script>
    @endsection
