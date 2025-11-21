@extends('layouts.master')

@section('title', 'TAKO&TAKO - Beneficios')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/takotako.css') }}">
    <style nonce="newN0nc3ForS3cur1ty">
        /* RESETS */
        .page-content .container-fluid {
            max-width: 100% !important;
        }

        .page-content {
            padding: 0px !important;
        }

        .container-fluid,
        .container-sm,
        .container-md,
        .container-lg,
        .container-xl,
        .container-xxl {
            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        .container,
        .container-fluid,
        .container-xxl,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
            --bs-gutter-x: 0px !important;
        }

        .requirements-card {
            height: 100px;
            padding: 17px 23px;
            background: black;
            justify-content: center;
            width: 100%;
        }

        footer {
            position: static !important;
        }
    </style>

@section('body')

    <body data-topbar="dark">
    @endsection

    @section('content')

        <div class="dashboard-container mt-5">
            <div class="dashboard-content mt-3">
                <div class="takotako-container">
                    <!-- Header con flecha de regreso -->
                    <div class="takotako-header">
                        <div class="back-button-container">
                            <a href="{{ route('benefits') }}" class="back-button">
                                <img src="{{ asset('images/sponsors/ArrowBack.svg') }}" alt="Regresar" class="back-arrow"
                                    draggable="false">
                            </a>
                        </div>
                    </div>

                    <!-- Imagen principal -->
                    <img src="{{ asset('images/sponsors/TAKOSTAKOS.png') }}" alt="TAKO&TAKO" class="takotako-main-image"
                        draggable="false" />

                    <!-- Tarjeta de descuento -->
                    <div class="discount-card">
                        <div class="discount-info">
                            <div class="discount-percentage">10%</div>
                            <div class="discount-text">de descuento</div>
                        </div>
                        <div class="discount-description">Sobre el total de tu cuenta</div>
                    </div>

                    <!-- Nota informativa -->
                    <div class="info-note">
                        <div class="info-content">
                            <div class="card-info">
                                <span class="card-text">Válido solamente con</span><br />
                                <span class="card-highlight">Tarjeta Digital Galicia</span>
                            </div>
                            <div class="separator">|</div>
                            <div class="rrhh-info">Solicítala a RRHH</div>
                        </div>
                    </div>
                    <a href="{{ route('my.credential') }}" class="benefit-card requirements-card"
                        style="background-color: #FFC629; display: flex; align-items: center; padding: 10px 15px; color: black">
                        <i class="fas fa-id-card" style="margin-right: 10px;"></i> <!-- Credential Icon -->
                        <div class="text-black text-decoration-none" style="text-align: center;">
                            credencial GALICIA
                        </div>
                        <i class="fas fa-arrow-right" style="margin-left: 10px;"></i> <!-- Right Arrow Icon -->
                    </a>
                </div>
            </div>
        </div>
    @endsection

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/takotako.css') }}">
    @endpush

    @push('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty">
            // Inicializar página TAKO&TAKO
            document.addEventListener('DOMContentLoaded', function() {
                initTakotakoPage();
            });

            function initTakotakoPage() {
                // Configurar evento para la flecha de regreso
                const backIcon = document.querySelector('.back-button');
                if (backIcon) {
                    backIcon.addEventListener('click', function() {
                        window.history.back();
                    });

                    // Navegación por teclado
                    backIcon.addEventListener('keydown', function(e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            window.history.back();
                        }
                    });
                }

                // Iniciar animaciones
                startTakotakoAnimations();
            }

            function startTakotakoAnimations() {
                // Las animaciones se activan automáticamente con CSS
                // console.log('TAKO&TAKO page animations started');
            }

            function goBack() {
                window.history.back();
            }
        </script>
    @endpush
