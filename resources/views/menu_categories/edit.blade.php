@extends('layouts.master')
@section('title')
    Editar Categoría de Menú
@endsection

@section('css')
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
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
    Editar Categoría de Menú
@endsection

@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('menu_categories.index') }}">Categorías de Menú</a></li>
            <li class="breadcrumb-item active">Editar Categoría</li>
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
                    <h5 class="card-title">Editar Categoría de Menú</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('menu_categories.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Cancelar
                        </a>
                        <button type="submit" form="form-update" class="btn btn-warning text-black" id="btn-save">
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
                        <form action="{{ route('menu_categories.update', ['menuCategory' => $menuCategory->id]) }}" id="form-update"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nombre de la Categoría <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Ingrese el nombre de la categoría" id="name" name="name"
                                            value="{{ old('name', $menuCategory->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="icon">Ícono</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i id="icon-preview"
                                                    class='{{ old('icon', $menuCategory->icon) ?: 'bx bx-image' }}'></i></span>
                                            <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                                placeholder="bx bx-restaurant" id="icon" name="icon"
                                                value="{{ old('icon', $menuCategory->icon) }}">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="toggle-icon-selector">
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3" placeholder="Ingrese una descripción de la categoría">{{ old('description', $menuCategory->description) }}</textarea>
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
                                            value="{{ old('sort_order', $menuCategory->sort_order) }}" min="0">
                                        <small class="text-muted">Se usará para ordenar las categorías en el menú</small>
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                            value="1"
                                            {{ old('is_active', $menuCategory->is_active) ? 'checked' : '' }}>
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
    @endsection

    @section('scripts')
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <script nonce="newN0nc3ForS3cur1ty" >
            // Icon selector functionality
            document.addEventListener('DOMContentLoaded', function() {
                const iconInput = document.getElementById('icon');
                const iconPreview = document.getElementById('icon-preview');
                const iconSelector = document.getElementById('icon-selector');
                const toggleButton = document.getElementById('toggle-icon-selector');

                // Common BoxIcons for menu categories
                const commonIcons = [
                    'bx bx-food-menu', 'bx bx-restaurant', 'bx bx-dish', 'bx bx-bowl-rice', 'bx bx-bowl-hot',
                    'bx bx-drink', 'bx bx-coffee-togo', 'bx bx-cake', 'bx bx-ice-cream', 'bx bx-pizza',
                    'bx bx-baguette', 'bx bx-bowl', 'bx bx-bowl-food', 'bx bx-bowl-noodles', 'bx bx-bowl-rice',
                    'bx bx-bowl-hot', 'bx bx-bowl-steam', 'bx bx-bowl-rice-cook', 'bx bx-bowl-hot-soup',
                    'bx bx-bowl-cereal'
                ];

                // Populate icon selector
                const iconList = document.createElement('div');
                commonIcons.forEach(icon => {
                    const iconOption = document.createElement('div');
                    iconOption.className = 'icon-option';
                    iconOption.innerHTML = `<i class='${icon}'></i>`;
                    iconOption.title = icon;
                    iconOption.addEventListener('click', function() {
                        iconInput.value = icon;
                        iconPreview.className = icon;
                        iconSelector.style.display = 'none';
                    });
                    iconList.appendChild(iconOption);
                });
                iconSelector.appendChild(iconList);

                // Toggle icon selector
                toggleButton.addEventListener('click', function() {
                    iconSelector.style.display = iconSelector.style.display === 'block' ? 'none' : 'block';
                });

                // Update preview when typing
                iconInput.addEventListener('input', function() {
                    iconPreview.className = this.value || 'bx bx-image';
                });

                // Close icon selector when clicking outside
                document.addEventListener('click', function(event) {
                    if (!iconSelector.contains(event.target) && event.target !== toggleButton) {
                        iconSelector.style.display = 'none';
                    }
                });
            });
        </script>
    @endsection
