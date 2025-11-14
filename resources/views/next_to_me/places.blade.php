@extends('layouts.master')

@section('title')
    Cerca de mí - {{ $currentPlace['title'] ?? 'Lugares' }}
@endsection

@section('css')
    <!-- App js -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- dropzone css -->
    <link href="{{ URL::asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- select2 css -->
    <link href="{{ URL::asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet"
        type="text/css" />

    <style nonce="newN0nc3ForS3cur1ty" >
        /* Estilos base para la tarjeta */
        * {
            font-family: "Gelasio", serif !important;
        }
        
        select {
            -webkit-appearance: none; /* Removes Safari's default styling */
            -moz-appearance: none;    /* Removes Firefox's default styling */
            appearance: none;         /* Standard property for other browsers */
        }
        .card {
            border: none !important;
            box-shadow: none !important;
            background-color: transparent !important;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Contenedor principal */
        .main-container {
            padding: 0 20px;
        }

        @media (min-width: 768px) {
            .main-container {
                padding: 0 40px;
            }
        }

        .card-title {
            color: white;
            font-family: "Gelasio", serif;
            font-size: 2rem;
            font-weight: bold;
        }

        .section-title {
            color: white;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .category-button {
            background-color: #212529;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            margin: 0.25rem;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
        }

        .category-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .category-button img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .map-container {
            height: 600px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .buttons-container {
            margin-bottom: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        /* Estilos para el selector de lugares */
        #placeSelector {
            background-color: transparent;
            color: #FFC629;
            font-family: sans-serif;
            border-bottom: 1px solid #FFC629;
            border-top: none;
            border-left: none;
            border-right: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 0;
            margin-bottom: 1rem;
            width: 100%;
            max-width: 600px;
        }

        /* Estilo al pasar el mouse */
        #placeSelector:hover {
            border-bottom-color: #FFC629;
        }

        /* Estilo cuando está enfocado */
        #placeSelector:focus {
            border-bottom-color: #212529;
            box-shadow: #FFC629;
        }

        /* Estilo para las opciones del selector */
        #placeSelector option {
            background-color: #212529;
            color: #FFC629;
            padding: 0.5rem 1rem;
        }

        /* Estilo para las opciones al pasar el mouse */
        #placeSelector option:hover {
            background-color: #212529;
        }

        /* Estilo para las opciones seleccionadas */
        #placeSelector option:checked {
            background-color: #212529;
        }

        /* Tooltip del mapa */
        #mapTooltip {
            background-color: #FFC629;
            color: #000;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            z-index: 1000;
            top: 50px;
        }

        #mapTooltip i {
            margin-right: 0.5rem;
        }
    </style>
@endsection


@section('body')

    <body data-topbar="dark" class="bg-dark">
    @endsection

    @section('content')
        <div class="main-container bg-dark">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mb-4">
                            <h1 class="text-white m-0 h5 h4-sm">
                                <a href="{{ route('next-to-me.index') }}" class="text-white text-decoration-none">
                                    <i class="mdi mdi-chevron-left ms-1"  nonce="newN0nc3ForS3cur1ty" style="font-family: 'Gelasio', serif !important;"></i>{{ $currentPlace['title'] ?? 'Lugares' }}
                                </a>
                            </h1>
                        </div>
                    </div>
                </div>

                <!-- Selector de lugares -->
                <div class="row mb-4">
                    <div class="col-12">
                        <select id="placeSelector">
                            @foreach ($allPlaces as $key => $place)
                                <option value="{{ $key }}"
                                    {{ $currentPlace['title'] === $place['title'] ? 'selected' : '' }}>
                                    {{ $place['title'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Mapa -->
                <div class="row">
                    <div class="col-12 position-relative">
                        <div class="map-container">
                            <div id="mapTooltip" class="position-absolute p-2 d-flex align-items-center">
                                <span class="close-tooltip me-2"  nonce="newN0nc3ForS3cur1ty" style="cursor: pointer;">×</span>
                                <i class="mdi mdi-arrow-up"></i><small class="ms-1">Clic para ver la lista</small>
                            </div>
                            <iframe id="mapIframe" src="{{ $currentPlace['map_url'] }}"
                                 nonce="newN0nc3ForS3cur1ty" style="width: 100%; height: 100%; border: none;" allowfullscreen loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty" >
            // Close tooltip functionality
            document.addEventListener('DOMContentLoaded', function() {
                const tooltip = document.getElementById('mapTooltip');
                const closeBtn = tooltip.querySelector('.close-tooltip');
                
                // Hide tooltip when close button is clicked
                closeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    tooltip.style.display = 'none';
                });
                
                // Prevent tooltip from hiding when clicking inside it
                tooltip.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
                
                // Hide tooltip when clicking anywhere else on the document
                document.addEventListener('click', function() {
                    // Don't hide on initial page load
                    if (tooltip.dataset.initialized) {
                        tooltip.style.display = 'none';
                    } else {
                        tooltip.dataset.initialized = 'true';
                    }
                });
            });
            // Función para manejar el cambio de lugar
            document.getElementById('placeSelector').addEventListener('change', function() {
                const selectedValue = this.value;
                if (selectedValue) {
                    // Construir la URL con el lugar seleccionado
                    const baseUrl = '{{ route('next-to-me.place.show', ['place' => 'PLACEHOLDER']) }}';
                    window.location.href = baseUrl.replace('PLACEHOLDER', encodeURIComponent(selectedValue));
                }
            });

            function hideTooltip() {
                var tooltip = document.getElementById('mapTooltip');
                if (tooltip) {
                    // Forzar la eliminación del elemento en lugar de solo ocultarlo
                    tooltip.parentNode.removeChild(tooltip);
                }
            }

            // Usar window.onload para asegurar que todo esté cargado, incluyendo el iframe
            window.onload = function() {
                // Esperar un poco más para asegurar que todo esté listo
                setTimeout(hideTooltip, 4000);
            };
        </script>
    @endsection
