@extends('layouts.master')

@section('title')
    Nuevo Pedido
@endsection

@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- dropzone css -->
    <link href="{{ URL::asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- select2 css -->
    <link href="{{ URL::asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- flatpickr css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style nonce="newN0nc3ForS3cur1ty" >
        /* Sobrescribir estilos problemáticos para el select de estado */
        #status {
            position: static !important;
            left: auto !important;
            top: auto !important;
            transform: none !important;
            margin: 0 !important;
            width: 100% !important;
        }
    </style>
@endsection

@section('page-title')
    Nuevo Pedido
@endsection

@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Pedidos</a></li>
            <li class="breadcrumb-item active">Nuevo Pedido</li>
        </ol>
    </div>
@endsection

@section('body')

    <body data-topbar="dark">
    @endsection

    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Nuevo Pedido</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary me-2">
                            <i class="bx bx-arrow-back me-1"></i> Regresar
                        </a>
                        <button type="submit" form="form-store" class="btn btn-warning text-black" id="btn-save">
                            <i class="bx bx-save me-1"></i> Guardar
                        </button>
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
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('orders.store') }}" id="form-store" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="user_id">Usuario <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select select2 @error('user_id') is-invalid @enderror"
                                            id="user_id" name="user_id" required>
                                            <option value="">Seleccione un usuario</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Campos ocultos para subtotal y total -->
                                <input type="hidden" name="subtotal" value="{{ old('subtotal', 0) }}">
                                <input type="hidden" name="total_amount" value="{{ old('total_amount', 0) }}">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="delivery_time">Hora de Entrega</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                            <input type="datetime-local"
                                                class="form-control @error('delivery_time') is-invalid @enderror"
                                                id="delivery_time" name="delivery_time" value="{{ old('delivery_time') }}"
                                                required>
                                            @error('delivery_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="status">Estado <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select select2 @error('status') is-invalid @enderror"
                                            id="status" name="status" required>
                                            <option value="pending"
                                                {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pendiente
                                            </option>
                                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>
                                                Confirmado</option>
                                            <option value="prepared" {{ old('status') == 'prepared' ? 'selected' : '' }}>
                                                En preparación
                                            </option>
                                            <option value="ready" {{ old('status') == 'ready' ? 'selected' : '' }}>Listo
                                                para entregar</option>
                                            <option value="delivered" {{ old('status') == 'delivered' ? 'selected' : '' }}>
                                                Entregado</option>
                                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>
                                                Cancelado</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="delivery_location">Ubicación de Entrega</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bx-map"></i></span>
                                            <input type="text"
                                                class="form-control @error('delivery_location') is-invalid @enderror"
                                                id="delivery_location" name="delivery_location"
                                                value="{{ old('delivery_location') }}"
                                                placeholder="Ingrese la dirección de entrega">
                                            @error('delivery_location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="notes">Notas</label>
                                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3"
                                            placeholder="Ingrese notas adicionales sobre el pedido">{{ old('notes') }}</textarea>
                                        @error('notes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_urgent" name="is_urgent"
                                            value="1" {{ old('is_urgent') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_urgent">¿Es un pedido urgente?</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                            value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Activo</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Productos del Pedido</label>
                                        <div id="order-items-container">
                                            <!-- Order items will be added here dynamically -->
                                            <div class="alert alert-info">
                                                <i class="bx bx-info-circle me-2"></i> Agregue productos al pedido después
                                                de guardar la información básica.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    @endsection

    @section('scripts')
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- select2 js -->
        <script src="{{ URL::asset('libs/select2/js/select2.min.js') }}"></script>
        <!-- flatpickr js -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr" integrity="sha384-5JqMv4L/Xa0hfvtF06qboNdhvuYXUku9ZrhZh3bSk8VXF0A/RuSLHpLsSV9Zqhl6" crossorigin="anonymous"></script>
        <!-- form validation -->
        <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>

        <script nonce="newN0nc3ForS3cur1ty" >
            $(document).ready(function() {
                // Initialize Select2
                $('.select2').select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    placeholder: 'Seleccione una opción',
                    allowClear: true
                });

                // Set default delivery time to next hour
                const now = new Date();
                now.setHours(now.getHours() + 1, 0, 0, 0); // Próxima hora en punto

                // Formatear la fecha y hora en el formato esperado por datetime-local (YYYY-MM-DDThh:mm)
                const year = now.getFullYear();
                const month = String(now.getMonth() + 1).padStart(2, '0');
                const day = String(now.getDate()).padStart(2, '0');
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = '00';

                document.getElementById('delivery_time').value = `${year}-${month}-${day}T${hours}:${minutes}`;

                // Format subtotal and total amount
                $('#subtotal, #total_amount').on('input', function() {
                    var value = $(this).val();
                    if (value) {
                        value = parseFloat(value).toFixed(2);
                        $(this).val(value);
                    }
                });

                // Initialize tooltips
                $('[data-bs-toggle="tooltip"]').tooltip();
            });
        </script>
    @endsection
