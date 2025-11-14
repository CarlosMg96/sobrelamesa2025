@extends('layouts.master')
@section('title')
    Editar Platillo
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
    Editar Platillo
@endsection
@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('menu_items.index') }}">Platillos</a></li>
            <li class="breadcrumb-item active">Editar Platillo</li>
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
                    <h5 class="card-title">Editar Platillo</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('menu_items.index') }}" class="btn btn-secondary me-2">
                            <i class="bx bx-arrow-back me-1"></i> Regresar
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
        <!-- end row -->
        
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('menu_items.update', $menuItem->id) }}" id="form-update" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nombre del Platillo <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               placeholder="Ingrese el nombre del platillo" id="name" name="name" 
                                               value="{{ old('name', $menuItem->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="category_id">Categoría <span class="text-danger">*</span></label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" 
                                                id="category_id" name="category_id" required>
                                            <option value="">Seleccione una categoría</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="price">Precio <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                                   placeholder="0.00" id="price" name="price" 
                                                   value="{{ old('price', $menuItem->price) }}" required>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="discount_percentage">Porcentaje de Descuento</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" min="0" max="100" class="form-control @error('discount_percentage') is-invalid @enderror" 
                                                   placeholder="0" id="discount_percentage" name="discount_percentage" 
                                                   value="{{ old('discount_percentage', $menuItem->discount_percentage) }}">
                                            <span class="input-group-text">%</span>
                                            @error('discount_percentage')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Descripción</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="3" 
                                                  placeholder="Ingrese una descripción del platillo">{{ old('description', $menuItem->description) }}</textarea>
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
                                                  placeholder="Lista de ingredientes separados por coma">{{ old('ingredients', $menuItem->ingredients) }}</textarea>
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
                                               value="{{ old('allergens', $menuItem->allergens) }}">
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
                                               value="{{ old('preparation_time', $menuItem->preparation_time) }}" min="0">
                                        @error('preparation_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="sort_order">Orden</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                               id="sort_order" name="sort_order" 
                                               value="{{ old('sort_order', $menuItem->sort_order) }}" min="0">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Imagen del Platillo</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*">
                                        @if($menuItem->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $menuItem->image) }}" alt="{{ $menuItem->name }}" class="img-thumbnail"  nonce="newN0nc3ForS3cur1ty" style="max-height: 100px;">
                                            </div>
                                        @endif
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_available" name="is_available" 
                                               value="1" {{ old('is_available', $menuItem->is_available) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_available">Disponible</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                               value="1" {{ old('is_active', $menuItem->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Activo</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
        <div class="row">
            <div class="col-12">
                <div class="text-end">
                    <a href="{{ route('menu_items.index') }}" class="btn btn-secondary me-2">
                        <i class="bx bx-arrow-back me-1"></i> Cancelar
                    </a>
                    <button type="submit" form="form-update" class="btn btn-warning text-black" id="btn-update">
                        <i class="bx bx-save me-1"></i> Actualizar Platillo
                    </button>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- select 2 plugin -->
        <script src="{{ URL::asset('libs/select2/js/select2.min.js') }}"></script>
        <!-- dropzone plugin -->
        <script src="{{ URL::asset('libs/dropzone/min/dropzone.min.js') }}"></script>
        <!-- init js -->
        <script nonce="newN0nc3ForS3cur1ty" >
            $(document).ready(function() {
                // Initialize select2
                $('.select2').select2({
                    theme: 'bootstrap-5',
                    width: '100%'
                });

                // Handle form submission
                $('#form-update').on('submit', function(e) {
                    e.preventDefault();
                    
                    // Disable submit button
                    $('#btn-update').prop('disabled', true);
                    $('#btn-update').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Procesando...');
                    
                    // Submit form
                    this.submit();
                });

                // Show success message if exists
                @if(session('status'))
                    alertify.success("{{ session('status') }}");
                @endif

                // Show validation errors
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        alertify.error("{{ $error }}");
                    @endforeach
                @endif
            });
        </script>
    @endsection
