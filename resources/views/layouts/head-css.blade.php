@yield('css') 

<!-- Bootstrap Css -->
<link href="{{ URL::asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- Sweet Alert-->
<link href="{{ URL::asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
{{-- fonts galicia --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Este link es dinamico dependiendo del navegador -->
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Gelasio:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
<link href="{{ URL::asset('css/fonts.css') }}" rel="stylesheet" type="text/css" />
<style nonce="newN0nc3ForS3cur1ty" >
    /* Fuente Signerica para SVGs */
    @font-face {
        font-family: 'Signerica';
        src: url('{{ URL::asset("fonts/Signerica_Medium.ttf") }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    
    /* Estilos globales para elementos SVG */
    svg text {
        font-family: "Signerica", sans-serif;
    }
    
    svg .area {
        cursor: pointer;
    }
    
    svg .areaSeleccionada {
        fill: rgba(13, 110, 253, 0.3) !important;
        stroke: #0d6efd !important;
        stroke-width: 2px !important;
    }
<style nonce="newN0nc3ForS3cur1ty" >
    .select2-container--bootstrap-5.select2-container--focus .select2-selection,
        .select2-container--bootstrap-5.select2-container--open .select2-selection {
            border-color: #8face3;
            outline: 0;
            box-shadow: 0 0 #1f58c740;
        }

        .select2-container--bootstrap-5 .select2-selection {
            border: var(--bs-border-width) solid var(--bs-border-color);
            border-radius: var(--bs-border-radius);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
            font-size: 12px !important;
            border-radius: var(--bs-border-radius);
            background-color: RGBA(245, 246, 248, var(--bs-bg-opacity, 1)) !important;
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            border-radius: var(--bs-border-radius);
        }
        body[data-topbar=dark] .header-profile-user {
            border-color: #fff7;
        }
        .topnav {
            box-shadow: none;
        }
        body[data-topbar=dark] .header-item i, body[data-topbar=dark] .header-item span {
            color: #fff;
        }
        body[data-layout=horizontal][data-topbar=dark] .ishorizontal-topbar {
            background-color: #000000;
        }
        * {
            font-family: "Fira Sans", serif;
        }
        .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
            font-family: "Gelasio", serif;
            color: #000000;
        }
        .topnav .navbar-nav .dropdown-item {
            font-family: "Fira Sans", serif;
        }
        body {
            color: #000000;
        }
        /* css botones  */
        .btn {
            border-radius: 7px;
        } 
        .btn.btn-warning {
            background-color: #FFC629;
            color: #000000 !important;
        }
        .is-invalid {
            border-color: var(--bs-form-invalid-border-color) !important;
        }
        /* circle button  */
        .btn-circle.btn-xl {
            width: 100px;
            height: 100px;
            padding: 10px 16px;
            border-radius: 50px;
            font-size: 24px;
            line-height: 1.33;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
        .topnav .navbar-nav .nav-link:focus, .topnav .navbar-nav .nav-link:hover {
            color: #000000;
        }
        .topnav .navbar-nav .dropdown-item.active, .topnav .navbar-nav .nav-item .nav-link.active {
            color: #000000;
        }
        .flatpickr-months, .flatpickr-weekdays {
            background-color: #FFC629 !important;
            color: #000000 !important;
        }
        .flatpickr-current-month .flatpickr-monthDropdown-months {
            color: #000000 !important;
        }
        .flatpickr-months .flatpickr-prev-month svg, .flatpickr-months .flatpickr-next-month svg {
            fill: #000000 !important;
        }
        .flatpickr-current-month input.cur-year {
            color: #000000 !important;
        }
        .swal2-icon {
            border-color: #000000 !important;
            color: #000000 !important;
        }
        .form-control.input-inline {
            width: 300px;
            display: inline-block;
        }
        .input-200px {

        }

</style>
<!-- datepicker css -->
<link rel="stylesheet" href="{{ URL::asset('libs/flatpickr/flatpickr.min.css') }}">