@extends('layouts.master')
@section('title')
    @lang('Editar Viaje')
@endsection
@section('css')
    {{-- select2 Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" integrity="sha384-OXVF05DQEe311p6ohU11NwlnX08FzMCsyoXzGOaL+83dKAb3qS17yZJxESl8YrJQ" crossorigin="anonymous">
    {{-- select2 bootstrap theme --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" integrity="sha384-IrMr0LFnIMa9H6HhC5VVqVuWNEIwspnRLKQc0SUyPj4Cy4s02DiWDZEoJOo5WNK6" crossorigin="anonymous">
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- quill css -->
    <link href="{{ URL::asset('libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('libs/flatpickr/flatpickr.min.css') }}">
@endsection
@section('page-title')
@lang('Editar Viaje')
@endsection
@section('breadcrumb')
    {{-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('deals') }}">Deals</a></li>
            <li class="breadcrumb-item active">New Deal</li>
        </ol>
    </div> --}}
@endsection
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">@lang('Editar Viaje')
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('travels') }}">@lang('Lista de Viajes')</a></li>
                            <li class="breadcrumb-item active">@lang('Editar Viaje')</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div id="buttons">
                        @if ($travel->is_closed)
                        <a href="{{ route('travels.download.after.report', ['id' => $travel->id]) }}" target="_blank" id="btn-after-report" class="btn btn-success">
                            <i class="bx bx-cloud-download me-1"></i> @lang('Descargar Reporte Posterior')
                        </a>
                        @else
                        <button type="button" id="btn-generate-report" class="btn btn-success">
                            <i class="bx bxs-plane-land me-1"></i> @lang('Generar Reporte Posterior')
                        </button>
                        @endif
                        <a href="{{ route('travels.download.previous.report', ['id' => $travel->id]) }}" target="_blank" id="btn-previous-report" class="btn btn-info">
                            <i class="bx bx-cloud-download me-1"></i> @lang('Descargar Reporte Previo')
                        </a>
                        <button type="button" id="btn-save" class="btn btn-warning">
                            <i class="bx bx-save me-1"></i> @lang('Guardar')
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-xl-6 col-xxl-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('travels.update', ['id' => $travel->id]) }}" id="form-store" method="POST">
                            <input type="hidden" name="id" value="{{ $travel->id }}">
                            <div class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">@lang('Nombre del viaje')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Nombre del viaje')" id="name" name="name" value="{{ $travel->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="place">@lang('Lugar')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Lugar')" id="place" name="place" value="{{ $travel->place }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="start_date">@lang('Fecha Inicio')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Fecha Inicio')" id="start_date" name="start_date" value="{{ $travel->start_date }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="end_date">@lang('Fecha Fin')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Fecha Fin')" id="end_date" name="end_date" value="{{ $travel->end_date }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="practice_area_ids">@lang('Áreas de práctica involucradas')</label>
                                        <select class="form-select" name="practice_area_ids[]"
                                            id="practice_area_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach ($practice_areas as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $practice_area_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="partner_ids">@lang('Asistentes')</label>
                                        <select class="form-select" name="partner_ids[]" id="partner_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $partner_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel_type_ids">@lang('Tipo de Evento')</label>
                                        <select class="form-select" name="travel_type_ids[]" id="travel_type_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\TravelType::all() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $event_type_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="client_ids">@lang('Nombre de Clientes a visitar')</label>
                                        <select class="form-select" name="client_ids[]" id="client_ids" multiple  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Client::all() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $client_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="law_firm_ids">@lang('Nombre de Despachos a visitar')</label>
                                        <select class="form-select" name="law_firm_ids[]" id="law_firm_ids" multiple  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach ($law_firms as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $law_firm_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="is_pre_budgeted">@lang('¿Se trata de evento previamente presupuestado?')</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_pre_budgeted" id="is_pre_budgeted1" value="1" @checked($travel->is_pre_budgeted)>
                                                <label class="form-check-label" for="is_pre_budgeted1">
                                                  @lang('Si')
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_pre_budgeted" id="is_pre_budgeted2" value="0" @checked(!$travel->is_pre_budgeted)>
                                                <label class="form-check-label" for="is_pre_budgeted2">
                                                  @lang('No')
                                                </label>
                                            </div>
                                        </div>
                                        <div id="emailHelp" class="form-text">@lang('Requiere autorizacion previa de MPs')</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="authorized_by">@lang('Autorizado por')</label>
                                        <select class="form-select" name="authorized_by" id="authorized_by"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}" @selected($item->id == $travel->authorized_by)>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="purpose">@lang('Objetivo - Estrategia')</label>
                                            <textarea name="purpose" id="purpose" class="form-control" rows="5">{{ $travel->purpose }}</textarea>
                                            {{-- <div id="purpose-editor" class="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 200px;"></div>  --}}
                                            <!-- end Snow-editor-->
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="previous_travel_ids">Viajes previos relacionados con esta visita</label>
                                        <select class="form-select" name="previous_travel_ids[]" id="previous_travel_ids" multiple  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Travel::all() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $previous_travel_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="previous_travels_related">@lang('Viajes previos relacionados con esta visita')</label>
                                        <textarea name="previous_travels_related" id="previous_travels_related" class="form-control" rows="5">{{ $travel->previous_travels_related }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="justification">@lang('Justificación')</label>
                                            <textarea name="justification" id="justification" class="form-control" rows="5">{{ $travel->justification }}</textarea>
                                            {{-- <div id="justification-editor" class="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 200px;"></div>  --}}
                                            <!-- end Snow-editor-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-12 col-md-6 col-xl-6 col-xxl-5">
                <div class="col-travels-later">
                    <h5 class="card-title">@lang('Viaje posterior')</h5>
                    <p class="card-text">@lang('Agregue los despachos con los que se tuvo reuniones')</p>
                    @forelse ($travel->travels_later as $item)
                    <div class="card card-travels-later">
                        <div class="card-body">
                            <form class="travels_later_form" method="POST" action="{{ route('travels.close') }}">
                                <input type="hidden" name="id" value="{{ $travel->id }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="law_firm_id">@lang('Despacho con el que se tuvo reuniones')</label>
                                    <select class="form-select law_firm_travel_later_id" name="law_firm_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                        <option value="{{ $item->law_firm_id }}" selected>{{ $item->law_firm->name }}</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message_transmitted" class="col-form-label">@lang('Mensaje que se transmitió')</label>
                                    <textarea class="form-control" name="message_transmitted">{{ $item->message_transmitted }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="actions" class="col-form-label">@lang('Seguimiento (acciones concretas que se acordaron)')</label>
                                    <textarea class="form-control" name="actions">{{ $item->actions }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="conclutions" class="col-form-label">@lang('Conclusiones (aprendizaje/retoalimentación)')</label>
                                    <textarea class="form-control" name="conclutions">{{ $item->conclutions }}</textarea>
                                </div>
                                <div class="text-center mb-3">
                                    <button type="button" class="btn btn-link link-danger pb-1 btn-remove-travel-later">
                                        <i class="bx bx-trash me-1"></i> @lang('Remover despacho')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="card card-travels-later">
                        <div class="card-body">
                            <form class="travels_later_form" method="POST" action="{{ route('travels.close') }}">
                                <input type="hidden" name="id" value="{{ $travel->id }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="law_firm_id">@lang('Despacho con el que se tuvo reuniones')</label>
                                    <select class="form-select law_firm_travel_later_id" name="law_firm_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;"></select>
                                </div>
                                <div class="mb-3">
                                    <label for="message_transmitted" class="col-form-label">@lang('Mensaje que se transmitió')</label>
                                    <textarea class="form-control" name="message_transmitted">{{ $travel->message_transmitted }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="actions" class="col-form-label">@lang('Seguimiento (acciones concretas que se acordaron)')</label>
                                    <textarea class="form-control" name="actions">{{ $travel->actions }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="conclutions" class="col-form-label">@lang('Conclusiones (aprendizaje/retoalimentación)')</label>
                                    <textarea class="form-control" name="conclutions">{{ $travel->conclutions }}</textarea>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-link link-danger pb-1 btn-remove-travel-later">
                                        <i class="bx bx-trash me-1"></i> @lang('Remover despacho')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="text-center mb-3">
                    <button id="btn-add-lawfirm" type="button" class="btn btn-link">
                        <i class="bx bx-plus me-1"></i> @lang('Agregar despacho')
                    </button>
                </div>
                <div class="card d-none">
                    <div class="card-body">
                        <form id="form-close" method="POST" action="{{ route('travels.close') }}">
                            <input type="hidden" name="id" value="{{ $travel->id }}">
                            @csrf
                            <div class="mb-3">
                                <label for="message_transmitted" class="col-form-label">Mensaje que se transmitió</label>
                                <textarea class="form-control" name="message_transmitted" id="message_transmitted" rows="5">{{ $travel->message_transmitted }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="actions" class="col-form-label">Seguimiento (acciones concretas que se acordaron)</label>
                                <textarea class="form-control" name="actions" id="actions" rows="5">{{ $travel->actions }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="conclutions" class="col-form-label">Conclusiones (aprendizaje/retoalimentación)</label>
                                <textarea class="form-control" name="conclutions" id="conclutions" rows="5">{{ $travel->conclutions }}</textarea>
                            </div>
                        </form>
                        <div class="mb-3">
                            <label class="col-form-label">Personas con quien se tuvo reuniones</label>
                            <table class="table align-middle" id="table-contacts">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        {{-- <th scope="col">Position</th> --}}
                                        <th scope="col">Email</th>
                                        <th scope="col"  nonce="newN0nc3ForS3cur1ty" style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($travel->contacts as $item)
                                    <tr data-id="{{$item->id}}" data-name="{{$item->name}}" data-email="{{$item->email}}">
                                        <td>
                                            <a href="#" class="text-body">{{ $item->name }}</a>
                                        </td>
                                        {{-- <td><span class="badge bg-success-subtle text-success mb-0">Full Stack Developer</span></td> --}}
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete" class="px-2 text-danger btn-remove-contact">
                                                        <i class="bx bx-trash-alt font-size-18"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="no-info">
                                        <td colspan="3">
                                            <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <form action="#" id="form-contacts">
                            <input type="hidden" name="contact_id" >
                            @csrf
                            <div class="row">
                                <div class="container-contact mt-4">
                                    <div class="row row-contact d-none">
                                        <div class="row">
                                            <div class="col mb-3 ">
                                                <label class="form-label">Name</label>
                                                <select class="form-select" name="name" id="contact-name"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    <option selected disabled>Select an option</option>
                                                    @foreach (\App\Models\Contact::all() as $item)
                                                        <option value="{{ $item->id }}" data-email="{{ $item->email }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col mb-3 ">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control" name="position" id="contact-position" readonly>
                                            </div> 
                                            <div class="col mb-3 ">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" id="contact-email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-danger me-1" id="btn-dismiss-contact">
                                                <i class="bx bx-x me-1 align-middle"></i> Close
                                            </button>
                                            <button type="submit" class="btn btn-success"
                                                id="btn-save-contact">
                                                <i class="bx bx-check me-1 align-middle"></i> Add Contact
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button id="btn-agregar-contact" type="button"
                                            class="btn btn-link">Add Contact</button>
                                    </div>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div> <!-- end col -->
            <div style='clear:both'></div>
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        {{-- select2 js --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" integrity="sha384-d3UHjPdzJkZuk5H3qKYMLRyWLAQBJbby2yr2Q58hXXtAGF8RSNO9jpLDlKKPv5v3" crossorigin="anonymous"></script>
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- quill js -->
        <script src="{{ URL::asset('libs/quill/quill.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <!-- datepicker js -->
        <script src="{{ URL::asset('libs/flatpickr/flatpickr.min.js') }}"></script>
        @session('success')
            <script nonce="newN0nc3ForS3cur1ty" >
                $(function(){
                    alertify.success('Se ha guardado correctamente');
                });
            </script>
        @endsession
        <script nonce="newN0nc3ForS3cur1ty" >
            $(function(){
                // *** funcionalidad para duplicar las cards de despachos  ***
                var card_travels_later = $('.card-travels-later').eq(0).clone(true, true);
                card_travels_later.find('.law_firm_travel_later_id').empty();
                card_travels_later.find('textarea').val('');

                $('#btn-add-lawfirm').click(function () {
                    var clonedCard = card_travels_later.clone(true, true);
                    init_law_firm_travel_later(clonedCard.find('.law_firm_travel_later_id'));
                    $('.col-travels-later').append(clonedCard);
                });
                // *** funcionalidad para eliminar las cards de despachos ***
                $('.col-travels-later').on('click', '.btn-remove-travel-later', function () {
                    var card = $(this).closest('.card-travels-later');
                    card.remove();
                });

                $('#btn-agregar-contact').click(function (e) {
                    e.preventDefault();
                    $('.row-contact').removeClass('d-none')
                    $('#btn-agregar-contact').addClass('d-none')
                })
                $('#btn-dismiss-contact').click(function() {
                    $('.row-contact').addClass('d-none')
                    $('#btn-agregar-contact').removeClass('d-none')
                })
                $('#contact-name').select2({
                    theme: 'bootstrap-5'
                })
                $('#contact-name').on('select2:select', function (e) {
                    // Do something
                    // console.log(e);
                    if( e.params.data ) {
                        var data = e.params.data
                        // console.log(data);
                        if($('table#table-contacts > tbody > tr.no-info').length == 1) {
                            $('table#table-contacts > tbody > tr.no-info').remove()
                        }
                        $('#table-contacts tbody').append(`
                        <tr data-id="${data.id}" data-name="${data.text}" data-email="${data.element.dataset.email}">
                            <td>
                                <a href="#" class="text-body">${data.text}</a>
                            </td>
                            <!-- <td><span class="badge bg-success-subtle text-success mb-0">Full Stack Developer</span></td> -->
                            <td>${data.element.dataset.email}</td>
                            <td>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete" class="px-2 text-danger btn-remove-contact"><i
                                                class="bx bx-trash-alt font-size-18"></i></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>`)
                        $('#form-contacts').trigger('reset')
                        $('#contact-name').val('').trigger("change");
                    }
                });
                $('table#table-contacts').on('click', '.btn-remove-contact', function (e) {
                    let tr = $(this).parents('tr')
                    Swal.fire({
                        icon: "question",
                        title: "¿Estás seguro de eliminar?",
                        showCancelButton: true,
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            // console.log(tr);
                            tr.remove()
                            if($('table#table-contacts > tbody  tr').length == 0) {
                                $('table#table-contacts > tbody ').append(`
                                <tr class="no-info">
                                    <td colspan="3">
                                        <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                    </td>
                                </tr>
                                `)
                            }
                        }
                    }); 
                });
                /** 
                 * Start
                 * */
                flatpickr('#start_date');
                flatpickr('#end_date');
                
                $('#practice_area_ids').select2({
                    // tags: true,
                    theme: 'bootstrap-5',
                    placeholder: 'Buscar área de práctica',
                })
                $('#law_firm_ids').select2({
                    theme: 'bootstrap-5',
                })
                function init_law_firm_travel_later(select) {
                    $(select).select2({
                        theme: 'bootstrap-5',
                        ajax: {
                            url: "{{ route('law.firms.list') }}",
                            dataType: 'json',
                            processResults: function (data) {
                                // Transforms the top-level key of the response object from 'items' to 'results'
                                return {
                                    results: data
                                };
                            }
                        },
                        placeholder: 'Buscar despacho',
                    })
                }
                init_law_firm_travel_later($('.law_firm_travel_later_id'))
                
                $('#client_ids').select2({
                    tags: true,
                    theme: 'bootstrap-5'
                })
                $('#travel_type_ids').select2({
                    theme: 'bootstrap-5',
                    tags: true,
                })
                $('#partner_ids').select2({
                    theme: 'bootstrap-5'
                })
                $('#authorized_by').select2({
                    theme: 'bootstrap-5'
                })
                $('#previous_travel_ids').select2({
                    // tags: true,
                    theme: 'bootstrap-5'
                })
                $('#btn-save').click(function (e) {
                    e.preventDefault();
                    // var formData = new FormData($('#form-store')[0]);
                    // // console.log(formData);
                    // return;
                    $('#form-store').submit()
                })
                function travels_later() {
                    var travels_later = []
                    $('.travels_later_form').each(function (index) {
                        let id = $(this).find('input[name="id"]').val()
                        let law_firm_id = $(this).find('select[name="law_firm_id"]').val()
                        let message_transmitted = $(this).find('textarea[name="message_transmitted"]').val()
                        let actions = $(this).find('textarea[name="actions"]').val()
                        let conclutions = $(this).find('textarea[name="conclutions"]').val()
                        travels_later.push ({
                            id: id,
                            law_firm_id: law_firm_id,
                            message_transmitted: message_transmitted,
                            actions: actions,
                            conclutions: conclutions
                        })
                    })
                    return travels_later
                }
                $('#form-store').submit(function (e) {
                    e.preventDefault();
                    // var formData = new FormData($(this)[0]);
                    dismiss_alert();
                    $('.is-invalid').removeClass('is-invalid')
                    var data = {
                        id: "{{ $travel->id }}",
                        _token: "{{ csrf_token() }}",
                        name: $('#name').val(),
                        place: $('#place').val(),
                        start_date: $('#start_date').val(),
                        end_date: $('#end_date').val(),
                        practice_area_ids: $('#practice_area_ids').val(),
                        partner_ids: $('#partner_ids').val(),
                        travel_type_ids: $('#travel_type_ids').val(),
                        client_ids: $('#client_ids').val(),
                        law_firm_ids: $('#law_firm_ids').val(),
                        is_pre_budgeted: $('input[name="is_pre_budgeted"]:checked').val(),
                        authorized_by: $('#authorized_by').val(),
                        previous_travels_related: $('#previous_travels_related').val(),
                        purpose: $('#purpose').val(),
                        justification: $('#justification').val(),
                        travels_later: travels_later(),
                    }
                    // console.log(data);
                    // formData.append('message_transmitted', $('#message_transmitted').val())
                    // formData.append('actions', $('#actions').val())
                    // formData.append('conclutions', $('#conclutions').val())
                    // var contacts = []
                    // $('#table-contacts tbody tr').each(function (index) {
                    //     let id = $(this).data('id')
                    //     // let tel = $(this).data('tel')
                    //     if (id) {
                    //         let name = $(this).data('name')
                    //         // let position = $(this).data('position')
                    //         let email = $(this).data('email')
                    //         contacts.push({
                    //             id : id,
                    //             name : name,
                    //             // position : position,
                    //             email : email,
                    //             // tel : tel,
                    //         })
                    //     }
                    // })
                    // formData.append('contacts', JSON.stringify(contacts));
                    
                    sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos procesando la información',
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'post',
                        dataType: 'json',
                        data: data,
                        success: function(data) {
                            // console.log(data);
                            sal.close();
                            // toastr.success('Se ha guardado correctamente')
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function(jqXHR, status, error) {
                            sal.close();
                            // console.log(jqXHR.responseJSON);
                            
                            if (jqXHR.status === 422) {
                                var list = '<ul  nonce="newN0nc3ForS3cur1ty" style="columns: 2;">'
                                $.each(jqXHR.responseJSON.errors, function(i, error) {
                                    list += `<li>${error}</li>`
                                    if (i.includes('travels_later')) {
                                        // console.log(i);
                                        var parts = i.split('.');
                                        var index = parts[1];
                                        var field = parts[2];
                                        var el = $('.travels_later_form').eq(index).find('[name="' + field + '"]');
                                        el.addClass('is-invalid');
                                    } else {
                                        var el = $('[name="' + i + '"], [name="' + i + '[]"]');
                                        // if (!el)
                                            // el = $('[name="' + i + '[]"]')
                                            // // console.log(el);
                                        if(el.attr('type') == 'checkbox' || el.attr('type') == 'radio'){
                                            el.addClass('is-invalid');
                                            // el.parents('#' + i).append(`<div class="invalid-feedback d-block">${error}</div>`)
                                        }
                                        if(el.attr('type') == 'select'){
                                            // // console.log(el);
                                            el.addClass('is-invalid');
                                            // el.parents('#' + i).append(`<div class="invalid-feedback d-block">${error}</div>`)
                                        // } else if (i == 'summary') {
                                            // var el = $('[id="' + i + '"]');
                                            // el.addClass('is-invalid');
                                        // } 
                                        // else if (i == 'client_id' || i == 'practice_area_ids' || i == 'branches') {
                                        //     // var el = $('[id="' + i + '"]');
                                        //     // el.addClass('is-invalid');
                                        } else {
                                            el.addClass('is-invalid');
                                            // el.parent().after(`<div class="invalid-feedback d-block">${error}</div>`)
                                        }
                                        // var el = $('[id="' + i + '"]');
                                        // el.addClass('is-invalid');
                                        // // console.log(el.parent());
                                        // el.parent().after(`<div class="invalid-feedback">${error}</div>`)
                                    }
                                });
                                list += '</ul>'
                                list = '<strong>Campos incompletos</strong> <br> Algunos campos no están presentes, por favor revisa y completalos correctamente'
                                alert(list, 'danger')
                                
                            } else {
                                var json_response = JSON.parse(jqXHR.responseText)
                                if (json_response && json_response.message) 
                                    alert(json_response.message, 'danger')
                                else 
                                    alert('Lo sentimos, ha ocurrido un error.', 'danger')
                            }
                        }
                    });
                })
                $('#btn-generar-reporte').click(function () {
                    $('#form-close').submit()
                })
                $('#form-close').submit(function (e) {
                    // console.log('generar ');
                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos procesando la información',
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        dataType: 'json',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // console.log(data);
                            sal.close();
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                            $('#btn-close-modal-report-after').click()
                        },
                        error: function(request, error) {
                            console.error(request);
                            console.error(error);
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                })
                $('#btn-generate-report').click(function (e) {
                    e.preventDefault();
                    sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos procesando la información',
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    $.ajax({
                        url: "{{ route('travels.close') }}",
                        type: 'post',
                        dataType: 'json',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: "{{ $travel->id }}",
                        },
                        success: function(data) {
                            // console.log(data);
                            sal.close();
                            $('#buttons').prepend(`
                             <a href="{{ url('travels/download/previous/report/${data.id}') }}" target="_blank" id="btn-after-report" class="btn btn-success">
                                <i class="bx bx-cloud-download me-1"></i> Descargar Reporte Posterior
                            </a>`)
                            $('#btn-generate-report').remove()
                            document.getElementById('btn-after-report').click()
                            alertify.success('Se ha generado correctamente');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function(request, error) {
                            console.error(request);
                            console.error(error);
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                })
                function alert(message, type) {
                    var wrapper = document.createElement('div')
                    var al = 
                    `<div class="alert alert-${type} alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                        <i class="mdi mdi-block-helper label-icon"></i>
                        <p class="m-2">${message}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    wrapper.innerHTML = al
                    $('.liveAlertPlaceholder').append(wrapper)
                }
                function dismiss_alert(){
                    $('.liveAlertPlaceholder').empty()
                }

                /** 
                 * End
                 * */
            });
        </script>
    @endsection
