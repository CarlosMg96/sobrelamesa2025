@extends('layouts.master')

@section('title', 'Yoshimi - Restaurante')

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
                    <img src="{{ asset('images/sponsors/logo_yoshimi.jpg') }}" alt="Yoshimi - Restaurante"
                        class="sedi-main-image" draggable="false">

                    <!-- Main Title -->
                    <div class="sedi-title">
                        <h1>Yoshimi Restaurant</h1>
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


                            <!-- Menu Section -->
                            <div class="menu-section">
                                <h2 class="menu-title-benefic">Menú ejecutivo</h2>
                                <p class="menu-availability">Disponibles de 1 a 4 pm</p>

                                <div class="menu-item">
                                    <span class="menu-price">$750</span>
                                    <p class="menu-description">Kaiso sarada (lechugas, algas marinas, aderezo de ajonjolí y
                                        cítricos) + Midori maki (sushi vegetariano, sopa miso) + Mochi ice (1 pieza)</p>
                                </div>

                                <div class="menu-item">
                                    <span class="menu-price">$950</span>
                                    <p class="menu-description">Akami salad (lechuga, atún fresco, aguacate, aderezo de
                                        wasabi y vinagreta de soya) + Shake teriyaki (salmón grillado 120 g con salsa
                                        teriyaki, sopa miso y arroz al vapor) + Helado (1 bola)</p>
                                </div>

                                <div class="menu-item">
                                    <span class="menu-price">$1,150</span>
                                    <p class="menu-description">Kaiso sarada (lechugas, algas marinas, aderezo de ajonjolí y
                                        cítricos) + Wafu steak (rib eye 200 g asado, verduras de estación) + Mochi ice (1
                                        pieza)</p>
                                </div>
                            </div>

                            <!-- Existing Students Info -->
                            <div class="benefit-card info-card">
                                <div class="info-content">
                                    <p>*Incluyen: agua, café o té, y un soft drink (limonada o
                                        naranjada).
                                        Aplica también en Pick Up.</p>
                                </div>
                            </div>

                            <!-- Requirements Info -->
                            <div class="benefit-card requirements-card"
                                style="background-color: #FFC629; display: flex; align-items: center; padding: 10px 15px;"
                                onclick="window.location.href='{{ route('my.credential') }}'">
                                <i class="fas fa-id-card" style="margin-right: 10px;"></i> <!-- Credential Icon -->
                                <div class="text-black text-decoration-none" style="text-align: center;">
                                    credencial GALICIA
                                </div>
                                <i class="fas fa-arrow-right" style="margin-left: 10px;"></i> <!-- Right Arrow Icon -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @push('styles')
            <link rel="stylesheet" href="{{ asset('css/sedi.css') }}">

            <style>
                /* CSS for the Menu Section */
                .menu-section {
                    margin-bottom: 20px;
                    /* Add some space below the menu */
                    padding: 15px;
                    /* Give it some padding */
                    background-color: #1E1E1E;
                    /* Dark background */
                    color: #FFC107;
                    /* Yellow text for contrast */
                    border-radius: 8px;
                    /* Soften the corners */
                }

                .menu-title-benefic {
                    font-size: 1.5em;
                    /* Increase the title size */
                    margin-bottom: 10px;
                    /* Space below the title */
                    color: #FFC107;
                    padding: 0 !important;
                    /* Bright yellow */
                    font-weight: bold;
                    opacity: 1;
                    /* Make the title bold */
                }

                .menu-availability {
                    font-style: italic;
                    /* Make it italic */
                    color: #ffffff;
                    /* Soft gray */
                    margin-bottom: 15px;
                    /* Space below the time */
                }

                .menu-item {
                    margin-bottom: 10px;
                    /* Give space between menu items */
                    padding-bottom: 10px;
                    /* Add some padding at the bottom */
                    border-bottom: 1px solid #333;
                    /* Add a subtle line between menu items */
                }

                /* Remove the line from the last menu item */
                .menu-item:last-child {
                    border-bottom: none;
                }

                .menu-price {
                    color: #FFC107;
                    /* Bright yellow */
                    font-weight: bold;
                    /* Make the price bold */
                    margin-right: 10px;
                    /* Some space between the price and the text */
                }

                .menu-description {
                    color: #c9c9c9;
                    /* Light gray */
                    font-size: 1em;
                    /* Adjust font size if necessary */
                    margin-top: 5px;
                    /* Add space above the description */
                }
            </style>
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
