@extends('layouts.master')

@section('title', 'Club Atletico')

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
                    <img src="{{ asset('images/sponsors/logo_club.jpg') }}" alt="Club de Atletismo" class="sedi-main-image"
                        draggable="false">
                    <!-- Main Title -->
                    <div class="sedi-title">
                        <h1>Club Atletico</h1>
                    </div>



                    <!-- Divider -->
                    <div class="section-divider"></div>
                    <!-- Membership Section -->
                    <div class="membership-section" style="background-color: #fbbd11 !important;">
                        <div class="benefit-card discount-card"
                            style="border: none !important; margin-bottom: 10px !important;">
                            <div class="percentage-number" style="font-size: 24px; color: black; font-weight: bold">$17,700
                            </div>
                            <div class="benefit-content">
                                <span style="color: black">Membresía individual <span
                                        style="color: black; font-weight: bold">Semestral</span></span>
                                <span style="color: black">Horario 14 a 22 hrs</span>
                            </div>
                        </div>

                    </div>
                    <div class="membership-section" style="background-color: #fbbd11 !important;">

                        <div class="benefit-card discount-card"
                            style="border: none !important; margin-bottom: 10px !important;">
                            <div class="percentage-number" style="font-size: 24px; color: black">$27,700</div>
                            <div class="benefit-content">
                                <span style="color: black">Membresía individual <span
                                        style="color: black; font-weight: bold">Anual</span></span>
                                <span style="color: black">Horario 14 a 22 hrs</span>
                            </div>
                        </div>
                    </div>
                    <!-- Benefits Section -->
                    <div class="sedi-benefits">
                        <div class="benefit-card-double discount-card-double">
                            <h2 style="color: #fbbd11">Tennis y Pickleball</h2>
                            <div style="display: inline-flex; gap: 10px">
                                <div class="benefit-content-double">
                                    <p style="color: white">
                                        Por la mañana
                                    </p>
                                    <span><span style="color: #fbbd11; margin-right: 5px">$460</span> <span
                                            style="color: white">renta</span></span>
                                    <br>
                                    <span><span style="color: #fbbd11; margin-right: 5px">$690</span> <span
                                            style="color: white">clase</span></span>
                                </div>
                                <div class="benefit-content-double">
                                    <p style="color: white">
                                        Por la tarde
                                    </p>
                                    <span><span style="color: #fbbd11; margin-right: 5px">$405</span> <span
                                            style="color: white">renta</span></span>
                                    <br>
                                    <span><span style="color: #fbbd11; margin-right: 5px">$435</span> <span
                                            style="color: white">clase</span></span>
                                </div>
                            </div>

                        </div>

                        <!-- 15% Discount Benefit -->
                        <div class="benefit-card discount-card">
                            <div class="discount-percentage">
                                <div class="percentage-number">$600</div>
                                {{-- <div class="percentage-text">de descuento</div> --}}
                            </div>
                            <div class="benefit-content">
                                <p>Sobre la tarifa de inscripción vigente</p>
                            </div>
                        </div>

                        <!-- 5% Discount Benefit -->
                        <div class="benefit-card discount-card">
                            <div class="discount-percentage">
                                <div class="percentage-number">15%</div>
                                <div class="percentage-text">de descuento</div>
                            </div>
                            <div class="benefit-content">
                                <p>Faciales y masajes</p>
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
