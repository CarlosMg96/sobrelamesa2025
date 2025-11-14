@extends('layouts.master')

@section('title')
    Categorías de Menú
@stop

@section('css')
    <!-- App js -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    {{-- datatables css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    {{-- alertifyjs Css --}}
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- alertifyjs default themes Css --}}
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <style nonce="newN0nc3ForS3cur1ty" >
        /* Blur para el backdrop de Bootstrap Modal */
        .page-content {
            /* margin:0 !important; */
            padding: 99px 0px 11px !important;

        }

        div.dt-buttons {
            display: none;
        }

        /* Estilos específicos para el menú amarillo */
        .yellMenu {
            width: 460px;
            height: 100vh;
            right: 0;
            top: 0;
            position: fixed;
            background-color: #FFC629;
            padding: 0.7em;
            z-index: 1050;
            /* Aumentamos el z-index */
            display: none;
            /* Initially Hidden */
            font-family: sans-serif;
            /* Consistent font */
            color: #000;
            /* Dark text */
        }

        .yellMenu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Estilos para los controles de zoom */
        .zoom-controls {
            position: fixed;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1050;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;

        }

        @media (max-width: 768px) {
            .zoom-controls {
                display: none
            }
        }

        .zoom-controls .btn {
            padding: 0.5rem;
            font-size: 1.25rem;
            line-height: 1;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #030303;
            border: none;
            color: white;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .zoom-controls .btn:hover {
            background-color: #7a7a7a;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .zoom-controls .btn:active {
            transform: translateY(0);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .zoom-controls .btn i {
            color: white;
        }

        .zoom-controls .btn.zoom-reset {
            background-color: #ffffff;
            display: none;
        }

        .zoom-controls .btn.zoom-reset:hover {
            background-color: #7a7a7a;
        }

        .yellMenu li {
            margin-bottom: 0.75em;
            /* Spacing between list items */
        }

        .sidebar-item {
            display: block;
            padding: 0.5em 0;
            text-decoration: none;
            color: #000;
            font-size: 1.1em;
            font-weight: bold;
        }

        .sidebar-item:hover {
            background-color: rgba(0, 0, 0, 0.1);
            /* Optional highlight on hover */
        }

        .closebtn {
            font-size: 1.5rem;
            color: #6c757d;
            background: none;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .closebtn:hover {
            color: #000;
        }

        .openbtn {
            font-size: 1.25rem;
            cursor: pointer;
            background-color: #181818;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.2s;
        }

        .openbtn:hover {
            background-color: #181818;
        }

        .openbtn i {
            font-size: 1.1em;
        }

        /* Ajustes responsivos */
        @media (max-width: 768px) {


            .openbtn {
                padding: 0.4rem 0.8rem;
                font-size: 1rem;
            }
        }

        @media (min-width: 769px) {

            #main {
                transition: margin-right 0.3s ease-in-out;
            }
        }

        /* Estilos para el panel lateral general */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            background-color: #fff;
            overflow-x: hidden;
            transition: 0.5s;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #e9ecef;
            max-height: 100vh;
        }

        /* Style for extension badge */
        .badge.bg-primary {
            background-color: #343a40 !important;
            /* Dark background */
            color: #fff;
            /* White text */
            font-size: 0.85em;
        }

        /* Estilos para el modal de emergencia */
        #emergencyModal {
            z-index: 2000 !important;
            /* Mucho más alto que el modal amarillo */
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            display: none;
            /* Inicialmente oculto */
        }

        #emergencyModal .modal-dialog {
            max-width: 420px;
            margin: 0;
            margin-left: auto;
            height: 100vh;
            z-index: 2001 !important;
        }

        #emergencyModal .modal-content {
            background: #181818;
            min-height: 100vh;
            border-radius: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #e9ecef;
            color: #fff;
            z-index: 2002 !important;
        }

        /* Asegura el backdrop del modal de emergencia encima de todo */
        .modal-backdrop[data-bs-backdrop][id^="emergencyModal"] {
            z-index: 999 !important;
        }

        #floor-content {
            width: 100%;
            overflow: auto;
            position: relative;
            display: flex;
            box-sizing: border-box;
            align-items: center;
        }

        /* en telefonos */
        @media (max-width: 768px) {
            #floor-content {
                height: 110vmin;
            }
        }

        .svg-zoom-container {
            display: inline-block;
            transform-origin: 0 0;
            transition: transform 0.2s ease;
            position: relative;
            width: 100%;
            height: 100vmin;
        }

        .map-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: visible;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        /* Nuevas clases para reemplazar estilos inline */
        .maps-padding-container {
            padding: 5px 0px 11px !important;
        }

        .maps-floor-select {
            width: inherit !important;
            min-width: 120px !important;
            max-width: 200px !important;
        }

        .maps-modal-dialog {
            max-width: 420px;
            margin: 0;
            margin-left: auto;
            height: 100vh;
        }

        .maps-modal-content-yellow {
            background: #FFC629;
            min-height: 100vh;
            border-radius: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            border-right: 1px solid #e9ecef;
        }

        .maps-modal-close-btn {
            font-size: 1.5rem;
            color: #6c757d;
        }

        .maps-modal-title {
            color: #000;
            margin-left: 10px;
        }

        .maps-current-floor-text {
            color: #000;
            font-weight: bold;
        }

        .maps-search-input {
            border-left: none !important;
        }

        .maps-emergency-trigger {
            cursor: pointer;
            position: absolute;
            left: 0;
            width: 100%;
            background-color: #343434;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 0;
        }

        .maps-emergency-content {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .maps-emergency-icon {
            font-size: 3rem;
        }

        .maps-emergency-text {
            text-align: left;
        }

        .maps-emergency-subtitle {
            font-size: 1rem;
        }

        .maps-zoom-reset-btn {
            color: #000000 !important;
        }

        .maps-zoom-reset-icon {
            font-size: 1.5rem;
            color: #000000 !important;
        }

        .maps-alert-warning {
            background-color: #FFC629;
            border: none;
            color: #000;
        }

        .maps-emergency-modal-content {
            background-color: #2b2b2b;
        }

        .maps-emergency-modal-close {
            font-size: 2rem;
        }

        .maps-emergency-modal-title {
            color: #fff;
            margin-left: 10px;
        }

        .maps-emergency-phones-title {
            color: #FFC629;
        }

        .maps-emergency-contact-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .maps-emergency-contact-name {
            color: #000;
            display: block;
        }

        .maps-emergency-contact-link {
            color: #2b2b2b;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .maps-emergency-phone-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .maps-emergency-phone-icon {
            font-size: 1.2rem;
            color: #000;
        }

        .maps-emergency-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .maps-emergency-item-content {
            width: 100%;
        }

        .maps-emergency-item-title {
            color: #fff;
            display: block;
        }

        .maps-emergency-item-link {
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .maps-emergency-hr {
            margin: 0.25rem 0;
            border-top: 1px solid #FFC629;
        }

        /* Clases comunes para archivos level */
        .level-floor-content {
            height: 100vmin;
        }

        .level-svg-container {
            overflow: hidden;
            width: 100%;
            height: 100vmin;
        }

        .level-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
            pointer-events: auto;
            min-width: 200px;
            text-align: left;
            background: rgba(34, 34, 34, 0.9);
            border-radius: 10px;
            padding: 15px;
            color: white;
            transition: opacity 0.3s ease;
            visibility: hidden;
            opacity: 0;
        }

        .level-modal-content {
            display: flex;
            align-items: center;
            padding: 10px 18px 10px 10px;
            gap: 12px;
        }

        .level-modal-icon {
            font-size: 2em;
        }

        .level-modal-text {
            flex: 1;
        }

        .level-modal-title {
            color: #fff;
            margin-bottom: 0;
            font-size: 1.1em;
        }

        .level-modal-description {
            color: #FFC629;
            font-size: 0.95em;
            margin-bottom: 0;
        }

        .level-modal-close {
            color: #fff;
            border: none;
            background: none;
            font-size: 1.5em;
            cursor: pointer;
            margin-left: 10px;
        }

        .level-section-code-hidden {
            display: none;
        }

        /* Clases para estilos dinámicos aplicados desde JavaScript */
        .js-modal-show {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .js-modal-hide {
            display: none !important;
            visibility: hidden !important;
        }

        .js-modal-transition {
            transition: opacity 0.3s ease-in-out;
        }

        .js-modal-fade {
            opacity: 0;
        }

        .js-modal-fixed {
            position: fixed;
        }

        .js-area-cursor-pointer {
            cursor: pointer;
        }

        .js-body-zoom-fix {
            zoom: 0.99;
        }

        .js-body-zoom-normal {
            zoom: 1;
        }

        .js-emergency-link {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .js-contact-span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: black;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .js-user-container {
            flex: 1;
        }

        .js-text-container {
            width: 100%;
        }

        .js-name-bold {
            font-weight: 500;
        }

        .js-extension-small {
            font-size: 0.8rem;
        }

        .js-show-item {
            display: block;
        }

        .js-error-display {
            display: block;
        }

        /* Clases adicionales para estilos inline restantes */
        .js-modal-title-hide {
            display: none;
        }

        .js-modal-title-show {
            display: block;
        }

        .js-container-transition {
            transition: transform 0.2s ease;
        }

        .js-container-flex {
            display: flex;
        }

        .js-zoom-reset-hide {
            display: none;
        }

        .js-zoom-reset-show {
            display: flex;
        }
    </style>
@stop

@section('page-title')
    Mapa Interactivo
@stop
@section('body')

    <body data-topbar="dark">
    @endsection
    @section('content')
        @csrf
        <div class="row">
            <div class="col-12">
                {{-- <h4 class="card-title mb-4">Mapa Interactivo</h4> --}}
            </div>
            <div class="maps-padding-container">
                <div class="maps-padding-container">
                    <div class="maps-padding-container">
                        <div class="d-flex align-items-center gap-3">
                            <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                data-bs-target="#yellMenuModal">
                                <i class="mdi mdi-magnify me-1"></i>
                            </button>
                            <select class="form-select maps-floor-select" id="floorSelect">
                                <option value="">Seleccione piso</option>
                                @foreach ([24, 25, 26, 27, 28, 29, 30] as $floor)
                                    <option value="{{ route('maps.index', ['floor' => $floor]) }}"
                                        {{ $currentFloor == $floor ? 'selected' : '' }}>Piso {{ $floor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal Bootstrap para el menú amarillo -->
                <div class="modal fade" id="yellMenuModal" tabindex="-1" aria-labelledby="yellMenuLabel"
                    aria-hidden="true">

                    <div class="modal-dialog modal-dialog-scrollable maps-modal-dialog">
                        <div class="modal-content maps-modal-content-yellow">
                            <div class="modal-header border-0 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-link p-0 maps-modal-close-btn" data-bs-dismiss="modal" aria-label="Cerrar">
                                    <i class="mdi mdi-close"></i>
                                </button>
                                <h5 class="modal-title maps-modal-title" id="yellMenuLabel">
                                    Secciones</h5>
                            </div>
                            <div class="modal-body">
                                <p class="maps-current-floor-text" id="currentFloorText">Piso
                                    {{ $currentFloor }}</p>

                                <!-- Search Bar unificado -->
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="mdi mdi-magnify"></i>
                                        </span>
                                        <input type="text" id="searchInput" class="form-control border-start-0 maps-search-input"
                                            placeholder="Buscar área o persona...">
                                        <button type="button" id="clearSearch" class="btn btn-outline-secondary d-none">
                                            <i class="mdi mdi-close"></i>
                                        </button>
                                    </div>
                                    <div id="searchResults" class="mt-2 d-none">
                                        <div class="list-group" id="searchResultsList">
                                            <!-- Los resultados se cargarán aquí dinámicamente -->
                                        </div>
                                    </div>
                                </div>

                                <div id="secciones-container">
                                    <!-- Las secciones se cargarán aquí dinámicamente con JavaScript -->
                                    <div class="text-center py-4">
                                        <div class="spinner-border text-dark" role="status">
                                            <span class="visually-hidden">Cargando...</span>
                                        </div>
                                        <p class="mt-2">Cargando secciones...</p>
                                    </div>
                                </div>
                                <div id="emergencyTrigger" role="button" class="maps-emergency-trigger">
                                    <div class="maps-emergency-content">
                                        <i class="mdi mdi-security me-2 maps-emergency-icon"></i>
                                        <div class="maps-emergency-text">
                                            <span>Recomendaciones</span>
                                            <br>
                                            <strong class="maps-emergency-subtitle">de seguridad</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controles de zoom -->
                <div class="zoom-controls d-md-block d-sm-none">
                    <button class="btn zoom-in " title="Acercar">
                        +
                    </button>
                    <button class="btn zoom-reset maps-zoom-reset-btn" title="Restablecer zoom">
                        <i class="ri-fullscreen-exit-line maps-zoom-reset-icon">R</i>
                    </button>
                    <button class="btn zoom-out" title="Alejar">
                        -
                    </button>
                </div>

                <div id="main">
                    <!-- Zoom Instructions Alert - Mobile Only -->
                    <div class="alert alert-warning alert-dismissible fade show m-3 d-md-none maps-alert-warning" role="alert">
                        <strong>¡Zoom con dos dedos!</strong> Usa el gesto de pellizco para hacer zoom en el mapa.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div id="floor-content h-100 w-100">
                        <!-- Incluir la vista del piso actual -->
                        @include($floorView)

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal negro para teléfonos de emergencia -->
        <div class="modal fade" id="emergencyModal" tabindex="-1" aria-labelledby="emergencyModalLabel"
            aria-hidden="true" data-bs-focus="false">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content maps-emergency-modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn btn-link p-0 text-white maps-emergency-modal-close" data-bs-dismiss="modal"
                            aria-label="Cerrar">
                            <i class="mdi mdi-chevron-left"></i>
                        </button>
                        <h5 class="modal-title maps-emergency-modal-title" id="emergencyModalLabel">
                            Recomendaciones de seguridad
                        </h5>
                    </div>
                    <div class="modal-body">
                        <p class="maps-emergency-phones-title">Teléfonos de emergencia</p>
                        <ul class="list-unstyled">
                            <li class="mb-4 bg-white p-2">
                                <div class="maps-emergency-contact-container">
                                    <div>
                                        <strong class="maps-emergency-contact-name">Administración Park Hyatt</strong>
                                        <a href="tel:000 000 000" class="maps-emergency-contact-link">00 000 000</a>
                                    </div>
                                    <a href="tel:000 000 000" class="btn btn-warning maps-emergency-phone-btn">
                                        <i class="mdi mdi-phone maps-emergency-phone-icon"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="mb-4 maps-emergency-item">
                                <div class="maps-emergency-item-content">
                                    <strong class="maps-emergency-item-title">Emergencias</strong>
                                    <a href="tel:911" class="maps-emergency-item-link">911</a>
                                    <hr class="maps-emergency-hr">
                                </div>
                                <a href="tel:911" class="btn btn-warning maps-emergency-phone-btn">
                                    <i class="mdi mdi-phone maps-emergency-phone-icon"></i>
                                </a>
                            </li>
                            <li class="mb-4 maps-emergency-item">
                                <div class="maps-emergency-item-content">
                                    <strong class="maps-emergency-item-title">Cruz Roja</strong>
                                    <a href="tel:53 95 11 11" class="maps-emergency-item-link">53 95 11 11</a>
                                    <hr class="maps-emergency-hr">
                                </div>
                                <a href="tel:53 95 11 11" class="btn btn-warning maps-emergency-phone-btn">
                                    <i class="mdi mdi-phone maps-emergency-phone-icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('script')
        <script nonce="newN0nc3ForS3cur1ty" >
        document.addEventListener('DOMContentLoaded', function() {
            let select = document.getElementById('floorSelect');
            if (select) {
                select.addEventListener('change', function() {
                    if (this.value) {
                        window.location.href = this.value;
                    }
                });
            }
        });
            // Prevent double-tap zoom
            let lastTouchEnd = 0;
            document.addEventListener('touchend', function(event) {
                const now = (new Date()).getTime();
                if (now - lastTouchEnd <= 300) {
                    event.preventDefault();
                }
                lastTouchEnd = now;
            }, false);

            // Prevent pinch zoom
            document.addEventListener('touchmove', function(event) {
                if (event.scale !== 1) {
                    event.preventDefault();
                }
            }, {
                passive: false
            });

            // Prevent iOS zoom on input focus
            document.addEventListener('gesturestart', function(e) {
                e.preventDefault();
                document.body.classList.remove('js-body-zoom-normal');
                document.body.classList.add('js-body-zoom-fix');
            });

            document.addEventListener('gesturechange', function(e) {
                e.preventDefault();
                document.body.classList.remove('js-body-zoom-normal');
                document.body.classList.add('js-body-zoom-fix');
            });

            document.addEventListener('gestureend', function(e) {
                e.preventDefault();
                document.body.classList.remove('js-body-zoom-fix');
                document.body.classList.add('js-body-zoom-normal');
            });
        </script>
        <script nonce="newN0nc3ForS3cur1ty" >
            document.addEventListener('DOMContentLoaded', function() {
                // Resaltar sección si se proporciona en la URL
                @if (isset($highlightSection) && $highlightSection)
                    // Usar el evento de carga del SVG para asegurar que esté listo
                    const initHighlightFromUrl = () => {
                        // Verificar si ya estamos en el piso correcto
                        const currentFloor = '{{ $currentFloor }}';
                        const sectionFloor = '{{ $highlightSection }}'.split('-')[0].replace('p', '');

                       

                        if (currentFloor !== sectionFloor) {
                            window.location.href = `/maps/${sectionFloor}?section={{ $highlightSection }}`;
                            return;
                        }

                        // Función para intentar resaltar usando el mismo método del menú
                        const tryHighlight = () => {
                            // Verificar si la función del menú está disponible
                            if (typeof window.resaltarArea === 'function') {
                                window.resaltarArea('{{ $highlightSection }}');
                                return true;
                            } else if (window.svgPanZoom) {
                                // Si no está disponible, intentar resaltar directamente
                                const svgObject = document.querySelector('#floor-content object');
                                if (svgObject && svgObject.contentDocument) {
                                    const area = svgObject.contentDocument.getElementById(
                                        '{{ $highlightSection }}');
                                    if (area) {
                                        area.setAttribute('fill', '#FFC629');
                                        area.setAttribute('fill-opacity', '0.5');
                                        area.setAttribute('stroke', '#FFC629');
                                        area.setAttribute('stroke-width', '2');
                                        return true;
                                    }
                                }
                            }
                            return false;
                        };

                        // Intentar resaltar inmediatamente
                        if (!tryHighlight()) {
                            // Si falla, esperar un momento y volver a intentar
                            const retryInterval = setInterval(() => {
                                if (tryHighlight()) {
                                    clearInterval(retryInterval);
                                }
                            }, 500);

                            // Dejar de intentar después de 5 segundos
                            setTimeout(() => {
                                clearInterval(retryInterval);
                            }, 5000);
                        } else {
                        }
                    };

                    // Inicializar cuando el DOM esté listo
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initHighlightFromUrl);
                    } else {
                        initHighlightFromUrl();
                    }
                @endif

                // Variables globales
                let searchTimeout;
                const searchInput = document.getElementById('searchInput');
                const clearSearchBtn = document.getElementById('clearSearch');
                const searchResults = document.getElementById('searchResults');
                const searchResultsList = document.getElementById('searchResultsList');
                const currentFloor = {{ $currentFloor }};

                // Función para realizar la búsqueda
                async function performSearch(query) {
                    if (query.length < 2) {
                        searchResults.classList.add('d-none');
                        return;
                    }

                    try {
                        const response = await fetch(
                            `/maps/{{ $currentFloor }}?search=${encodeURIComponent(query)}&ajax=1`);
                        const results = await response.json();

                        // Limpiar resultados anteriores
                        searchResultsList.innerHTML = '';

                        if (results.length > 0) {
                            // Mostrar resultados de búsqueda
                            results.forEach(result => {
                                let displayName, sectionName, position = '';

                                if (result.type === 'user') {
                                    // Mostrar solo el primer nombre y la primera letra del apellido
                                    const firstName = result.name || '';
                                    const lastName = result.last_name ? result.last_name.charAt(0) + '.' : '';
                                    displayName = `${firstName} ${lastName}`.trim();
                                    position = result.position || '';
                                    sectionName = result.section ?
                                        `Sección ${result.section.replace(`p${currentFloor}-`, '').toUpperCase()}` :
                                        'Sin sección';
                                } else if (result.type === 'section') {
                                    // Es una sección
                                    displayName = result.name || `Sección ${result.code || ''}`.trim();
                                    sectionName = result.code ?
                                        `Sección ${result.code}` :
                                        result.section ?
                                        `Sección ${result.section.replace(`p${currentFloor}-`, '').toUpperCase()}` :
                                        'Sin código';
                                }

                                const item = document.createElement('a');
                                item.href = '#';
                                item.className = 'list-group-item list-group-item-action';
                                item.innerHTML = `
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-0">${displayName}</h6>
                                            ${position ? `<small class="text-muted">${position}</small>` : ''}
                                        </div>
                                        <span class="badge bg-dark">${sectionName}</span>
                                    </div>
                                `;

                                item.addEventListener('click', async (e) => {
                                    e.preventDefault();

                                    // Obtener la sección dependiendo del tipo de resultado
                                    const sectionId = result.section || result.id;

                                    // Actualizar la URL con el parámetro de sección
                                    if (sectionId) {
                                        const url = new URL(window.location.href);
                                        url.searchParams.set('section', sectionId);
                                        window.history.pushState({}, '', url);
                                    }

                                    if (sectionId) {
                                        // Extraer el piso de la sección (ej: 'p1-seccion' -> 1)
                                        const floorMatch = sectionId.match(/p(\d+)-/);
                                        if (floorMatch && floorMatch[1]) {
                                            const floor = floorMatch[1];
                                            // Navegar al piso correspondiente con la sección resaltada
                                            window.location.href =
                                                `/maps/${floor}?section=${sectionId}`;
                                        } else {
                                            // Si no se puede extraer el piso, intentar resaltar en el piso actual
                                            if (window.resaltarArea) {
                                                window.resaltarArea(sectionId);

                                                // Código existente para el resaltado en el piso actual
                                                const svgObject = document.querySelector(
                                                    '#planoPiso{{ $currentFloor }}');
                                                if (svgObject && svgObject.contentDocument) {
                                                    const area = svgObject.contentDocument
                                                        .getElementById(user.map_section);
                                                    if (area) {
                                                        const areaRect = area
                                                            .getBoundingClientRect();
                                                        const scrollY = window.scrollY +
                                                            areaRect.top - (window.innerHeight /
                                                                3);

                                                        window.scrollTo({
                                                            top: scrollY,
                                                            behavior: 'smooth'
                                                        });

                                                        setTimeout(() => {
                                                            const finalScrollY = window
                                                                .scrollY +
                                                                area
                                                                .getBoundingClientRect()
                                                                .top -
                                                                (window.innerHeight /
                                                                    3);
                                                            window.scrollTo({
                                                                top: finalScrollY,
                                                                behavior: 'smooth'
                                                            });
                                                        }, 300);
                                                    }
                                                }
                                            }
                                        }

                                        // Cerrar el menú en dispositivos móviles
                                        const menuModal = bootstrap.Modal.getInstance(document
                                            .getElementById('yellMenuModal'));
                                        if (menuModal) menuModal.hide();
                                    }
                                });

                                searchResultsList.appendChild(item);
                            });

                            // Mostrar resultados
                            searchResults.classList.remove('d-none');
                        } else {
                            // Mostrar mensaje de no resultados
                            const noResults = document.createElement('div');
                            noResults.className = 'alert alert-warning mb-0';
                            noResults.textContent = `No se encontraron resultados para "${query}"`;
                            searchResultsList.appendChild(noResults);
                            searchResults.classList.remove('d-none');
                        }
                    } catch (error) {
                        // Error en la búsqueda - continuamos silenciosamente
                    }
                }

                // Evento de entrada de búsqueda
                searchInput.addEventListener('input', (e) => {
                    const query = e.target.value.trim();

                    // Mostrar/ocultar botón de limpiar
                    if (query.length > 0) {
                        clearSearchBtn.classList.remove('d-none');

                        // Usar debounce para evitar múltiples solicitudes
                        clearTimeout(searchTimeout);
                        searchTimeout = setTimeout(() => {
                            performSearch(query);
                        }, 300);
                    } else {
                        clearSearchBtn.classList.add('d-none');
                        searchResults.classList.add('d-none');
                    }
                });

                // Limpiar búsqueda
                clearSearchBtn.addEventListener('click', () => {
                    searchInput.value = '';
                    clearSearchBtn.classList.add('d-none');
                    searchResults.classList.add('d-none');

                    // Si hay un área resaltada, restaurar el mapa
                    if (window.limpiarResaltado) {
                        window.limpiarResaltado();
                    }
                });

                // Cerrar resultados al hacer clic fuera
                document.addEventListener('click', (e) => {
                    if (!searchResults.contains(e.target) && e.target !== searchInput) {
                        searchResults.classList.add('d-none');
                    }
                });

                // Prevenir que el clic en los resultados cierre el menú
                searchResults.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
                var emergencyTrigger = document.getElementById('emergencyTrigger');
                var emergencyModalElement = document.getElementById('emergencyModal');

                if (emergencyTrigger && emergencyModalElement) {
                    var emergencyModal = new bootstrap.Modal(emergencyModalElement);

                    emergencyTrigger.addEventListener('click', function() {
                        emergencyModal.show();
                        // Muestra el modal de emergencia
                        emergencyModalElement.classList.add('js-modal-show');
                    });
                }
            });

            // Función para cargar las secciones dinámicamente
            function cargarSecciones() {
                const container = document.getElementById('secciones-container');

                if (!container) {
                    return;
                }

                // Verificar si window.secciones está disponible (definido en el archivo del piso)
                if (typeof window.secciones === 'undefined') {
                    // Volver a intentar después de un breve retraso
                    setTimeout(cargarSecciones, 500);
                    return;
                }

                if (!Array.isArray(window.secciones)) {
                    container.innerHTML =
                        '<div class="alert alert-danger">Error al cargar las secciones. Por favor, recargue la página.</div>';
                    return;
                }



                // Limpiar el contenedor
                container.innerHTML = '';

                // Verificar si hay secciones para mostrar
                if (window.secciones.length === 0) {
                    container.innerHTML = '<div class="alert alert-warning">No hay secciones disponibles para este piso</div>';
                    return;
                }

                // Crear el elemento ul
                const ul = document.createElement('ul');
                ul.className = 'list-unstyled';

                // Agregar cada sección al ul
                window.secciones.forEach(seccion => {
                    if (!seccion || !seccion.id || !seccion.code) {
                        return; // Saltar secciones inválidas
                    }

                    const li = document.createElement('li');
                    li.className = 'mb-3';

                    const a = document.createElement('a');
                    a.className = 'sidebar-item d-flex align-items-center js-emergency-link';
                    a.href = '#';
                    a.setAttribute('data-seccion-id', seccion.id);

                    // Agregar manejador de eventos para resaltar el área y mostrar el modal
                    a.addEventListener('click', async function(e) {
                        e.preventDefault();

                        // Obtener la posición del elemento clickeado para el modal
                        const rect = this.getBoundingClientRect();
                        const x = rect.left + window.scrollX;
                        const y = rect.top + window.scrollY;

                        // Cerrar el modal de secciones primero
                        const sectionsModal = bootstrap.Modal.getInstance(document.getElementById(
                            'yellMenuModal'));
                        if (sectionsModal) {
                            sectionsModal.hide();
                            // Esperar a que la animación de cierre del modal termine
                            await new Promise(resolve => setTimeout(resolve, 1000));
                        }

                        // Resetear el zoom si es necesario
                        if (typeof window.resetZoom === 'function') {
                            window.resetZoom();
                            await new Promise(resolve => setTimeout(resolve, 500));
                        }
                        // Resaltar el área sin mostrar el modal automático
                        if (typeof window.resaltarArea === 'function') {
                            // Pasar un segundo parámetro false para evitar que se muestre el modal automático
                            window.resaltarArea(seccion.id, 0, false);
                        }

                        // Mostrar el modal con la información de la sección
                        if (window.showModal) {
                            // Calcular la posición central del elemento clickeado
                            const rect = this.getBoundingClientRect();
                            const centerX = rect.left + (rect.width / 2);
                            const centerY = rect.top + (rect.height / 2);

                            // Obtener usuarios para esta sección
                            const users = window.usersBySection[seccion.id] || [];
                            let modalContent = `Código: ${seccion.code}`;

                            if (users.length > 0) {
                                const userNames = users.map(user => {
                                    return user.first_name + (user.last_name ? ' ' + user.last_name : '');
                                }).join(', ');
                            }

                            setTimeout(() => {
                                window.showModal(
                                    seccion.nombre || 'Sin nombre',
                                    modalContent,
                                    centerX,
                                    centerY,
                                    seccion.icono || '|',
                                    seccion.id
                                );
                            }, 100);
                        }
                    });

                    // Crear el ícono de la sección
                    const span = document.createElement('span');
                    span.className = 'js-contact-span';
                    span.textContent = seccion.code;

                    // Contenedor para el texto
                    const divMs2 = document.createElement('div');
                    divMs2.className = 'ms-3 js-user-container';

                    // Contenedor para el texto a la izquierda
                    const divTextLeft = document.createElement('div');
                    divTextLeft.className = 'text-left js-text-container';

                    // Verificar si hay usuarios en esta sección
                    const users = window.usersBySection[seccion.id] || [];
                    const hasUsers = users.length > 0;

                    // Mostrar nombres de personas si existen, de lo contrario mostrar el nombre de la sección
                    const spanNombre = document.createElement('div');
                    spanNombre.className = 'js-name-bold';

                    if (hasUsers) {
                        const userNames = users.map(user => {
                            return user.first_name + (user.last_name ? ' ' + user.last_name : '');
                        }).join(', ');
                        spanNombre.textContent = userNames;
                    } else {
                        spanNombre.textContent = seccion.nombre || 'Sin nombre';
                    }

                    // Si hay una extensión, mostrarla debajo del nombre
                    if (seccion.extension) {
                        const divExtension = document.createElement('div');
                        divExtension.textContent = `Extensión: ${seccion.extension}` || 'Sin extensión especificada';
                        divExtension.className = 'js-extension-small';
                        divTextLeft.appendChild(divExtension);
                    }

                    // Construir la estructura del DOM
                    divTextLeft.prepend(spanNombre);
                    divMs2.appendChild(divTextLeft);
                    a.appendChild(span);
                    a.appendChild(divMs2);
                    li.appendChild(a);
                    ul.appendChild(li);
                });

                // Agregar el ul al contenedor
                container.appendChild(ul);
            }

            // Función para filtrar las secciones
            function filtrarSecciones(searchText) {
                const items = document.querySelectorAll('#secciones-container .sidebar-item');
                let hasResults = false;

                items.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    const itemContainer = item.closest('li');

                    if (text.includes(searchText.toLowerCase()) || searchText === '') {
                        itemContainer.classList.remove('js-modal-hide');
                        itemContainer.classList.add('js-show-item');
                        hasResults = true;
                    } else {
                        itemContainer.classList.remove('js-show-item');
                        itemContainer.classList.add('js-modal-hide');
                    }
                });

                // Mostrar mensaje si no hay resultados
                const noResults = document.getElementById('no-results-message');
                if (!hasResults) {
                    if (!noResults) {
                        const container = document.getElementById('secciones-container');
                        const message = document.createElement('div');
                        message.id = 'no-results-message';
                        message.className = 'text-center py-3';
                        message.textContent = 'No se encontraron áreas que coincidan con la búsqueda';
                        container.appendChild(message);
                    }
                } else if (noResults) {
                    noResults.remove();
                }
            }

            // Configurar el buscador
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchAreaInput');
                if (searchInput) {
                    searchInput.addEventListener('input', (e) => {
                        filtrarSecciones(e.target.value);
                    });
                }

                cargarSecciones();

                // También intentar cargar después de un breve retraso por si el archivo del piso tarda en cargar
                setTimeout(cargarSecciones, 1000);
            });

            // Función para recargar las secciones cuando se cambia de piso
            window.recargarSecciones = function() {
                // Mostrar indicador de carga
                const container = document.getElementById('secciones-container');
                container.innerHTML = `
                    <div class="text-center py-4">
                        <div class="spinner-border text-dark" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <p class="mt-2">Cargando secciones...</p>
                    </div>
                `;

                // Actualizar el texto del piso actual
                const currentFloorText = document.getElementById('currentFloorText');
                if (currentFloorText) {
                    currentFloorText.textContent = 'Piso ' + window.currentFloor;
                }

                // Volver a cargar las secciones después de un breve retraso
                setTimeout(cargarSecciones, 500);
            };

            // Niveles de zoom
            const zoomLevels = [0.1, 0.2, 0.4, 0.5, 0.8, 1.0, 1.5, 2.0, 2.5, 3.0, 4.0];
            let currentZoom = 5; // Índice del zoom actual (100% = 1.0)
            const DEFAULT_ZOOM_INDEX = 5; // Índice para 100% (1.0)

            // Función para aplicar el zoom
            function applyZoom(zoomIndex) {
                const container = document.querySelector('.svg-zoom-container');
                const zoomDisplay = document.getElementById('zoom-level');
                const scale = zoomLevels[zoomIndex];

                // Aplicar transformación de escala
                container.style.transform = `scale(${scale})`;

                // Actualizar el indicador de zoom
                if (zoomDisplay) {
                    zoomDisplay.textContent = `${Math.round(scale * 100)}%`;
                }

                // Actualizar botones
                document.querySelector('.zoom-in').disabled = (zoomIndex >= zoomLevels.length - 1);
                document.querySelector('.zoom-out').disabled = (zoomIndex <= 0);
                const zoomResetBtn = document.querySelector('.zoom-reset');
                if (zoomIndex === DEFAULT_ZOOM_INDEX) {
                    zoomResetBtn.classList.add('js-zoom-reset-hide');
                } else {
                    zoomResetBtn.classList.remove('js-zoom-reset-hide');
                    zoomResetBtn.classList.add('js-zoom-reset-show');
                }
            }

            // Función para restablecer el zoom
            window.resetZoom = function() {
                if (typeof currentZoom !== 'undefined' && typeof DEFAULT_ZOOM_INDEX !== 'undefined') {
                    currentZoom = DEFAULT_ZOOM_INDEX;
                    applyZoom(currentZoom);
                    return true;
                }
                return false;
            };

            // Inicializar controles
            document.addEventListener('DOMContentLoaded', function() {
                const container = document.querySelector('.svg-zoom-container');

                // Manejadores para los botones de zoom
                const zoomInBtn = document.querySelector('.zoom-in');
                const zoomOutBtn = document.querySelector('.zoom-out');
                const zoomResetBtn = document.querySelector('.zoom-reset');

                if (zoomInBtn) {
                    zoomInBtn.addEventListener('click', () => {
                        if (currentZoom < zoomLevels.length - 1) {
                            currentZoom++;
                            applyZoom(currentZoom);
                        }
                    });
                }

                if (zoomOutBtn) {
                    zoomOutBtn.addEventListener('click', () => {
                        if (currentZoom > 0) {
                            currentZoom--;
                            applyZoom(currentZoom);
                        }
                    });
                }

                if (zoomResetBtn) {
                    zoomResetBtn.addEventListener('click', window.resetZoom);
                }

                if (container) {
                    // Configuración inicial del contenedor con clases CSS
                    container.style.overflow = 'auto';
                    container.style.transformOrigin = 'top left';
                    container.classList.add('js-container-transition');
                    container.style.width = '100%';
                    container.style.height = '100vmin';
                    container.classList.add('js-container-flex');
                    container.style.justifyContent = 'center';
                    container.style.alignItems = 'flex-start';

                    // Inicializar con zoom al 100%
                    applyZoom(DEFAULT_ZOOM_INDEX);

                    // Manejador de rueda del ratón para zoom con Ctrl
                    container.addEventListener('wheel', function(e) {
                        if (e.ctrlKey) {
                            e.preventDefault();

                            const delta = Math.sign(e.deltaY);
                            let newZoom = currentZoom;

                            if (delta < 0 && currentZoom < zoomLevels.length - 1) {
                                newZoom = currentZoom + 1;
                            } else if (delta > 0 && currentZoom > 0) {
                                newZoom = currentZoom - 1;
                            }

                            if (newZoom !== currentZoom) {
                                currentZoom = newZoom;
                                applyZoom(currentZoom);
                            }
                        }
                    });
                }

                // Asegurarse de que el zoom inicial sea 100% (1.0)
                currentZoom = DEFAULT_ZOOM_INDEX;

                // Asegurar que el contenedor padre tenga el tamaño correcto
                const parentContainer = container?.parentElement;
                if (parentContainer) {
                    parentContainer.style.width = '100%';
                    parentContainer.style.height = '100vmin';
                    parentContainer.style.overflow = 'auto';
                }

                // Botones de zoom
                document.querySelector('.zoom-in')?.addEventListener('click', function() {
                    if (currentZoom < zoomLevels.length - 1) {
                        currentZoom++;
                        applyZoom(currentZoom);
                    }
                });

                document.querySelector('.zoom-out')?.addEventListener('click', function() {
                    if (currentZoom > 0) {
                        currentZoom--;
                        applyZoom(currentZoom);
                    }
                });

                document.querySelector('.zoom-reset')?.addEventListener('click', function() {
                    currentZoom = DEFAULT_ZOOM_INDEX;
                    applyZoom(currentZoom);
                });

                // Aplicar zoom inicial después de un pequeño retraso para asegurar que el DOM esté listo
                setTimeout(() => {
                    applyZoom(DEFAULT_ZOOM_INDEX);
                }, 100);
            });
        </script>
    @stop
