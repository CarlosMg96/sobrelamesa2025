@extends('layouts.master')

@section('title')
    Editar Pedido
@endsection

@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- select2 css -->
    <link href="{{ URL::asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" type="text/css" />
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
    Editar Pedido #{{ $order->order_number }}
@endsection

@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Pedidos</a></li>
            <li class="breadcrumb-item active">Editar Pedido #{{ $order->order_number }}</li>
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
                    <h5 class="card-title">Editar Pedido #{{ $order->order_number }}</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary me-2">
                            <i class="bx bx-arrow-back me-1"></i> Regresar
                        </a>
                        <button type="submit" form="form-update" class="btn btn-warning text-white" id="btn-save">
                            <i class="bx bx-save me-1"></i> Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('orders.update', $order->id) }}" id="form-update" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="user_id">Usuario <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select select2 @error('user_id') is-invalid @enderror"
                                            id="user_id" name="user_id" required>
                                            <option value="">Seleccionar usuario</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }} ({{ $user->email }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="status">Estado <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select select2 @error('status') is-invalid @enderror"
                                            id="status" name="status" required>
                                            <option value="pending"
                                                {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>
                                                Pendiente</option>
                                            <option value="confirmed"
                                                {{ old('status', $order->status) == 'confirmed' ? 'selected' : '' }}>
                                                Confirmado</option>
                                            <option value="prepared"
                                                {{ old('status', $order->status) == 'prepared' ? 'selected' : '' }}>En
                                                preparación</option>
                                            <option value="delivered"
                                                {{ old('status', $order->status) == 'delivered' ? 'selected' : '' }}>
                                                Entregado</option>
                                            <option value="cancelled"
                                                {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>
                                                Cancelado</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="delivery_time">Fecha y Hora de Entrega <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                            <input type="datetime-local"
                                                class="form-control @error('delivery_time') is-invalid @enderror"
                                                id="delivery_time" name="delivery_time"
                                                value="{{ old('delivery_time', $order->delivery_time ? \Carbon\Carbon::parse($order->delivery_time)->format('Y-m-d\TH:i') : '') }}"
                                                required>
                                            @error('delivery_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                                value="{{ old('delivery_location', $order->delivery_location) }}">
                                            @error('delivery_location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Notas</label>
                                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes', $order->notes) }}</textarea>
                                        @error('notes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Campos ocultos para subtotal y total -->
                                <input type="hidden" name="subtotal" value="{{ old('subtotal', $order->subtotal) }}">
                                <input type="hidden" name="total_amount"
                                    value="{{ old('total_amount', $order->total_amount) }}">

                                <!-- Los botones de acción ya están en la parte superior del formulario -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- select 2 js -->
        <script src="{{ URL::asset('libs/select2/js/select2.min.js') }}"></script>
        <!-- flatpickr js -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr" integrity="sha384-5JqMv4L/Xa0hfvtF06qboNdhvuYXUku9ZrhZh3bSk8VXF0A/RuSLHpLsSV9Zqhl6" crossorigin="anonymous"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>

        <script nonce="newN0nc3ForS3cur1ty" >
            document.addEventListener('DOMContentLoaded', function() {
                // Inicializar select2
                $('.select2').select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    placeholder: 'Seleccionar opción',
                    allowClear: true
                });

                // Inicializar flatpickr para fechas
                flatpickr("#delivery_time", {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                    locale: "es",
                    minDate: 'today',
                    defaultDate: "{{ $order->delivery_time ? $order->delivery_time->format('Y-m-d H:i') : '' }}"
                });

                // Validación del formulario
                $('#form-update').on('submit', function(e) {
                    const form = this;
                    e.preventDefault();

                    // Validar campos requeridos
                    let isValid = true;
                    $(this).find('[required]').each(function() {
                        if (!$(this).val()) {
                            isValid = false;
                            $(this).addClass('is-invalid');
                        }
                    });

                    if (!isValid) {
                        // Mostrar mensaje de error en el placeholder
                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                        alertDiv.role = 'alert';
                        alertDiv.innerHTML = `
                            <strong>¡Error!</strong> Por favor complete todos los campos requeridos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        `;
                        document.querySelector('.liveAlertPlaceholder').innerHTML = '';
                        document.querySelector('.liveAlertPlaceholder').appendChild(alertDiv);
                        
                        // Desplazarse al primer campo con error
                        $('html, body').animate({
                            scrollTop: $('.is-invalid').first().offset().top - 100
                        }, 500);
                        
                        return false;
                    }

                    // Deshabilitar el botón de guardar
                    const saveBtn = document.getElementById('btn-save');
                    saveBtn.disabled = true;
                    saveBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Guardando...';

                    // Mostrar confirmación
                    alertify.confirm(
                        'Confirmar Actualización',
                        '¿Está seguro de que desea actualizar este pedido?',
                        function() {
                            form.submit();
                        },
                        function() {
                            alertify.error('Actualización cancelada');
                            // Rehabilitar el botón de guardar
                            saveBtn.disabled = false;
                            saveBtn.innerHTML = '<i class="bx bx-save me-1"></i> Actualizar';
                        }
                    ).set('labels', {ok: 'Sí, actualizar', cancel: 'Cancelar'});
                });

                // Mostrar notificación de éxito si existe
                @if(session('success'))
                    alertify.success("{{ session('success') }}");
                @endif

                // Mostrar notificación de error si existe
                @if(session('error'))
                    alertify.error("{{ session('error') }}");
                @endif
            });
        </script>
    @endsection
