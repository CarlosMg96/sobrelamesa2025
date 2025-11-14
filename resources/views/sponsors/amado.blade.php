@extends('layouts.master')

@section('title', 'AMADO - Pareje Latino')

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
                <!-- Back Button -->
                <div class="back-button-container">
                    <a href="{{ route('benefits') }}" class="back-button">
                        <img src="{{ asset('images/sponsors/ArrowBack.svg') }}" alt="Regresar" class="back-arrow"
                            draggable="false">
                    </a>
                </div>

                <!-- SEDI Content -->
                <div class="sedi-container">
                    <!-- Main Image -->
                    <img src="{{ asset('images/sponsors/logo_amado.jpg') }}" alt="AMADO - Pareje Latino"
                        class="sedi-main-image" draggable="false">

                    <!-- Main Title -->
                    <div class="sedi-title">
                        <h1>Amado</h1>
                    </div>

                    {{-- <!-- Information Text -->
            <div class="sedi-info-text">
                <p>Para mayor información puedes ingresar a</p>
            </div>

            <!-- Website Link -->
            <div class="sedi-website-link">
                <a href="https://www.sedi.edu.mx/" target="_blank" class="website-button">
                    <span>https://www.sedi.edu.mx/</span>
                </a>
            </div> --}}

                    <!-- Divider -->
                    <div class="section-divider"></div>

                    <!-- Benefits Section -->
                    <div class="sedi-benefits">
                        <!-- 15% Discount Benefit -->
                        <div class="benefit-card discount-card">
                            <div class="discount-percentage">
                                <div class="percentage-number">15%</div>
                                <div class="percentage-text">de descuento</div>
                            </div>
                            <div class="benefit-content">
                                <p>
                                    En alimentos
                                </p>
                                <p style="font-size: 10px; font-weight: 20">
                                    Bebidas alcohólicas no incluidas
                                    <br>
                                    No acumulable con otras
                                    promociones.
                                </p>
                            </div>
                        </div>

                        <!-- Requirements Info -->
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
        </div>
    @endsection

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/sedi.css') }}">
    @endpush

    @push('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty">
            // Función para volver atrás
            function goBack() {
                window.history.back();
            }

            // Agregar funcionalidad a los botones
            document.addEventListener('DOMContentLoaded', function() {
                // Botón del sitio web
                const websiteButton = document.querySelector('.website-button');
                if (websiteButton) {
                    websiteButton.addEventListener('click', function() {
                        // El enlace ya está configurado para abrir en nueva pestaña
                        // console.log('Redirigiendo a SEDI...');
                    });
                }
            });
        </script>
    @endpush
