@extends('layouts.master')

@section('title')
    Notificaciones
@endsection

@section('css')
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

        /* Estilos de la pantalla de notificaciones */
        .notification-container {
            background-color: #1c1c1c;
            /* Dark background */
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .notification-title {
            font-size: 1.5rem;
            margin: 0;
        }

        .notification-count {
            font-size: 1rem;
            color: #FFC629;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            padding: 15px 0;
            border-bottom: 1px solid #333;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .notification-icon {
            margin-right: 15px;
            font-size: 24px;
            /* Adjust as needed */
            color: #FFC629;
            /* Use your accent color */
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-date {
            font-size: 0.8rem;
            color: #999;
        }

        .notification-name {
            font-weight: bold;
            color: #FFC629;
        }

        .notification-message {
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .notification-pdf {
            display: inline-block;
            background-color: #FFC629;
            color: #000;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.8rem;
            margin-top: 5px;
        }
    </style>
@endsection

@section('body')

    <body data-topbar="dark" class="bg-dark">
    @endsection

    @section('content')
        @inject('dateHelper', 'App\Helpers\DateHelper')
        <div class="main-container bg-dark">
            <div class="container-fluid">
                <div class="notification-container">
                    <div class="notification-header">
                        <a href="{{ url('/') }}" class="text-white text-decoration-none">
                            <i class="mdi mdi-chevron-left ms-1"></i>Notificaciones
                        </a>
                        @if ($todayCount > 0)
                        <span class="notification-count">{{ $todayCount }} {{ $todayCount === 1 ? 'nueva' : 'nuevas' }}</span>
                    @endif
                    </div>

                    <!-- Notificaciones nuevas (de hoy) -->
                    @foreach ($newNotifications as $notification)
                        <div class="notification-item">
                            @if (isset($notification['image']))
                                <img src="{{ $notification['image'] }}" alt="Notification Image" class="notification-image">
                            @elseif (isset($notification['icon']))
                                <i class="notification-icon {{ $notification['icon'] }}"></i>
                            @endif

                            <div class="notification-content">
                                <div class="notification-date">{{ $dateHelper::formatNotificationDate($notification['date']) }}</div>
                                <div class="notification-message">{{ $notification['message'] }}</div>
                                @if (isset($notification['pdf']) && $notification['pdf'])
                                    <a href="#" class="notification-pdf">PDF</a>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <!-- Notificaciones anteriores -->
                    @if (count($oldNotifications) > 0)
                        <h6 class="mt-4 mb-3 text-white">Anteriores</h6>
                        
                        @foreach ($oldNotifications as $notification)
                            <div class="notification-item">
                                @if (isset($notification['image']))
                                    <img src="{{ $notification['image'] }}" alt="Notification Image" class="notification-image">
                                @elseif (isset($notification['icon']))
                                    <i class="notification-icon {{ $notification['icon'] }}"></i>
                                @endif

                                <div class="notification-content">
                                    <div class="notification-date">{{ $dateHelper::formatNotificationDate($notification['date']) }}</div>
                                    <div class="notification-message">{{ $notification['message'] }}</div>
                                    @if (isset($notification['pdf']) && $notification['pdf'])
                                        <a href="#" class="notification-pdf">PDF</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
    @endsection
