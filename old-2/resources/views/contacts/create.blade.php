@extends('layouts.master')

@section('title')
    Registrar contacto
@endsection

@section('css')
<style nonce="newN0nc3ForS3cur1ty" >
    .bg-color {
        background-color: #1D1D1D;
        color: white;
    }

    .form-section {
        max-width: 1000px;
        margin: auto;
        padding: 1rem;
    }

    .image-upload {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 1.5rem;
        cursor: pointer;
        position: relative;
    }

    .image-box {
        background-color: #2C2C2C;
        width: 90px;
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        margin-bottom: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px dashed transparent;
    }

    .image-box:hover {
        background-color: #3C3C3C;
        border-color: #FFC629;
    }

    .image-upload input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        top: 0;
        left: 0;
    }

    .image-preview {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 4px;
        display: none;
    }

    .section-title {
        background-color: #FFC629;
        padding: 0.3rem 0.8rem;
        font-weight: bold;
        color: black;
        display: inline-block;
        margin: 1.2rem 0 0.8rem 0;
        border-radius: 2px;
    }

    .btn-cancel {
        background: none;
        border: none;
        color: #FFC629;
        font-weight: 500;
        padding: 0.6rem 1rem;
        cursor: pointer;
    }

    .btn-accept {
        background-color: #FFC629;
        border: none;
        color: black;
        font-weight: bold;
        padding: 0.6rem 1.2rem;
        border-radius: 3px;
        cursor: pointer;
    }

    input.form-control {
        background-color: #FEFDFD1A !important;
        border: none !important;
        color: white !important;
        border-radius: 4px !important;
    }

    input.form-control:focus {
        background-color: #FEFDFD1A !important;
        border: 1px solid #FFC629 !important;
        color: white !important;
        box-shadow: none !important;
    }

    .invalid-feedback {
        color: #ff6b6b;
        font-size: 0.875rem;
    }

    .ff-gelasio {
        font-family: 'Gelasio', serif;
        font-size: 1.2rem;
    }
</style>
@endsection

@section('body')
<body data-topbar="dark" class="bg-color">
@endsection

@section('content')
<div class="bg-color">
    <div class="container form-section">

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul  nonce="newN0nc3ForS3cur1ty" style="color: #ff6b6b;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="image-upload">
                <div class="image-box">
                    <i class="fas fa-image" id="imageIcon" nonce="newN0nc3ForS3cur1ty" style="font-size: 24px; color: white;"></i>
                    <img id="imagePreview" class="image-preview" alt="Preview">
                </div>
                <input type="file" id="imageInput" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                @push('scripts')
                <script src="{{ asset('js/pages/contacts.init.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
                @endpush
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small  nonce="newN0nc3ForS3cur1ty" style="color: #ccc; margin-top: 0.5rem; text-align: center;">Haz clic para subir imagen</small>
            </div>

            <div class="section-title ff-gelasio">Datos personales</div>
            <div class="row">
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre Completo" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Puesto" value="{{ old('position') }}">
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Teléfono fijo" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Teléfono móvil" value="{{ old('mobile') }}">
                    @error('mobile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="specialty" class="form-control @error('specialty') is-invalid @enderror" placeholder="Especialidad o área de práctica" value="{{ old('specialty') }}">
                    @error('specialty')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="section-title ff-gelasio">Despacho / Empresa</div>
            <div class="row">
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="firm" class="form-control @error('firm') is-invalid @enderror" placeholder="Nombre del despacho / Empresa" value="{{ old('firm') }}">
                    @error('firm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" placeholder="País" value="{{ old('country') }}">
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="region" class="form-control @error('region') is-invalid @enderror" placeholder="Región" value="{{ old('region') }}">
                    @error('region')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Ciudad" value="{{ old('city') }}">
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="url" name="website" class="form-control @error('website') is-invalid @enderror" placeholder="Sitio web" value="{{ old('website') }}">
                    @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('contacts') }}" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-accept">Aceptar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty" ></script>
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

    const imageUpload = document.querySelector('.image-upload');

    imageUpload.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.backgroundColor = '#3C3C3C';
    });

    imageUpload.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.style.backgroundColor = '';
    });

    imageUpload.addEventListener('drop', function(e) {
        e.preventDefault();
        this.style.backgroundColor = '';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const imageInput = document.getElementById('imageInput');
            imageInput.files = files;
            previewImage(imageInput);
        }
    });
</script>
@endsection
