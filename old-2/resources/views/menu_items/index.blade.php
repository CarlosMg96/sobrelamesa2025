@extends('layouts.master')

@section('title')
    @lang('Catering')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" />
    <style nonce="newN0nc3ForS3cur1ty" >
        div.dt-buttons {
            display: none;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .text-amber {
            color: #FFC629;
        }
        .bg-amber {
            background-color: #FFC629;
        }
        .zone-day {
            margin-top: 30px;
            width: 50%;
        }
        .bg-items {
            --bs-bg-opacity: 1;
            background-color: #5865F2 !important;
        }
        body {
            background-color: #000;
            color: #fff;
        }
        .coming-soon {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
        }
        .coming-soon-content {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 198, 41, 0.3);
        }
        .coming-soon i {
            font-size: 4rem;
            color: #FFC629;
            margin-bottom: 1.5rem;
        }
        .coming-soon h2 {
            color: #FFC629;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .coming-soon p {
            color: #fff;
            font-size: 1.2rem;
            opacity: 0.9;
        }

    </style>
@endsection

@section('page-title')
    @lang('Catering')
@endsection

@section('body')
    <body data-topbar="dark" class="bg-color">
@endsection

@section('content')

@if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Kitchen') || Auth::user()->hasRole('HR'))
<div>
   <div class="row align-items-center">
    <div class="col-md-6">
        <h5 class="card-title">@lang('Lista de Catering')</h5>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-end gap-2">
            @if(Auth::user()->hasRole('Kitchen'))
                <a href="{{ route('menu_items.create') }}" class="btn btn-warning text-black">
                    <i class="bx bx-plus me-1"></i> @lang('Administrar Menú')
                </a>
            @endif
            <div class="gap-2">
               <a href="{{ route('menu_items.shopping-cart') }}" class="btn btn-warning text-black">
                    <i class="bx bx-cart me-1"></i> @lang('Carrito')
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">

       {{-- Tabs de semana --}}
        <div class="d-flex gap-4 border-bottom mb-4">
            <div id="tab-current" class="tab-week pb-2 border-bottom border-warning text-amber fw-bold cursor-pointer">
                Semana actual <br>
                <small class="text-muted">
                    {{ \Carbon\Carbon::now()->startOfWeek()->format('d M') }} - {{ \Carbon\Carbon::now()->endOfWeek()->format('d M') }}
                </small>
            </div>
            <div id="tab-next" class="tab-week pb-2 text-muted cursor-pointer">
                Semana próxima <br>
                <small class="text-muted">
                    {{ \Carbon\Carbon::now()->addWeek()->startOfWeek()->format('d M') }} - {{ \Carbon\Carbon::now()->addWeek()->endOfWeek()->format('d M') }}
                </small>
            </div>
        </div>


        @php

            $groupedCurrent = $currentWeekItems->groupBy(function($item) {
                 return \Carbon\Carbon::parse($item->available_date)->locale('es')->isoFormat('dddd D [de] MMMM');
            });

            $groupedNext = $nextWeekItems->groupBy(function($item) {
                 return \Carbon\Carbon::parse($item->available_date)->locale('es')->isoFormat('dddd D [de] MMMM');
            });
        @endphp

       {{-- Sección: Semana actual --}}
        <div id="week-current">
            @if($groupedCurrent->count())
                <h4 class="mb-3">Semana actual</h4>
                @foreach($groupedCurrent as $day => $items)
                    <div class="mb-5">
                        <div class="zone-day">
                            <h5 class="bg-amber text-dark py-2 px-3 rounded-0">{{ ucfirst($day) }}</h5>
                        </div>
                        @foreach($items as $item)
                          <div class="border-bottom py-2 d-flex justify-content-between align-items-center">
                            <div class="row"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                <div class="col-6">
                                    <strong>{{ $item->name }}</strong><br>
                                    <span>${{ number_format($item->price, 2) }}</span>
                                </div>
                                <div class="col-5 text-end">
                                    @if($item->available_quantity === 1)
                                        <span class="badge bg-items">{{ $item->available_quantity }} Disponible</span>
                                    @elseif($item->available_quantity > 1)
                                        <span class="badge bg-items">{{ $item->available_quantity }} Disponibles</span>
                                    @else
                                        <span class="badge bg-items">Agotado</span>
                                    @endif
                                </div>
                                <div class="col-1">
                                    <a href="{{ route('menu_items.show', $item->id) }}" class="text-amber"><i class="bx bx-chevron-right me-1"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <p class="text-muted">No hay menú disponible para esta semana.</p>
            @endif
        </div>

        {{-- Sección: Semana próxima --}}
        <div id="week-next"  nonce="newN0nc3ForS3cur1ty" style="display: none;">
            @if($groupedNext->count())
                <h4 class="mb-3 mt-5">Semana próxima</h4>
                @foreach($groupedNext as $day => $items)
                    <div class="mb-5">
                        <div class="zone-day">
                            <h5 class="bg-amber text-dark py-2 px-3 rounded-0">{{ ucfirst($day) }}</h5>
                        </div>
                        @foreach($items as $item)
                            <div class="border-bottom py-2 d-flex justify-content-between align-items-center">
                                <div class="row"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                    <div class="col-6">
                                        <strong>{{ $item->name }}</strong><br>
                                        <span>${{ number_format($item->price, 2) }}</span>
                                    </div>
                                    <div class="col-5 text-end">
                                        @if($item->available_quantity === 1)
                                            <span class="badge bg-items">{{ $item->available_quantity }} Disponible</span>
                                        @elseif($item->available_quantity > 1)
                                            <span class="badge bg-items">{{ $item->available_quantity }} Disponibles</span>
                                        @else
                                            <span class="badge bg-items">Agotado</span>
                                        @endif
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ route('menu_items.show', $item->id) }}" class="text-amber"><i class="bx bx-chevron-right me-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <p class="text-muted">No hay menú disponible para la próxima semana.</p>
            @endif
        </div>


    </div>
</div> 
</div>
@else
<div class="coming-soon">
        <div class="coming-soon-content">
            <i class="fas fa-utensils"></i>
            <h2>Próximamente</h2>
        </div>
    </div>
@endif
@endsection

@section('scripts')
<!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
    <script nonce="newN0nc3ForS3cur1ty" >
        $(document).ready(function () {
            // Mostrar mensaje de éxito si existe
            @if (session('status'))
                    var session = JSON.parse("{{ session('status') }}".replace(/(&quot\;)/g,"\""));
                    if (session.success) 
                        alertify.success(session.message)
                    else
                        alertify.error(session.message)
                @endif

            // Funcionalidad de tabs
            $('#tab-current').click(function () {
                $('#week-current').show();
                $('#week-next').hide();

                $('#tab-current').addClass('border-bottom border-warning text-amber fw-bold')
                                 .removeClass('text-muted');
                $('#tab-next').removeClass('border-bottom border-warning text-amber fw-bold')
                              .addClass('text-muted');
            });

            $('#tab-next').click(function () {
                $('#week-next').show();
                $('#week-current').hide();

                $('#tab-next').addClass('border-bottom border-warning text-amber fw-bold')
                              .removeClass('text-muted');
                $('#tab-current').removeClass('border-bottom border-warning text-amber fw-bold')
                                 .addClass('text-muted');
            });
        });
    </script>
@endsection

