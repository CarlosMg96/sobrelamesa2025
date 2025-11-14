@extends('layouts.master')

@section('css')
    <style nonce="newN0nc3ForS3cur1ty">
        .bg-color {
            background-color: #1D1D1D;
            color: white;
        }

        .cardPerfil {
            display: flex;
            align-items: center;
            color: #000;
            height: 76vmin;
            border-radius: 6px;
            background-color: #FFC629;
            text-align: center;
            position: relative;
            min-height: 80vh;
        }

        .cardPerfil h3 {
            font-size: 2em;
            margin-bottom: 0;
        }

        .hyatt-logo {
            width: 50%;
            height: auto;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .hyatt-logo {
                width: 100%;
            }
        }

        .name {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 0.25em;
        }

        .user-type-container {
            margin-top: 0.25em;
            /* Adjust spacing */
        }

        .user-type-line {
            border-bottom: 1px solid black;

        }

        .user-type {
            font-size: 0.9em;
            /* Smaller font size */
            color: rgba(0, 0, 0, 0.7);
            /* Optional: Slightly muted color */
            margin-top: 0.25em;
            /* Space between line and text */
        }

        .position {
            font-size: 1em;
            color: rgba(0, 0, 0, 0.7);
            margin-bottom: 1em;
        }

        .info-card {
            background-color: #1D1D1D;
            color: rgb(184, 184, 184);
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 0.9rem;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            margin-bottom: 1rem;
        }

        .back-link {
            position: absolute;
            left: 15px;
            z-index: 10;
            color: white;
        }
    </style>
@endsection

@section('body')

    <body class="bg-color" data-topbar="dark">
    @endsection

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <a href="{{ route('benefits') }}" class="back-link">
                    <i class="mdi mdi-chevron-left ms-1" nonce="newN0nc3ForS3cur1ty"></i> Mis Beneficios
                </a>
                <div class="col-md-8">
                    <div class="cardPerfil">
                        <div
                            style="background: url(images/bg-3.png); height: 100%; width: 40%; background-size: cover; background-position: center; background-repeat: no-repeat;">
                        </div>
                        <div
                            style="DISPLAY: inline-grid;background-color: #FFC629;height: 100%;width: 100%;PLACE-ITEMS: CENTER;">
                            <h3>Galicia</h3>
                            <img src="{{ asset('images/sponsors/hyatt-removebg.png') }}" alt="Hyatt" class="hyatt-logo"
                                nonce="newN0nc3ForS3cur1ty">


                            <div class="user-type-container" style="TEXT-ALIGN: LEFT;">
                                <div class="name">{{ $user->name ?? '' }}</div>
                                <div class="user-type-line"></div>
                                @if ($user->type_user == 'Socios')
                                    <div class="user-type">Socio</div>
                                @elseif ($user->type_user == 'Asociados')
                                    <div class="user-type">Asociado</div>
                                @elseif ($user->type_user == 'Pasantes')
                                    <div class="user-type">Pasante</div>
                                @else
                                    <div class="user-type">Sin tipo de usuario</div>
                                @endif
                            </div>

                            <div class="position">{{ $user->position ?? '' }}</div>
                        </div>
                    </div>
                </div>
                <div class="info-card">
                    Identifícate con esta credencial a tu llegada para obtener los beneficios.
                </div>
            </div>
        </div>
    @endsection
