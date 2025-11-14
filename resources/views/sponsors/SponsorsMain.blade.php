@extends('layouts.master')

@section('title', 'Beneficios')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sponsors.css') }}">
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" />
    <style nonce="newN0nc3ForS3cur1ty">
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

        /* Category Filter Styles */
        .category-filters {
            display: flex;
            overflow-x: auto;
            padding: 15px 0;
            gap: 10px;
            margin-bottom: 20px;
            scrollbar-width: thin;
            scrollbar-color: #ffc10717 #2d2d2d00;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .category-filters::-webkit-scrollbar {
            height: 6px;
        }

        .category-filters::-webkit-scrollbar-track {
            background: #2d2d2d;
            border-radius: 3px;
        }

        .category-filters::-webkit-scrollbar-thumb {
            background-color: #FFC107;
            border-radius: 3px;
        }

        .category-filter {
            padding: 8px 16px;
            border-radius: 20px;
            background-color: #333;
            color: #FFC107;
            border: none;
            cursor: pointer;
            text-decoration: none;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .category-filter.active,
        .category-filter:hover {
            background-color: #FFC107;
            color: #000;
        }

        /*Hidden sponsor*/
        .sponsor-item.hidden {
            display: none;
        }
    </style>
@endsection

@section('body')

    <body data-topbar="dark">
    @endsection

    @section('content')
        <div class="dashboard-container mt-5">
            <div class="dashboard-content mt-5">
                <!-- Sponsors Content -->
                <div class="sponsors-container">
                    <!-- Back Button -->
                    <div class="back-header d-none">
                        <div class="back-button-container">
                            <a href="{{ route('dashboard') }}" class="back-button">
                                <img src="{{ asset('images/sponsors/ArrowBack.svg') }}" alt="Regresar" class="back-arrow"
                                    draggable="false">
                            </a>
                        </div>
                    </div>

                    @php
                        use Illuminate\Support\Str;

                        $claveVida = Auth::user()->life_insurance;
                        $claveGastos = Auth::user()->medical_insurance;

                        $buscarArchivo = function ($clave, $directorioRelativo) {
                            $directorioAbsoluto = public_path($directorioRelativo);

                            if ($clave && file_exists($directorioAbsoluto)) {
                                foreach (scandir($directorioAbsoluto) as $file) {
                                    $file = ltrim($file); // elimina espacios al inicio

                                    // Usar guión como separador (formato actualizado)
                                    if (Str::startsWith($file, $clave . '-')) {
                                        return asset($directorioRelativo . '/' . $file);
                                    }
                                }
                            }

                            return '';
                        };

                        $archivoVida = $buscarArchivo($claveVida, '/files/insurance');
                        $archivoGastos = $buscarArchivo($claveGastos, '/files/insurance');
                        $categories = [
                            'Ver todos',
                            'Alimentos',
                            'Salud y bienestar',
                            'Comunidad educativa',
                            'Deportes',
                        ]; //List of Categories
                    @endphp


                    <!-- Insurance Section -->
                    <div class="insurance-section" nonce="newN0nc3ForS3cur1ty" style="margin-top: -20px;">
                        <div class="insurance-content">
                            <h2 class="insurance-title">Seguros</h2>
                            <div class="policy-info">
                                <div class="policy-number">Póliza de Gastos Médicos: <br>
                                    {{ Auth::user()->medical_insurance ?? 'Póliza no disponible' }}</div>
                                <div class="policy-actions" data-url="{{ $archivoGastos }}">
                                    <span class="download-text">Descargar Póliza</span>
                                    <div class="download-icon">
                                        <img src="{{ asset('images/sponsors/Download.svg') }}" alt="Descargar"
                                            class="download-svg-icon" draggable="false">
                                    </div>
                                </div>
                            </div>
                            <div class="policy-info">
                                <div class="policy-number">Póliza de Vida: <br>
                                    {{ Auth::user()->life_insurance ?? 'Póliza no disponible' }}</div>
                                <div class="policy-actions" data-url="{{ $archivoVida }}">
                                    <span class="download-text">Descargar Póliza</span>
                                    <div class="download-icon">
                                        <img src="{{ asset('images/sponsors/Download.svg') }}" alt="Descargar"
                                            class="download-svg-icon" draggable="false">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <button class="claim-button">
                                    <span>Levantar reporte de siniestro</span>
                                </button> -->
                    </div>

                    <!-- Divider -->
                    <div class="section-divider"></div>
                    <h1 style="color: white">Beneficios</h1>

                    <!-- Category Filters -->
                    <div class="category-filters">
                        @foreach ($categories as $category)
                            <a href="#" class="category-filter"
                                data-category="{{ strtolower(str_replace(' ', '', $category)) }}">{{ $category }}</a>
                        @endforeach
                    </div>
                    <!-- Sponsors Grid -->
                    <div class="sponsors-grid">

                        <a href="{{ route('benefits.rulfo') }}" class="sponsor-item" data-category="alimentos">
                            <img src="{{ asset('images/sponsors/logo_rulfo.jpg') }}" alt="SEDI" class="sponsor-image"
                                draggable="false" onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=SEDI'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">Rulfo</h3>
                                <p class="sponsor-category">Alimentos</p>
                            </div>
                        </a>
                        <a href="{{ route('benefits.yoshimi') }}" class="sponsor-item" data-category="alimentos">
                            <img src="{{ asset('images/sponsors/logo_yoshimi.jpg') }}" alt="SEDI" class="sponsor-image"
                                draggable="false" onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=SEDI'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">Yoshimi</h3>
                                <p class="sponsor-category">Alimentos</p>
                            </div>
                        </a>
                        <a href="{{ route('benefits.teppan') }}" class="sponsor-item" data-category="alimentos">
                            <img src="{{ asset('images/sponsors/logo_teppan.jpg') }}" alt="SEDI" class="sponsor-image"
                                draggable="false" onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=SEDI'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">Teppan Grill</h3>
                                <p class="sponsor-category">Alimentos</p>
                            </div>
                        </a>
                        <a href="{{ route('benefits.amado') }}" class="sponsor-item" data-category="alimentos">
                            <img src="{{ asset('images/sponsors/logo_amado.jpg') }}" alt="SEDI" class="sponsor-image"
                                draggable="false" onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=SEDI'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">Amado</h3>
                                <p class="sponsor-category">Alimentos</p>
                            </div>
                        </a>
                        <a href="{{ route('benefits.clubAtletico') }}" class="sponsor-item" data-category="deportes">
                            <img src="{{ asset('images/sponsors/logo_club.jpg') }}" alt="SEDI" class="sponsor-image"
                                draggable="false"
                                onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=SEDI'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">Club Atlético</h3>
                                <p class="sponsor-category">Deportes</p>
                            </div>
                        </a>
                        <!-- Row 1 -->
                        <a href="{{ route('benefits.sedi') }}" class="sponsor-item" data-category="comunidadeducativa">
                            <img src="{{ asset('images/sponsors/sedi_logo.jpg') }}" alt="SEDI" class="sponsor-image"
                                draggable="false"
                                onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=SEDI'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">SEDI</h3>
                                <p class="sponsor-category">Comunidad educativa</p>
                            </div>
                        </a>

                        <a href="{{ route('benefits.wellhub') }}" class="sponsor-item" data-category="saludybienestar">
                            <img src="{{ asset('images/sponsors/WELLHUB.png') }}" alt="GYMPASS / WELLHUB"
                                class="sponsor-image" draggable="false"
                                onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=WELLHUB'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">WELLHUB</h3>
                                <p class="sponsor-category">Salud y bienestar</p>
                            </div>
                        </a>

                        <!-- Row 2 -->
                        <a href="{{ route('benefits.comebien') }}" class="sponsor-item" data-category="alimentos">
                            <img src="{{ asset('images/sponsors/COMEBIEN.png') }}" alt="COME BIEN" class="sponsor-image"
                                draggable="false"
                                onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=COME+BIEN'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">COME BIEN</h3>
                                <p class="sponsor-category">Alimentos</p>
                            </div>
                        </a>

                        <a href="{{ route('benefits.artemiga') }}" class="sponsor-item" data-category="alimentos">
                            <img src="{{ asset('images/sponsors/ARTEMIGA.png') }}" alt="ARTEMIGA" class="sponsor-image"
                                draggable="false"
                                onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=ARTEMIGA'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">ARTEMIGA</h3>
                                <p class="sponsor-category">Alimentos</p>
                            </div>
                        </a>

                        <!-- Row 3 -->
                        <a href="{{ route('benefits.takotako') }}" class="sponsor-item" data-category="alimentos">
                            <img src="{{ asset('images/sponsors/TAKOSTAKOS.png') }}" alt="TAKOS & TAKOS"
                                class="sponsor-image" draggable="false"
                                onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=TAKOS'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">TAKOS & TAKOS</h3>
                                <p class="sponsor-category">Alimentos</p>
                            </div>
                        </a>

                        <a href="{{ route('benefits.clinicadental') }}" class="sponsor-item"
                            data-category="saludybienestar">
                            <img src="{{ asset('images/sponsors/ISABELLOPEZ.png') }}" alt="CLINICA DENTAL ISABEL LÓPEZ"
                                class="sponsor-image" draggable="false"
                                onerror="this.src='https://placehold.co/120x120/2a2a2a/ffffff?text=CLINICA'">
                            <div class="sponsor-info">
                                <h3 class="sponsor-name">CLINICA DENTAL<br />ISABEL LÓPEZ</h3>
                                <p class="sponsor-category">Salud</p>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <script nonce="newN0nc3ForS3cur1ty">
            // Función para volver atrás
            function goBack() {
                window.history.back();
            }

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.policy-actions').forEach(function(el) {
                    el.addEventListener('click', function() {
                        const url = this.getAttribute('data-url');

                        if (url && url.trim() !== '') {
                            window.open(url,
                                '_blank'); // o usar location.href = url; para descarga directa
                        } else {
                            alert('Póliza no disponible');
                        }
                    });
                });

                // Category Filtering Script
                const categoryFilters = document.querySelectorAll('.category-filter');
                const sponsorItems = document.querySelectorAll('.sponsor-item');

                categoryFilters.forEach(filter => {
                    filter.addEventListener('click', function(e) {
                        e.preventDefault(); // Prevent the link from navigating

                        const category = this.getAttribute('data-category');

                        // Remove active class from all filters
                        categoryFilters.forEach(f => f.classList.remove('active'));
                        this.classList.add('active'); // Add active class to the clicked filter

                        sponsorItems.forEach(item => {
                            if (category === 'vertodos' || item.getAttribute(
                                    'data-category') === category) {
                                item.classList.remove('hidden'); // Show the item
                            } else {
                                item.classList.add('hidden'); // Hide the item
                            }
                        });
                    });
                });

                // Set "Ver todos" as active by default
                document.querySelector('[data-category="vertodos"]').classList.add('active');
            });
        </script>

    @endsection
