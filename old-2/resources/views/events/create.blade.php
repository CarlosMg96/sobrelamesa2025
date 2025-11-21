@extends('layouts.master')
@section('title')
    Nueva Junta 
@endsection
@section('breadcrumb')
    {{-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('events') }}">Juntas IBA</a></li>
            <li class="breadcrumb-item active">Editar Junta</li>
        </ol>
    </div> --}}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/monokai-sublime.min.css">
    <link href="{{ URL::asset('libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <!-- dropzone css -->
    <link href="{{ URL::asset('libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Nueva Junta 
@endsection
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Nueva Junta 
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('events') }}">Juntas IBA</a></li>
                            <li class="breadcrumb-item active">Nueva Junta</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-1">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <button id="btn-save" class="btn btn-warning">
                            <i class="bx bx-save me-1"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <form action="{{ route('events.store') }}" id="form-store" method="POST">
                                    <input type="hidden" name="id" >
                                    <div class="row">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="law_firm_id">Despacho</label>
                                                <select class="form-select" id="law_firm_id" name="law_firm_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    <option disabled selected>Select a option</option>
                                                    @foreach (\App\Models\LawFirm::all() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="lawfirm">Despacho</label>
                                                <input type="text" class="form-control" placeholder="Despacho" id="lawfirm" name="lawfirm" >
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="country">Jurisdicción</label>
                                                <input type="text" class="form-control" placeholder="Jurisdicción"
                                                    id="country" name="country">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="country_id">Jurisdicción</label>
                                                <select class="form-select" id="country_id" name="country_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    <option disabled selected>Select a option</option>
                                                    @foreach (\App\Models\Country::all() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="room">Lugar</label>
                                                <select class="form-select" id="room" name="room"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    <option disabled selected>Select a room</option>
                                                    @foreach ($rooms as $item)
                                                        <option value="{{ $item->room }}">{{ $item->room }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" class="form-control" placeholder="Lugar"
                                                    id="room" name="room"> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="date">Fecha</label>
                                                <input type="text" class="form-control" placeholder="Fecha" id="date" name="date">
                                                {{-- <input type="text" class="form-control" id="date"> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="format">Formato</label>
                                                <input type="text" class="form-control" placeholder="Formato"
                                                    id="format" name="format">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="practice_area">Área de Interés</label>
                                                <select name="practice_area[]" id="practice_area" multiple>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <input type="text" class="form-control" placeholder="Área de Interés" value="{{ $event->practice_area }}" id="practice_area" name="practice_area">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="practice_area_ids">Área de Interés</label>
                                                <select class="form-select" name="practice_area_ids[]"
                                                    id="practice_area_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    @foreach (\App\Models\PracticeArea::all() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Notas</label>
                                            <textarea name="notes" id="notes"  nonce="newN0nc3ForS3cur1ty" style="display: none"></textarea>
                                            <div id="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 300px;"></div> <!-- end Snow-editor-->
                                        </div>
                                    </div>
                                    {{-- <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <button type="button" id="btn-delete" class="btn btn-danger me-1"><i
                                                    class="bx bx-x me-1 align-middle"></i> Eliminar</button>
                                            <button type="submit" class="btn btn-success"><i
                                                    class="bx bx-check me-1 align-middle"></i> Save</button>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-4">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <h5 class="font-size-16 mb-0">Archivos Adjuntos</h5>
                                <div class="mt-4">
                                    <form class="dropzone" id="form-upload" action="{{ route('events.upload-file') }}" method="post">
                                        <input type="hidden" name="event_id">
                                        @csrf
                                        <div class="dz-message">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                            </div>
        
                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                </div>

                <div style='clear:both'></div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <h5 class="font-size-16 mb-0">Asistentes Visitante</h5>
                                <table class="table align-middle table-nowrap table-hover mb-0 mt-4" id="table-delegates">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Área</th>
                                            <th scope="col">Email</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="no-info">
                                            <td colspan="4">
                                                <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="{{ route('events.add-delegate') }}" id="form-delegates">
                                    <input type="hidden" name="event_id" >
                                    @csrf
                                    <div class="row">
                                        <div class="container-delegados mt-4">
                                            <div class="row row-delegados d-none">
                                                <div class="col col-md-4 mb-3 ">
                                                    <label class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="col col-md-4 mb-3 ">
                                                    <label class="form-label">Área</label>
                                                    <input type="text" class="form-control" name="area">
                                                </div>
                                                <div class="col col-md-4 mb-3 ">
                                                    <label class="form-label">Correo</label>
                                                    <input type="text" class="form-control" name="email">
                                                </div>
                                                <div class="col-12 text-end">
                                                    <button type="button" class="btn btn-danger me-1" id="btn-dismiss-delegate">
                                                        <i class="bx bx-x me-1 align-middle"></i> Cerrar
                                                    </button>
                                                    <button type="submit" class="btn btn-success"
                                                        id="btn-save-delegate">
                                                        <i class="bx bx-check me-1 align-middle"></i> Aceptar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button id="btn-agregar-delegados" type="button"
                                                    class="btn btn-link">Agregar Visitante</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <h5 class="font-size-16 mb-0">Asistentes Galicia</h5>
                                <table class="table align-middle table-nowrap table-hover mb-0 mt-4" id="table-asistentes">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Área</th>
                                            <th scope="col">Email</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="no-info">
                                            <td colspan="4">
                                                <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="{{ route('events.store') }}" id="form-assistant">
                                    <input type="hidden" name="event_id" >
                                    <input type="hidden" name="assistant_id" value="">
                                    <input type="hidden" name="name">
                                    @csrf
                                    <div class="row">
                                        <div class="container-asistente mt-4">
                                            <div class="row row-asistente d-none">
                                                <div class="col col-md-4 mb-3 ">
                                                    <label class="form-label">Nombre Asistente</label>
                                                    {{-- <input type="text" class="form-control" name="name"> --}}
                                                    <select class="form-select" id="assistant-name" name="name"
                                                         nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                        <option disabled selected>Select an option</option>
                                                        @foreach (\App\Models\Assistant::all() as $item)
                                                            <option data-email="{{ $item->email }}" data-area="{{ $item->area }}" value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col col-md-4 mb-3 ">
                                                    <label class="form-label">Area Asistente</label>
                                                    <input type="text" class="form-control" name="area">
                                                </div>
                                                <div class="col col-md-4 mb-3 ">
                                                    <label class="form-label">Correo Asistente</label>
                                                    <input type="text" class="form-control" name="email">
                                                </div>
                                                <div class="col-12 text-end">
                                                    <button type="button" class="btn btn-danger me-1"
                                                        id="btn-dismiss-assistant">
                                                        <i class="bx bx-x me-1 align-middle"></i> Cerrar
                                                    </button>
                                                    <button type="submit" class="btn btn-success"
                                                        id="btn-save-assistant">
                                                        <i class="bx bx-check me-1 align-middle"></i> Aceptar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button id="btn-agregar-asistente" type="button"
                                                    class="btn btn-link">Agregar Visitante</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div style='clear:both'></div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        {{-- select2 js --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" integrity="sha384-d3UHjPdzJkZuk5H3qKYMLRyWLAQBJbby2yr2Q58hXXtAGF8RSNO9jpLDlKKPv5v3" crossorigin="anonymous"></script>
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- quill js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js" integrity="sha384-4l+9bhb7rakZ18megzl0/DWczL8ojbDl1jIEzBVffeMho9A6xB/lkqt1K0PC8Jin" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('libs/quill/quill.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <!-- dropzone plugin -->
        <script src="{{ URL::asset('libs/dropzone/dropzone-min.js') }}"></script>

        {{-- <script src="https://unpkg.com/quill-html-edit-button@2.2.7/dist/quill.htmlEditButton.min.js" integrity="sha384-lxoVxGi+vBrS2o6BPuqlqC9P33l5By4EcQ2XUrYJvfRX9BXv8OWMDY/k1LL+IvmV" crossorigin="anonymous"></script> --}}
    
        @session('success')
            <script nonce="newN0nc3ForS3cur1ty" >
                $(function() {
                    alertify.success('Se ha guardado correctamente');
                });
            </script>
        @endsession
        <script nonce="newN0nc3ForS3cur1ty" >
            $(function() {
                // Quill.register("modules/htmlEditButton", htmlEditButton);

                var quill = new Quill('#snow-editor', {
                    theme: 'snow',
                    modules: {
                        syntax: true,
                        'toolbar': [
                            ['bold', 'italic', 'underline', 'strike'],
                            [{
                                'header': [false, 1, 2, 3, 4, 5, 6]
                            }, 'blockquote', 'code-block'],
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }, {
                                'indent': '-1'
                            }, {
                                'indent': '+1'
                            }],
                            ['direction', {
                                'align': []
                            }],
                            ['clean']
                        ]
                    },
                });
                flatpickr('#date');
                $('#btn-agregar-delegados').click(function() {
                    $('.row-delegados').removeClass('d-none')
                    $('#btn-agregar-delegados').addClass('d-none')
                })
                $('#btn-dismiss-delegate').click(function() {
                    $('.row-delegados').addClass('d-none')
                    $('#btn-agregar-delegados').removeClass('d-none')
                })
                $('#btn-agregar-asistente').click(function() {
                    $('.row-asistente').removeClass('d-none')
                    $('#btn-agregar-asistente').addClass('d-none')
                })
                $('#btn-dismiss-assistant').click(function() {
                    $('.row-asistente').addClass('d-none')
                    $('#btn-agregar-asistente').removeClass('d-none')
                })
                /** 
                 * Nuevos metodos utiles
                 * */
                $('#practice_area_ids').select2({
                    tags: true,
                    theme: 'bootstrap-5'
                })
                $('#law_firm_id').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                })
                $('#country_id').select2({
                    theme: 'bootstrap-5'
                })
                $('#room').select2({
                    theme: 'bootstrap-5'
                })
                $('#assistant-name').select2({
                    // tags:true,
                    // placeholder: 'Select an option',
                    theme: 'bootstrap-5',
                })
                $('#assistant-name').on('select2:select', function (e) {
                    var data = e.params.data;
                    // console.log(data);
                    $('#form-assistant input[name=assistant_id]').val(null)
                    if(data.element && data.element.dataset) {
                        $('#form-assistant input[name=assistant_id]').val(data.id)
                        $('#form-assistant input[name=name]').val(data.text)
                        $('#form-assistant input[name=email]').prop('disabled', true)
                        $('#form-assistant input[name=area]').prop('disabled', true)
                        $('#form-assistant input[name=email]').val(data.element.dataset.email)
                        $('#form-assistant input[name=area]').val(data.element.dataset.area)
                    } else {
                        $('#form-assistant input[name=email]').prop('disabled', false)
                        $('#form-assistant input[name=area]').prop('disabled', false)
                        $('#form-assistant input[name=email]').val(null)
                        $('#form-assistant input[name=area]').val(null)
                    }
                })
                 $('#form-assistant').submit(function(e) {
                    e.preventDefault();
                    let assistant_id = $('#form-assistant input[name=assistant_id]').val()
                    let name = $('#form-assistant input[name=name]').val()
                    let email = $('#form-assistant input[name=email]').val()
                    let area = $('#form-assistant input[name=area]').val()
                    if($('table#table-asistentes > tbody > tr.no-info').length == 1) {
                        $('table#table-asistentes > tbody > tr.no-info').remove()
                    }
                    $('table#table-asistentes > tbody').append(
                        `<tr class="trassistant" data-id="${assistant_id}" id="assistant_${assistant_id}">
                            <td>${name}</td>
                            <td>${area}</td>
                            <td>${email}</td>
                            <td>
                                <a href="javascript:void(0);" class="btn-delete-assistant" data-id="${assistant_id}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger">
                                    <i class="bx bx-trash-alt font-size-18 text-danger"></i>
                                </a>
                            </td>
                        </tr>`
                    )
                    $('#form-assistant').trigger('reset')
                })

                $('#form-delegates').submit(function(e) {
                    e.preventDefault();
                    let name = $('#form-delegates input[name=name]').val()
                    let email = $('#form-delegates input[name=email]').val()
                    let area = $('#form-delegates input[name=area]').val()
                    if($('table#table-delegates > tbody > tr.no-info').length == 1) {
                        $('table#table-delegates > tbody > tr.no-info').remove()
                    }
                    $('table#table-delegates > tbody').append(
                        `<tr class="trdelegates">
                            <td>${name}</td>
                            <td>${area}</td>
                            <td>${email}</td>
                            <td>
                                <a href="javascript:void(0);" class="btn-delete-delegate" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger">
                                    <i class="bx bx-trash-alt font-size-18 text-danger"></i>
                                </a>
                            </td>
                        </tr>`
                    )
                    $('#form-delegates').trigger('reset')
                    $('#assistant-name').val('').trigger("change");
                })

                $('table#table-asistentes').on('click', '.btn-delete-assistant', function(e) {
                    e.preventDefault();
                    let assistant_id = $(this).data('id')
                    let event_id = $('input[name=id]').val()
                    // console.log(assistant_id);

                    Swal.fire({
                        icon: "question",
                        title: "¿Estás seguro de eliminar?",
                        showCancelButton: true,
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $(`#table-asistentes tr#assistant_${assistant_id}`).remove()
                            if($('table#table-asistentes > tbody > tr').length == 0) {
                                $('table#table-asistentes > tbody ').append(`
                                <tr class="no-info">
                                    <td colspan="4">
                                        <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                    </td>
                                </tr>
                                `)
                            }
                        }
                    });
                })
                $('table#table-delegates').on('click', '.btn-delete-delegate', function(e) {
                    e.preventDefault();
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
                            if($('table#table-delegates > tbody > tr').length == 0) {
                                $('table#table-delegates > tbody ').append(`
                                <tr class="no-info">
                                    <td colspan="4">
                                        <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                    </td>
                                </tr>
                                `)
                            }
                        }
                    });
                })
                var sal = null;
                $('#btn-save').click(function (e) {
                    sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos procesando la información',
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    $('#notes').val(quill.container.innerHTML)
                    var formData = new FormData(document.getElementById('form-store'));
                    var assistants = []
                    $('table .trassistant').each(function (key, value) {
                        assistants.push({ id: $(this).data('id') })
                    })
                    formData.append('assistants', JSON.stringify(assistants))
                    
                    $.ajax({
                        url: "{{ route('events.store') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            $('#form-upload input[name=event_id]').val(data.id)
                            // // console.log(data);
                            sal.close()
                            alertify.success('Se ha guardado correctamente');
                            upload_file()
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            sal.close()
                            alert("Request: " + JSON.stringify(request));
                        },
                        complete: function () {
                        },
                    });
                })
                function upload_file() {
                    sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos subiendo los archivos',
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    myDropzone.processQueue()
                }
                let myDropzone = new Dropzone("#form-upload", 
                    { 
                        url: "{{ route('events.upload-file') }}",
                        method: "POST",
                        paramName: 'adjunto',
                        autoProcessQueue: false,
                        uploadMultiple: true,
                        addRemoveLinks: true,
                        parallelUploads: 5,
                        maxFiles: 5,
                    }
                );
                myDropzone.on("completemultiple", function(file, response, x) {
                    // console.log('completemultiple');
                    let url = '{{ route("events.edit", ":id") }}'.replace(':id', $('#form-upload input[name=event_id]').val());
                    location.href = url
                    // console.log(file);
                    // console.log(response);
                    // console.log(x);
                });
                myDropzone.on("sending", function(file, xhr, formData) {
                    // Will send the filesize along with the file as POST data.
                    formData.append("event_id", $('#form-upload input[name=event_id]').val());
                });
                myDropzone.on("complete", function(file) {
                    // // console.log(file);
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        // console.log('complete all files');  
                    }
                });
                myDropzone.on("success", function(file, response, x) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        // console.log('success all files');
                        sal.close();
                        alertify.success('Se ha subido correctamente');
                    }
                });
                
                myDropzone.on("successmultiple", function(file, response, x) {
                    // console.log('successmultiple');
                    // console.log(file);
                    // console.log(response);
                    // console.log(x);
                });
                myDropzone.on("error", function(file, response, x) {
                    // console.log('error');
                    // console.log(file);
                    // console.log(response);
                    // console.log(x);
                    // console.log('error');
                    // console.log('end error');
                });
                myDropzone.on("errormultiple", function(file, response, x) {
                    // console.log('errormultiple');
                    // console.log(file);
                    // console.log(response);
                    // console.log(x);
                });
            });
        </script>
    @endsection
