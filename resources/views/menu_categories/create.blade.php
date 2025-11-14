@extends('layouts.master')
@section('title')
    Nueva Categoría de Menú
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
    
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style nonce="newN0nc3ForS3cur1ty" >
        .icon-preview {
            font-size: 24px;
            margin-right: 10px;
            vertical-align: middle;
        }
        .icon-selector {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 10px;
            display: none;
        }
        .icon-option {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            cursor: pointer;
            border-radius: 3px;
        }
        .icon-option:hover {
            background-color: #f8f9fa;
        }
        .icon-option i {
            margin-right: 5px;
        }
    </style>
@endsection

@section('page-title')
    Nueva Categoría de Menú
@endsection

@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('menu_categories.index') }}">Categorías de Menú</a></li>
            <li class="breadcrumb-item active">Nueva Categoría</li>
        </ol>
    </div>
@endsection

@section('body')
    <body data-layout="horizontal" data-topbar="dark">
    @endsection

    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Nueva Categoría de Menú</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('menu_categories.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Cancelar
                        </a>
                        <button type="submit" form="form-store" class="btn btn-warning text-black" id="btn-save">
                            <i class="bx bx-save me-1"></i> Guardar
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
        <!-- end row -->
        
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('menu_categories.store') }}" id="form-store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nombre de la Categoría <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               placeholder="Ingrese el nombre de la categoría" id="name" name="name" 
                                               value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="icon">Ícono</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i id="icon-preview" class='bx bx-image'></i></span>
                                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                                   placeholder="bx bx-restaurant" id="icon" name="icon" 
                                                   value="{{ old('icon') }}">
                                            <button class="btn btn-outline-secondary" type="button" id="toggle-icon-selector">
                                                <i class='bx bx-list-ul'></i>
                                            </button>
                                            @error('icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="icon-selector" class="icon-selector">
                                            <!-- Icons will be populated by JavaScript -->
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Descripción</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="3" 
                                                  placeholder="Ingrese una descripción de la categoría">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="sort_order">Orden</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                               id="sort_order" name="sort_order" 
                                               value="{{ old('sort_order', 0) }}" min="0">
                                        <small class="text-muted">Se usará para ordenar las categorías en el menú</small>
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                               value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Activa</label>
                                        <div class="form-text">Las categorías inactivas no se mostrarán en el menú</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection

    @section('scripts')
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        
        <!-- dropzone plugin -->
        <script src="{{ URL::asset('libs/dropzone/min/dropzone.min.js') }}"></script>
        
        <!-- select 2 plugin -->
        <script src="{{ URL::asset('libs/select2/js/select2.min.js') }}"></script>
        
        <!-- form validation -->
        <script src="{{ URL::asset('js/pages/form-validation.init.js') }}"></script>
        
        <script nonce="newN0nc3ForS3cur1ty" >
            $(document).ready(function() {
                // Initialize select2
                $('.select2').select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    placeholder: 'Seleccione una opción',
                    allowClear: true
                });
                
                // Handle icon preview and selection
                const iconPreview = $('#icon-preview');
                const iconInput = $('#icon');
                const iconSelector = $('#icon-selector');
                const toggleIconSelector = $('#toggle-icon-selector');
                
                // Common BoxIcons for menu categories
                const commonIcons = [
                    'bx-restaurant', 'bx-food-menu', 'bx-bowl-rice', 'bx-bowl-hot', 'bx-bowl', 
                    'bx-coffee-togo', 'bx-coffee', 'bx-drink', 'bx-beer', 'bx-wine', 'bx-cake', 
                    'bx-ice-cream', 'bx-cookie', 'bx-baguette', 'bx-bread-slice', 'bx-pizza', 
                    'bx-hamburger', 'bx-hot', 'bx-bowl-chopsticks', 'bx-bowl-noodles', 'bx-bowl-steam',
                    'bx-sushi', 'bx-fork', 'bx-knife', 'bx-dish', 'bx-dish-meal', 'bx-dish-hot',
                    'bx-dish-cold', 'bx-dish-veg', 'bx-dish-non-veg', 'bx-dish-meal-1', 'bx-dish-meal-2',
                    'bx-dish-meal-3', 'bx-dish-meal-4', 'bx-dish-meal-5', 'bx-dish-meal-6', 'bx-dish-meal-7'
                ];
                
                // Populate icon selector
                function populateIconSelector() {
                    const container = document.getElementById('icon-selector');
                    container.innerHTML = '';
                    
                    commonIcons.forEach(icon => {
                        const div = document.createElement('div');
                        div.className = 'icon-option';
                        div.innerHTML = `<i class='bx ${icon}'></i> ${icon}`;
                        div.onclick = function() {
                            iconInput.val(icon);
                            iconPreview.removeClass().addClass('bx ' + icon);
                            iconSelector.hide();
                        };
                        container.appendChild(div);
                    });
                }
                
                // Toggle icon selector
                toggleIconSelector.on('click', function() {
                    if (iconSelector.is(':visible')) {
                        iconSelector.hide();
                    } else {
                        if ($('#icon-selector').children().length === 0) {
                            populateIconSelector();
                        }
                        iconSelector.show();
                    }
                });
                
                // Update icon preview when input changes
                iconInput.on('input', function() {
                    const iconClass = $(this).val().trim();
                    if (iconClass) {
                        iconPreview.removeClass().addClass('bx ' + iconClass);
                    } else {
                        iconPreview.removeClass().addClass('bx bx-image');
                    }
                });
                
                // Hide icon selector when clicking outside
                $(document).on('click', function(e) {
                    if (!$(e.target).closest('#icon, #toggle-icon-selector').length) {
                        iconSelector.hide();
                    }
                });
                
                // Initialize icon preview if there's a value
                if (iconInput.val()) {
                    iconPreview.removeClass().addClass('bx ' + iconInput.val());
                }
            });
            
            // Form submission handling
            document.getElementById('form-store').addEventListener('submit', function(e) {
                const form = this;
                const submitButton = document.getElementById('btn-save');
                const originalButtonText = submitButton.innerHTML;
                
                // Disable button and show loading state
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Guardando...';
                
                // If form is valid, it will submit, otherwise the button will be re-enabled by the validation
                if (!form.checkValidity()) {
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;
                }
            });
        </script>
    @endsection