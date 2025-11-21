@extends('layouts.master')
@section('title')
    Cerca de mí
@endsection
@section('css')
    {{-- App js --}}
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
        .card {
            border: none !important;
            box-shadow: none !important;
            background-color: transparent !important;
            max-width: 1400px;
            /* Ancho máximo para pantallas grandes */
            margin: 0 auto;
            /* Centrar en pantallas grandes */
        }

        /* Contenedor principal */
        .main-container {
            padding: 0 20px;
            /* Añadir padding en móviles */
        }

        @media (min-width: 768px) {
            .main-container {
                padding: 0 40px;
                /* Más padding en tablets */
            }

            .category-button {
                min-height: 120px;
                /* Altura fija para los botones en desktop */
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 1.5rem 0.5rem;
                font-size: 1rem;
            }

            .category-button i {
                font-size: 2rem;
                margin-bottom: 0.75rem;
            }
        }

        @media (min-width: 1200px) {
            .main-container {
                padding: 0 60px;
                /* Aún más padding en pantallas grandes */
            }

            .category-button {
                font-size: 1.1rem;
            }
        }

        .card-title {
            color: white;
            /* Or your desired title color */
        }

        .section-title {
            color: white;
            font-weight: bold;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }

        .category-button {
            background-color: #212529;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 1rem 0.5rem;
            margin: 0.5rem;
            text-align: center;
            flex: 1 1 calc(25% - 1rem);
            /* Ocupa 25% del ancho menos el margen */
            min-width: 200px;
            /* Ancho mínimo para evitar que se hagan muy pequeños */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            cursor: pointer;
        }

        /* Ajustes para diferentes cantidades de botones por fila */
        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 0.5rem;
            margin: 0 -0.5rem;
            /* Compensa el margen de los botones */
        }

        /* Asegurar que los botones en grupos pequeños ocupen más espacio */
        @media (max-width: 1199px) {
            .category-button {
                flex: 1 1 calc(33.333% - 1rem);
                min-width: 150px;
            }
        }

        @media (max-width: 767px) {
            .category-button {
                flex: 1 1 calc(50% - 1rem);
                min-width: 120px;
            }
        }

        .category-icon {
            display: block;
            margin: 0 auto 0.75rem auto;
            width: 32px;
            height: 32px;
            object-fit: contain;
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(93deg) brightness(103%) contrast(103%);
            /* Filtro para convertir a blanco */
        }

        .category-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            text-align: center;
            padding: 1.5rem 0.5rem;
        }

        .category-button:hover {
            transform: translateY(-5px);
            /* Slight upward movement on hover */
        }

        /* Centers the buttons on smaller screens */
        @media (max-width: 768px) {
            .category-button {
                width: 100%;
                /* Full width on smaller screens */
                max-width: none;
                /* Remove the max-width restriction */
                margin: 0.5rem 0;
                /* Adjust margins */
            }

        }
    </style>
@endsection
@section('page-title')
    Cerca de mí
@endsection
@section('breadcrumb')
    <!-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('next-to-me.index') }}">Cerca de mí</a></li>
            <li class="breadcrumb-item active">Cerca de mí</li>
        </ol>
    </div> -->
@endsection
@section('body')

    <body data-topbar="dark" class="bg-dark">
    @endsection
    @section('content')
        <div class="main-container bg-dark">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <!-- <div class="mb-4">
                            <h5 class="text-white mb-0"><i class="mdi mdi-chevron-left ms-1"></i> Cerca de mí</h5>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="section-title text-white mt-5">Hoteles</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        @php
                                            $hotelPlaces = [
                                                'hoteles-polanco' => 'Hoteles en el corazón de Polanco',
                                                'hoteles-boutique' => 'Hoteles Boutique Polanco',
                                                'hoteles-reforma' => 'Hoteles en Paseo de la Reforma',
                                                'hoteles-cercanos' => 'Hoteles cercanos a Polanco',
                                            ];
                                        @endphp

                                        @foreach ($hotelPlaces as $slug => $title)
                                            <a href="{{ route('next-to-me.place.show', $slug) }}" class="category-button">
                                                <img src="{{ asset('icons/IconosApp/hoteles.svg') }}"
                                                    alt="{{ $title }}" class="category-icon">
                                                {{ $title }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <h4 class="section-title text-white mt-5">Restaurantes</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        @php
                                            $foodPlaces = [
                                                'restaurantes-nice' => ['Restaurantes', 'Restaurante.svg'],
                                                'bares-informales' => ['Bares', 'Bares.svg'],
                                                'tiendas' => ['Tiendas de conveniencia', 'Tiendita.svg'],
                                                'cafes' => ['Cafeterías', 'Café.svg'],
                                            ];
                                        @endphp

                                        @foreach ($foodPlaces as $slug => $data)
                                            <a href="{{ route('next-to-me.place.show', $slug) }}" class="category-button">
                                                <img src="{{ asset('icons/IconosApp/' . $data[1]) }}"
                                                    alt="{{ $data[0] }}" class="category-icon">
                                                {{ $data[0] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <h4 class="section-title text-white mt-5">Gimnasios</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        <a href="{{ route('next-to-me.place.show', 'gimnasios') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Gym.svg') }}" alt="Gimnasios"
                                                class="category-icon">
                                            Gimnasios
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- <h4 class="section-title text-white mt-5">Bares y cantinas</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        <a href="{{ route('next-to-me.place.show', 'bares-cantinas') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/bares.svg') }}" alt="Cantinas y Bares"
                                                class="category-icon">
                                            Bares y cantinas
                                        </a>
                                    </div>
                                </div>
                            </div> -->

                            <h4 class="section-title text-white mt-5">Hospitales</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        <a href="{{ route('next-to-me.place.show', 'hospitales') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Hospital.svg') }}" alt="Hospital"
                                                class="category-icon">
                                            Hospitales
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'doctores') }}" class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Doctor.svg') }}" alt="Doctor"
                                                class="category-icon">
                                            Doctores
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <h4 class="section-title text-white mt-5">Transporte</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        <a href="{{ route('next-to-me.place.show', 'renta-autos') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Auto.svg') }}" alt="Autos"
                                                class="category-icon">
                                            Renta de autos
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'transporte-publico') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Bus.svg') }}" alt="Transporte"
                                                class="category-icon">
                                            Transporte público
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <h4 class="section-title text-white mt-5">Centros recreativos</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        <a href="{{ route('next-to-me.place.show', 'centros-recreativos') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Mall.svg') }}" alt="Centros"
                                                class="category-icon">
                                            Centros recreativos
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'naturaleza') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Nature.svg') }}" alt="Naturaleza"
                                                class="category-icon">
                                            Parques
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'centros-recreativos') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/City.svg') }}" alt="Ciudad"
                                                class="category-icon">
                                            Ciudades
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'embajadas') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Flag.svg') }}" alt="Embajadas"
                                                class="category-icon">
                                            Embajadas
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- <h4 class="section-title text-white mt-5">Casinos</h4> --}}
                            {{-- <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        <a href="{{ route('next-to-me.place.show', 'casinos') }}" class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Money.svg') }}" alt="Apuestas" class="category-icon">
                                            Casinos
                                        </a>
                                    </div>
                                </div>
                            </div> --}}

                            <h4 class="section-title text-white mt-5">Centros comerciales</h4>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="buttons-container">
                                        <a href="{{ route('next-to-me.place.show', 'shopping') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Shopping.svg') }}" alt="Shopping"
                                                class="category-icon">
                                            Centros comerciales
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'dinero') }}" class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Money.svg') }}" alt="Dinero"
                                                class="category-icon">
                                            Banco
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'cuidado') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/Care.svg') }}" alt="Cuidado"
                                                class="category-icon">
                                            Estéticas
                                        </a>
                                        <a href="{{ route('next-to-me.place.show', 'selflove') }}"
                                            class="category-button">
                                            <img src="{{ asset('icons/IconosApp/selflove.svg') }}" alt="Autocuidado"
                                                class="category-icon">
                                            Spas
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
        <!-- Required datatable js -->
        <script src="{{ URL::asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- dropzone js -->
        <script src="{{ URL::asset('libs/dropzone/min/dropzone.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('js/pages/ecommerce-select2.init.js') }}"></script>

        <!-- select2 js -->
        <script src="{{ URL::asset('libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('js/pages/form-advanced.init.js') }}"></script>
    @endsection
