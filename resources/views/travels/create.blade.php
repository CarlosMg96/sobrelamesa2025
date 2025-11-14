@extends('layouts.master')
@section('title')
    @lang('Formato de Aviso Previo')
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
@lang('Formato de Aviso Previo')
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

    <body data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">@lang('Formato de Aviso Previo')
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('travels') }}">@lang('Lista tus viajes realizados')</a></li>
                            <li class="breadcrumb-item active">@lang('Nuevo Viaje')</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <button type="button" id="btn-save" class="btn btn-warning">
                            <i class="bx bx-save me-1"></i> Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('travels.store') }}" id="form-store" method="POST">
                            <input type="hidden" name="id" value="0">
                            <div class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nombre del viaje</label>
                                        <input type="text" class="form-control" placeholder="Nombre del viaje" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="place">Lugar </label>
                                        <input type="text" class="form-control" placeholder="Lugar" id="place" name="place">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="start_date">Fecha Inicio</label>
                                        <input type="text" class="form-control" placeholder="Fecha Inicio" id="start_date" name="start_date">
                                        {{-- <input type="text" class="form-control" id="date"> --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="end_date">Fecha Fin</label>
                                        <input type="text" class="form-control" placeholder="Fecha Fin" id="end_date" name="end_date">
                                        {{-- <input type="text" class="form-control" id="date"> --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="practice_area_ids">@lang('Áreas de práctica involucradas')</label>
                                        <select class="form-select" name="practice_area_ids[]"
                                            id="practice_area_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\PracticeArea::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="partner_ids">Asistentes</label>
                                        <select class="form-select" name="partner_ids[]" id="partner_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel_type_ids">Tipo de Evento</label>
                                        <select class="form-select" name="travel_type_ids[]" id="travel_type_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\TravelType::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="client_ids">Nombre de Clientes a visitar</label>
                                        <select class="form-select" name="client_ids[]" id="client_ids" multiple  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Client::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="law_firm_ids">Nombre de Despachos a visitar</label>
                                        <select class="form-select" name="law_firm_ids[]" id="law_firm_ids" multiple  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            {{-- <option disabled selected>Select a option</option> --}}
                                            @foreach (\App\Models\LawFirm::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="is_pre_budgeted">¿Se trata de evento previamente presupuestado?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_pre_budgeted" id="is_pre_budgeted1" value="1">
                                                <label class="form-check-label" for="is_pre_budgeted1">
                                                  Si
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_pre_budgeted" id="is_pre_budgeted2" value="0">
                                                <label class="form-check-label" for="is_pre_budgeted2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                        <div id="emailHelp" class="form-text">Requiere autorizacion previa de MPs</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="authorized_by">Autorizado por</label>
                                        <select class="form-select" name="authorized_by" id="authorized_by"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="purpose">Objetivo - Estrategia</label>
                                            <textarea name="purpose" id="purpose" class="form-control" rows="5"></textarea>
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
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="previous_travels_related">Viajes previos relacionados con esta visita</label>
                                        <textarea name="previous_travels_related" id="previous_travels_related" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="justification">Justificación</label>
                                            <textarea name="justification" id="justification" class="form-control" rows="5"></textarea>
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
                /** 
                 * Start
                 * */
                flatpickr('#start_date');
                flatpickr('#end_date');
                // var justification_editor = new Quill('#justification-editor', {
                //     theme: 'snow',
                //     // modules: {
                //     //     'toolbar': [['bold', 'italic', 'underline', 'strike'], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['clean']]
                //     // },
                // });
                // var purpose_editor = new Quill('#purpose-editor', {
                //     theme: 'snow',
                //     // modules: {
                //     //     'toolbar': [['bold', 'italic', 'underline', 'strike'], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['clean']]
                //     // },
                // });
                $('#practice_area_ids').select2({
                    tags: true,
                    theme: 'bootstrap-5'
                })
                $('#law_firm_ids').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                })
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
                    $('#form-store').submit()
                })
                $('#form-store').submit(function (e) {
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
                    // $('#justification').val(justification_editor.root.innerHTML)
                    // // console.log(justification_editor.root.innerHTML);
                    // $('#purpose').val(purpose_editor.root.innerHTML)
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
                            // toastr.success('Se ha guardado correctamente')
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.href = '/travels/edit/' + data.id;
                            }, 1000);
                        },
                        error: function(request, error) {
                            console.error(request);
                            console.error(error);
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                })
                /** 
                 * End
                 * */
            });
        </script>
    @endsection
