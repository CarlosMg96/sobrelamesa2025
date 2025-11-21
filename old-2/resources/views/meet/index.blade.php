@extends('layouts.master')

@section('title', 'Meet Page')

@section('styles')
    <style nonce="newN0nc3ForS3cur1ty" >
        .auto-redirect-message {
            text-align: center;
            margin-top: 100px;
            font-size: 1.2rem;
            color: #333;
        }

        .btn-amber {
            color: #000 !important;
            background-color: #FFC72C !important;
            border-color: transparent !important;
        }

        .btn-amber:hover,
        .btn-amber:focus,
        .btn-amber:active {
            background-color: #e6b825 !important;
            color: #000 !important;
            border-color: transparent !important;
            box-shadow: none !important;
        }

    </style>
@endsection

@section('body')
<body class="bg-color" data-topbar="dark">
@endsection

@section('content')
    <div class="container">
        @if ($userHasAccess)
            <div class="auto-redirect-message">
                <p>Redireccionando a Galicia... por favor espera.</p>
            </div>

            <form id="autoPostForm" action="https://www.galicia.com.mx/links/meet" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                <input type="hidden" name="direct_number" value="{{ Auth::user()->direct_number }}">
            </form>
        @else
            <div class="no-access-message"  nonce="newN0nc3ForS3cur1ty" style="max-width: 600px; margin: auto; font-family: Arial, sans-serif;">
                <h2  nonce="newN0nc3ForS3cur1ty" style="color: #000;">#GaliciaMeet</h2>
                <p>
                    Esta es nuestra agenda digital y plataforma para viajes institucionales de grupos o equipos de socios y consejeros
                    para administrar, visualizar, gestionar y dar seguimiento a tus reuniones en México y en el extranjero.
                </p>

                

                <div  nonce="newN0nc3ForS3cur1ty" style="background-color: #FFC72C; padding: 10px; margin-top: 20px;">
                    <strong>Nota*</strong> Para solicitar acceso a esta herramienta, <b>envía por correo y con 2 semanas de anticipación a tu viaje o reunión,</b> el siguiente Formato en Excel a Leslie Rivas (<a href="mailto:lrivas@galicia.com.mx">lrivas@galicia.com.mx</a>) y a Cristina Green (<a href="mailto:cgreen@galicia.com.mx">cgreen@galicia.com.mx</a>).
Únicamente quienes asistan al viaje o reunión y estén registrados en el Excel podrán tener acceso al #GaliciaMeet.</div>

                <div  nonce="newN0nc3ForS3cur1ty" style="margin-top: 20px;">
                    <a href="{{ route('meet.download-excel') }}" class="btn btn-success"> <i class="bx bx-download"></i> Descargar Excel</a>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script nonce="newN0nc3ForS3cur1ty" >
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('autoPostForm');
            if (form) {
                setTimeout(function() {
                    form.submit();
                }, 1000); // 1 segundo de espera antes de redirigir
            }
        });
    </script>
@endsection
