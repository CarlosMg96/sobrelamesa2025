@extends('layouts.master')

@section('title')
    Manual de Inducción | Galicia App
@endsection

@section('css')
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/user_manual.css') }}">
    <style nonce="newN0nc3ForS3cur1ty" >
        body[data-topbar=dark] .page-content{
            padding: 0px !important;
        }
        body{
            background-color:rgb(255, 198, 53) !important;
        }
        .page-content .container-fluid{
            max-width: 100% !important;
        }
        .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl{
            padding: 0px !important;
        }
        .bg-color{
            background-color: #1D1D1D;
            border: none;
            border-radius: 0px;
        }
    </style>
@endsection

@section('body')
    <body data-topbar="dark" >
@endsection

@section('content')

<!-- Header -->
<header class="header">
    <div class="header-container">
        <div class="header-logo">
            <img src="{{ asset('images/galicia-dark-logo.svg') }}" alt="Galicia Logo" class="logo-image">
        </div>
    </div>
</header>

<div class="user-manual-container">

<!-- Hero -->
<section class="hero bg-yellow">
    <div class="container">
        <div class="hero-content">
            <div class="typewriter-text" id="typewriter">#AppGalicia</div>
            <h2 class="hero-subtitle">Manual de Inducción y Operación | Nuevas Oficinas</h2>
        </div>
    </div>
</section>

<!-- Índice -->
<section class="index-section bg-white" id="index-section">
    <div class="container">
        <div class="index-content">
            <div class="index-title-container">
                <h1 class="index-title">Manual de Inducción y Operación | Nuevas Oficinas</h1>
                <!-- Subrayado SVG -->
                <svg class="title-underline" viewBox="0 0 800 80" xmlns="http://www.w3.org/2000/svg">
                    <path id="underlinePath1" 
                          d="M20,60 Q100,40 200,60 T380,60 Q460,40 540,60 T700,60 Q780,40 780,60" 
                          fill="none" 
                          stroke="currentColor" 
                          stroke-width="4" 
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="index-subtitle">ÍNDICE</h2>
            <h3 class="index-description">Manual de Inducción y Operación | Nuevas Oficinas</h3>

             <div class="index-list">
                    <div class="index-item bold index-link">Introducción</div>
                    <div class="index-item bold index-link">1. Uso de Espacios Comunes, Oficinas y lugares de trabajo abiertos</div>    
                    <div class="index-item bold pt-4 index-link">2. Seguridad y Solicitud de Alimentos de Establecimientos de Terceros</div>
                    <div class="index-item bold index-link">3. Medidas de Seguridad en Caso de Emergencia Médica, Sismo o Incendio</div>
                    <div class="index-item bold index-link">4. Convivencia y Respeto Laboral</div>
                    <div class="index-item bold index-link">5. Sostenibilidad y Uso Responsable de Recursos</div>
                    <div class="index-item bold index-link">6. Directorio Corporativo</div>
                    <div class="index-item bold index-link">7. Nuestros Espacios / Instalaciones / Ubicación de Equipos por Piso</div>
                </div>
        </div>
    </div>
</section>

<!-- Introducción -->
<section class="intro-section bg-light-gray" id="introduccion">
    <div class="container">
        <div class="section-title-container">
            <h2 class="section-title">Manual de Inducción y Operación | Nuevas Oficinas</h2>
            <svg class="title-underline" viewBox="0 0 800 80" xmlns="http://www.w3.org/2000/svg">
                <path id="underlinePath2" 
                      d="M20,60 Q100,40 200,60 T380,60 Q460,40 540,60 T700,60 Q780,40 780,60" 
                      fill="none" 
                      stroke="currentColor" 
                      stroke-width="4" 
                      stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="intro-content">
            <p>Este documento tiene como objeto dar a conocer las reglas...</p>
            <p class="font-semibold mb-2">Incluye:</p>
            <ul>
                <li> Planos por piso con <em>facilities</em> identificadas y listadas</li>
                        <li> Reglamento de uso, horarios y acceso a cada espacio</li>
                        <li> Directorio de colaboradores, áreas y equipos</li>
                        <li> Protocolos de convivencia, seguridad y sostenibilidad</li>
                        <li> Otros</li>
            </ul>
        </div>
    </div>
</section>

<!-- Introducción Negra -->
<section class="intro-black bg-black" id="espacios-comunes">
    <div class="container">
        <div class="intro-black-content">
            <div class="intro-title-container">
                <div class="intro-title">Introducción</div>
                <svg class="title-underline" viewBox="0 0 800 80" xmlns="http://www.w3.org/2000/svg">
                    <path id="underlinePath3" 
                          d="M20,60 Q100,40 200,60 T380,60 Q460,40 540,60 T700,60 Q780,40 780,60" 
                          fill="none" 
                          stroke="currentColor" 
                          stroke-width="4" 
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>

            <div class="intro-text">
                <p>Con el objetivo de fomentar un entorno de trabajo funcional...</p>
                <p>Estas pautas buscan promover la convivencia...</p>
            </div>
        </div>
    </div>
</section>

<!-- Templates de dropdown -->
<template id="yellow-dropdown-template">
    <div class="dropdown-container yellow-dropdown" data-id="">
        <button class="dropdown-header yellow">
            <div class="dropdown-title"></div>
            <div class="dropdown-icon">
                <svg class="chevron-down" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6,9 12,15 18,9"></polyline>
                </svg>
            </div>
        </button>
        <div class="dropdown-content">
            <div class="dropdown-inner">
                <div class="content-text"></div>
                <div class="nested-dropdowns"></div>
            </div>
        </div>
    </div>
</template>

<template id="gray-dropdown-template">
    <div class="dropdown-container gray-dropdown" data-id="">
        <button class="dropdown-header gray">
            <div class="dropdown-title"></div>
            <div class="dropdown-icon">
                <svg class="chevron-down" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6,9 12,15 18,9"></polyline>
                </svg>
            </div>
        </button>
        <div class="dropdown-content">
            <div class="dropdown-inner">
                <div class="content-text"></div>
            </div>
        </div>
    </div>
</template>

<!-- Botón back-to-top -->
<button class="back-to-top" id="back-to-top" aria-label="Volver al índice">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="18,15 12,9 6,15"></polyline>
    </svg>
</button>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/user-manual/header-scroll.js') }}"></script>
    <script src="{{ asset('js/user-manual/dropdown-system.js') }}"></script>
    <script src="{{ asset('js/user-manual/app-templates.js') }}"></script>
    <script src="{{ asset('js/user-manual/index-navigation.js') }}"></script>
    <script src="{{ asset('js/user-manual/back-to-top.js') }}"></script>
    <script src="{{ asset('js/user-manual/underline-animation.js') }}"></script>
    <script src="{{ asset('js/user-manual/scroll-animations.js') }}"></script>
    <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
@endsection