@extends('layouts.master')

@section('title', 'COME BIEN - Beneficios')

@section('body')

    <body data-topbar="dark">
    @endsection

    @section('content')

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

            footer {
                position: static !important;
            }
        </style>

        <div class="dashboard-container mt-5">
            <div class="dashboard-content mt-3">
                <div class="comebien-container">
                    <!-- Header con flecha de regreso -->
                    <div class="comebien-header">
                        <div class="back-button-container">
                            <a href="{{ route('benefits') }}" class="back-button">
                                <img src="{{ asset('images/sponsors/ArrowBack.svg') }}" alt="Regresar" class="back-arrow"
                                    draggable="false">
                            </a>
                        </div>
                    </div>

                    <!-- Imagen principal -->
                    <img src="{{ asset('images/sponsors/COMEBIEN.png') }}" alt="COME BIEN" class="comebien-main-image"
                        draggable="false" />

                    <!-- Contenedor de pasos -->
                    <div class="comebien-steps">
                        <!-- Paso 1 -->
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <a href="https://mkp.icomebien.mx/empresas/menu" target="_blank" class="step-action">Ingresa
                                    a la página</a>
                                <div class="step-subtitle">o solicita a RRHH que te envíe la invitación</div>
                            </div>
                        </div>

                        <!-- Paso 2 -->
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <div class="step-description">Crea una cuenta con tu correo corporativo</div>
                            </div>
                        </div>

                        <!-- Paso 3 -->
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <div class="step-description">Elige un plato fuerte, sopa y postre, todo por $130.00</div>
                            </div>
                        </div>

                        <!-- Paso 4 -->
                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <div class="step-description">Puedes pagar con tus vales de despensa</div>
                            </div>
                        </div>
                    </div>
                    {{-- <a href="{{ route('my.credential') }}" class="benefit-card requirements-card"
                        style="background-color: #FFC629; display: flex; align-items: center; padding: 10px 15px; color: black">
                        <i class="fas fa-id-card" style="margin-right: 10px;"></i> <!-- Credential Icon -->
                        <div class="text-black text-decoration-none" style="text-align: center;">
                            credencial GALICIA
                        </div>
                        <i class="fas fa-arrow-right" style="margin-left: 10px;"></i> <!-- Right Arrow Icon -->
                    </a> --}}
                </div>
            </div>
        </div>
    @endsection

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/comebien.css') }}">
    @endpush

    @push('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty">
            // Inicializar página COME BIEN
            document.addEventListener('DOMContentLoaded', function() {
                initComebienPage();
            });

            function initComebienPage() {
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
                startComebienAnimations();
            }

            function startComebienAnimations() {
                // Las animaciones se activan automáticamente con CSS
                // console.log('COME BIEN page animations started');
            }

            function goBack() {
                window.history.back();
            }
        </script>
    @endpush
