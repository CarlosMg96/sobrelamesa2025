@extends('layouts.master')

@section('title', 'Clínica Dental Isabel López - Beneficios')

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
                <div class="clinica-container">
                    <!-- Header con flecha de regreso -->
                    <div class="clinica-header">
                        <div class="back-button-container">
                            <a href="{{ route('benefits') }}" class="back-button">
                                <img src="{{ asset('images/sponsors/ArrowBack.svg') }}" alt="Regresar" class="back-arrow"
                                    draggable="false">
                            </a>
                        </div>
                    </div>

                    <!-- Imagen principal -->
                    <img src="{{ asset('images/sponsors/ISABELLOPEZ.png') }}" alt="Clínica Dental Isabel López"
                        class="clinica-main-image" draggable="false" />

                    <!-- Título de la clínica -->
                    <div class="clinica-title">
                        <div class="title-text">Clínica Dental Anabel López</div>
                    </div>

                    <!-- Servicios dentales -->
                    <div class="services-card">
                        <div class="services-list">
                            Odontología general<br />
                            Odontopediatría<br />
                            Endodoncias<br />
                            Periodoncia<br />
                            Ortodoncia<br />
                            Prostodoncia<br />
                            Implantología<br />
                            Cirugía maxilofacial
                        </div>
                    </div>

                    <!-- Nota informativa -->
                    <div class="info-note">
                        <div class="info-text">Beneficio para colaboradores de<br />Galicia Abogados, extensivo a familiares
                        </div>
                    </div>

                    <!-- Información de contacto -->
                    <div class="contact-info">
                        <div class="contact-content">
                            <div class="contact-section">
                                <div class="contact-title">Citas e informes:</div>
                                <div class="contact-address">
                                    Schiller 213, Polanco V Secc, Miguel Hidalgo, 11560, CDMX.<br /><br />
                                    Llama a:
                                </div>
                                <div class="phone-button">
                                    <a href="tel:5530770827" class="phone-number">55 3077 0827</a>
                                </div>
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
        <link rel="stylesheet" href="{{ asset('css/clinicadental.css') }}">
    @endpush

    @push('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty">
            // Inicializar página Clínica Dental
            document.addEventListener('DOMContentLoaded', function() {
                initClinicaPage();
            });

            function initClinicaPage() {
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
                startClinicaAnimations();
            }

            function startClinicaAnimations() {
                // Las animaciones se activan automáticamente con CSS
                // console.log('Clínica Dental page animations started');
            }

            function goBack() {
                window.history.back();
            }
        </script>
    @endpush
