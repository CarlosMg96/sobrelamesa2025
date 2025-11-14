@extends('layouts.master')
@section('title')
    Nuevo Platillo
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
    <link href="{{ URL::asset('libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Nuevo Platillo
@endsection
@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('menu_items.index') }}">Platillos</a></li>
            <li class="breadcrumb-item active">Nuevo Platillo</li>
        </ol>
    </div>
@endsection
@section('body')
    <body data-topbar="dark" class="bg-color">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Nuevo Platillo</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>


                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>
        </div>
        <!-- end row -->
        
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('menu_items.store') }}" id="form-store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Paquete a crear <span class="text-danger">*</span></label>
                                        <select class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                            <option value="">Seleccione un paquete</option>
                                            <option value="Paquete 1" {{ old('name') == 'Paquete 1' ? 'selected' : '' }}>Paquete 1</option>
                                            <option value="Paquete 2" {{ old('name') == 'Paquete 2' ? 'selected' : '' }}>Paquete 2</option>
                                        </select>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="mb-3">
                                        <label class="form-label" for="available_date">Fecha de disponibilidad <span class="text-danger">*</span></label>
                                        <input type="date" 
                                            class="form-control @error('available_date') is-invalid @enderror" 
                                            id="available_date" 
                                            name="available_date" 
                                            value="{{ old('available_date') }}" 
                                            required>
                                        @error('available_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Descripción</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="3" 
                                                  placeholder="Ingrese una descripción del platillo">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ingredients">Ingredientes</label>
                                        <textarea class="form-control @error('ingredients') is-invalid @enderror" 
                                                  id="ingredients" name="ingredients" rows="3" 
                                                  placeholder="Lista de ingredientes separados por coma">{{ old('ingredients') }}</textarea>
                                        @error('ingredients')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="allergens">Alérgenos</label>
                                        <input type="text" class="form-control @error('allergens') is-invalid @enderror" 
                                               placeholder="Ej: Gluten, lácteos, frutos secos..." id="allergens" name="allergens" 
                                               value="{{ old('allergens') }}">
                                        @error('allergens')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="preparation_time">Tiempo de Preparación (minutos)</label>
                                        <input type="number" class="form-control @error('preparation_time') is-invalid @enderror" 
                                               id="preparation_time" name="preparation_time" 
                                               value="{{ old('preparation_time') }}" min="0">
                                        @error('preparation_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Imagen del Platillo</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_available" name="is_available" 
                                               value="1" {{ old('is_available', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_available">Disponible</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                               value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Activo</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btn-save"  nonce="newN0nc3ForS3cur1ty" style="display: none;"></button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
        <div class="row">
            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>
            <div class="col-md-12">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('menu_items.index') }}" class="btn btn-secondary me-2">
                            <i class="bx bx-arrow-back me-1"></i> Regresar
                        </a>
                     <button type="button" onclick="submitForm()" class="btn btn-warning text-black">
                        <i class="bx bx-save me-1"></i> Guardar
                    </button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- dropzone js -->
        <script src="{{ URL::asset('libs/dropzone/min/dropzone.min.js') }}"></script>
        <!-- select 2 js -->
        <script src="{{ URL::asset('libs/select2/js/select2.min.js') }}"></script>
        <!-- form validation -->
        <script src="{{ URL::asset('libs/parsleyjs/parsley.min.js') }}"></script>
        <!-- form validation init -->
        <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>

        <script nonce="newN0nc3ForS3cur1ty" >
            function submitForm() {
                const btn = document.querySelector('button[onclick="submitForm()"]');
                if (btn) {
                    btn.disabled = true;
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...';
                }

                document.getElementById('form-store').submit();
            }

            $(document).ready(function() {
                // Initialize select2
                $('#category_id').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Seleccione una categoría',
                    allowClear: true
                });


                // Format price input
                $('#price').on('input', function() {
                    var value = $(this).val();
                    if (value) {
                        value = parseFloat(value).toFixed(2);
                        $(this).val(value);
                    }
                });

                // Format discount percentage
                $('#discount_percentage').on('input', function() {
                    var value = $(this).val();
                    if (value) {
                        value = parseFloat(value).toFixed(2);
                        $(this).val(value);
                    }
                });

                // Initialize tooltips
                $('[data-bs-toggle="tooltip"]').tooltip();
            });

              document.addEventListener('DOMContentLoaded', function () {
                const fechaInput = document.getElementById('available_date');

                fechaInput.addEventListener('input', function () {
                    const selectedDate = new Date(this.value);
                    const day = selectedDate.getUTCDay();

                    if (day === 0 || day === 6) { // 0 = domingo, 6 = sábado
                        alertify.error('No se pueden seleccionar fines de semana. Por favor, elija un día entre lunes y viernes.');
                        this.value = '';
                    }
                });
            });
        </script>
    @endsection
