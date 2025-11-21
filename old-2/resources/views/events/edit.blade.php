@extends('layouts.master')
@section('title')
    Editar Junta
@endsection
{{-- @section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('events') }}">Juntas IBA</a></li>
            <li class="breadcrumb-item active">Editar Junta</li>
        </ol>
    </div>
@endsection --}}
@section('css')
    {{-- select2 Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" integrity="sha384-OXVF05DQEe311p6ohU11NwlnX08FzMCsyoXzGOaL+83dKAb3qS17yZJxESl8YrJQ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- quill css -->
    <link href="{{ URL::asset('libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <!-- dropzone css -->
    <link href="{{ URL::asset('libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
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
        .tox-promotion {
            display: none;
        }
    </style>
@endsection
@section('page-title')
    Editar Junta
@endsection
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Editar Junta 
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('events') }}">Juntas IBA</a></li>
                            <li class="breadcrumb-item active">Editar Junta</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-1">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <button type="button" id="btn-delete" class="btn btn-danger me-1">
                            <i class="bx bx-trash align-middle"></i> 
                        </button>
                        <button id="btn-save" class="btn btn-warning">
                            <i class="bx bx-save me-1 align-middle"></i> Save
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
                                <form action="{{ route('events.update') }}" id="form-update" method="POST">
                                    <input type="hidden" name="id" value="{{ $event->id }}">
                                    <div class="row">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="law_firm_id">Despacho</label>
                                                <select class="form-select" id="law_firm_id" name="law_firm_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    <option disabled selected>Select a option</option>
                                                    @foreach (\App\Models\LawFirm::all() as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == $event->law_firm_id )>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="country_id">Jurisdicción</label>
                                                <select class="form-select" id="country_id" name="country_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    <option disabled selected>Select a option</option>
                                                    @foreach (\App\Models\Country::all() as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == $event->country_id )>{{ $item->name }}</option>
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
                                                        <option value="{{ $item->room }}" @selected($item->room  == $event->room)>{{ $item->room }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="date">Fecha</label>
                                                <input type="date" class="form-control" placeholder="Fecha"
                                                    value="{{ $event->date }}" id="date" name="date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="format">Formato</label>
                                                <input type="text" class="form-control" placeholder="Formato"
                                                    value="{{ $event->format }}" id="format" name="format">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="practice_area_ids">Área de Interés</label>
                                                <select class="form-select" name="practice_area_ids[]"
                                                    id="practice_area_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    @foreach (\App\Models\PracticeArea::all() as $item)
                                                        <option value="{{ $item->id }}" @selected(in_array($item->id, $practice_area_ids))>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Notas</label>
                                            <textarea name="notes" id="notes"  nonce="newN0nc3ForS3cur1ty" style="display: none">{!! $event->notes !!}</textarea>
                                            <div id="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 300px;"></div> <!-- end Snow-editor-->
                                        </div>
                                    </div>
                                    {{-- <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <button type="button" id="btn-delete" class="btn btn-danger me-1"><i
                                                    class="bx bx-x me-1 align-middle"></i> Eliminar</button>
                                            <button type="submit" class="btn btn-success"><i
                                                    class="bx bx-check me-1 align-middle"></i> Guardar</button>
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
                                    <table class="table align-middle table-nowrap table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                {{-- <th scope="col">Size</th> --}}
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($files as $file)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('events.download', ['id' => $event->id, 'file' => $file]) }}"
                                                            target="_blank"
                                                            class="text-truncate text-body fw-medium d-inline-block"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ $file }}"  nonce="newN0nc3ForS3cur1ty" style="width:250px;">
                                                            <i
                                                                class="mdi mdi-file-document font-size-20 align-middle text-primary me-2"></i>
                                                            {{ $file }}
                                                        </a>
                                                    </td>
                                                    {{-- <td>09 KB</td> --}}
                                                    <td>
                                                        <a href="javascript:void(0);" class="btn-delete-file"
                                                            data-event="{{ $event->id }}"
                                                            data-file="{{ $file }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete"
                                                            class="px-2 text-danger"><i
                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="text-center">
                                                            <p class="text-muted font-size-14 mb-0">No hay archivos</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    <form class="dropzone" id="form-upload" action="{{ route('events.upload-file') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <div class="dz-message">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                            </div>
        
                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </form>
                                </div>
                                {{-- <div class="mt-4">
                                    <form id="form-adjunto" action="{{ route('events.upload-file') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <div class="mb-3">
                                            <label class="form-label">Archivo Adjunto</label>
                                            <input class="form-control" type="file" name="adjunto">
                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">Subir</button>
                                    </form>
                                </div> --}}
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
                                <table class="table align-middle table-nowrap table-hover mb-0 mt-4">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Área</th>
                                            <th scope="col" colspan="2">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($event->delegates as $delegate)
                                            <tr>
                                                <td>
                                                    {{-- <a href="javascript: void(0);" class="text-body fw-medium"> --}}
                                                    {{-- <i class="mdi mdi-file-document font-size-20 align-middle text-primary me-2"></i> --}}
                                                    {{ $delegate->name }}
                                                    {{-- </a> --}}
                                                </td>
                                                <td>{{ $delegate->area }}</td>
                                                <td>{{ $delegate->email }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn-delete-delegate"
                                                        data-id="{{ $delegate->id }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        class="px-2 text-danger"><i
                                                            class="bx bx-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">
                                                    <p class="text-secondary text-center mt-0 mb-0">No hay información para
                                                        mostrar</p>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <form action="{{ route('events.add-delegate') }}" id="form-delegates">
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
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
                                                    <button type="button" class="btn btn-danger me-1"
                                                        id="btn-dismiss-delegate">
                                                        <i class="bx bx-x me-1 align-middle"></i> Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-success"
                                                        id="btn-save-delegate">
                                                        <i class="bx bx-check me-1 align-middle"></i> Guardar
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
                                <table class="table align-middle table-nowrap table-hover mb-0 mt-4">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Área</th>
                                            <th scope="col">Email</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($event->assistants as $assistant)
                                            <tr>
                                                <td>
                                                    {{-- <a href="javascript: void(0);" class="text-body fw-medium"> --}}
                                                    {{-- <i class="mdi mdi-file-document font-size-20 align-middle text-primary me-2"></i> --}}
                                                    {{ $assistant->name }}
                                                    {{-- </a> --}}
                                                </td>
                                                <td>{{ $assistant->area }}</td>
                                                <td>{{ $assistant->email }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn-delete-assistant"
                                                        data-id="{{ $assistant->id }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        class="px-2 text-danger"><i
                                                            class="bx bx-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">
                                                    <p class="text-secondary text-center mt-0 mb-0">No hay información para
                                                        mostrar</p>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <form action="{{ route('events.store') }}" id="form-assistant">
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="assistant_id" value="">
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
                                                        <i class="bx bx-x me-1 align-middle"></i> Cancelar
                                                    </button>
                                                    <button type="submit" class="btn btn-success"
                                                        id="btn-save-assistant">
                                                        <i class="bx bx-check me-1 align-middle"></i> Guardar
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
        <script src="{{ URL::asset('libs/quill/quill.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <!-- dropzone plugin -->
        <script src="{{ URL::asset('libs/dropzone/dropzone-min.js') }}"></script>
        @session('success')
            <script nonce="newN0nc3ForS3cur1ty" >
                $(function() {
                    alertify.success('Se ha guardado correctamente');
                });
            </script>
        @endsession
        <script nonce="newN0nc3ForS3cur1ty" >
            document.addEventListener('DOMContentLoaded', () => {
            
        });
            $(function() {
                if (document.getElementById('snow-editor')) {
                    const editor = new Quill('#snow-editor', {
                        theme: 'snow',
                        modules: {
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
                    const quillEditor = document.getElementById('notes');
                    
                    // Set default value if it's not empty
                    const defaultValue = quillEditor.value.trim(); 
                    if (defaultValue) {
                        editor.clipboard.dangerouslyPasteHTML(defaultValue); 
                    }
                    
                    // Sync Quill with the hidden input
                    editor.on('text-change', function() {
                        quillEditor.value = editor.root.innerHTML;
                        // console.log(quillEditor.value);
                    });

                    quillEditor.addEventListener('input', function() {
                        editor.root.innerHTML = quillEditor.value;
                    });
                }
                // var quill = new Quill('#snow-editor', {
                //     theme: 'snow',
                //     modules: {
                //         'toolbar': [
                //             ['bold', 'italic', 'underline', 'strike'],
                //             [{
                //                 'header': [false, 1, 2, 3, 4, 5, 6]
                //             }, 'blockquote', 'code-block'],
                //             [{
                //                 'list': 'ordered'
                //             }, {
                //                 'list': 'bullet'
                //             }, {
                //                 'indent': '-1'
                //             }, {
                //                 'indent': '+1'
                //             }],
                //             ['direction', {
                //                 'align': []
                //             }],
                //             ['clean']
                //         ]
                //     },
                // });
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
                 * select2
                 **/
                 $('#law_firm_id').select2({
                    theme: 'bootstrap-5',
                    tags: true,
                })
                $('#country_id').select2({
                    theme: 'bootstrap-5'
                })
                $('#room').select2({
                    theme: 'bootstrap-5'
                })
                /**
                 * end select2
                 * */
                $('#form-delegates').submit(function(e) {
                    e.preventDefault();
                    var formData = $('#form-delegates').serialize();
                    let sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos procesando la información',
                        // timer: 2000,
                        // timerProgressBar: true,
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    $.ajax({
                        url: "{{ route('events.add-delegate') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        success: function(data) {
                            // console.log(data);
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            alert("Request: " + JSON.stringify(request));
                        },
                        complete: function () {
                            sal.close()
                        },
                    });
                })
                $('#form-assistant').submit(function(e) {
                    e.preventDefault();
                    var formData = $('#form-assistant').serialize();
                    // // console.log(formData);
                    $.ajax({
                        url: "{{ route('events.add-assistant') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        success: function(data) {
                            // console.log(data);
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                })
                $('#form-adjunto').submit(function(e) {
                    e.preventDefault()
                    let sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos procesando la información',
                        // timer: 2000,
                        // timerProgressBar: true,
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    $.ajax({
                        url: "{{ route('events.upload-file') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: new FormData(document.getElementById('form-adjunto')),
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // console.log(data);
                            // toastr.success('Se ha guardado correctamente')
                            // $('#btn-dismiss-event').click()
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            alert("Request: " + JSON.stringify(request));
                        },
                        complete: function () {
                            sal.close()
                        }
                    });
                })
                $('#btn-save').click(function () {
                    $('#form-update').submit()
                })
                $('#form-update').submit(function(e) {
                    // e.preventDefault();
                    // $('#notes').val($('#snow-editor').html())
                })
                $('#practice_area_ids').select2({
                    tags: true,
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

                $('.btn-delete-delegate').click(function(e) {
                    e.preventDefault();
                    let id = $(this).data('id')
                    // console.log(id);

                    Swal.fire({
                        icon: "question",
                        title: "¿Estás seguro de eliminar?",
                        showCancelButton: true,
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('delegate.destroy') }}",
                                type: 'GET',
                                dataType: 'json',
                                data: {
                                    id: id
                                },
                                // mimeType: "multipart/form-data",
                                // contentType: false,
                                // cache: false,
                                // processData: false,
                                success: function(data) {
                                    // console.log(data);
                                    // toastr.success('Se ha guardado correctamente')
                                    // $('#btn-dismiss-event').click()
                                    alertify.success('Se ha guardado correctamente');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 2000);
                                },
                                error: function(request, error) {
                                    // console.log(request);
                                    // console.log(error);
                                    alert("Request: " + JSON.stringify(request));
                                }
                            });
                        }
                    });
                })

                $('.btn-delete-assistant').click(function(e) {
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
                            $.ajax({
                                url: "{{ route('events.remove-assistant') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    assistant_id: assistant_id,
                                    event_id: event_id,
                                },
                                success: function(data) {
                                    // console.log(data);
                                    alertify.success('Se ha guardado correctamente');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                },
                                error: function(request, error) {
                                    // console.log(request);
                                    // console.log(error);
                                    alert("Request: " + JSON.stringify(request));
                                }
                            });
                        }
                    });
                })

                $('.btn-delete-file').click(function(e) {
                    e.preventDefault();
                    let file = $(this).data('file')
                    let event_id = $('input[name=id]').val()
                    // console.log(file);

                    Swal.fire({
                        icon: "question",
                        title: "¿Estás seguro de eliminar?",
                        showCancelButton: true,
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('events.remove-file') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    file: file,
                                    event_id: event_id,
                                },
                                success: function(data) {
                                    // console.log(data);
                                    alertify.success('Se ha eliminado correctamente');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                },
                                error: function(request, error) {
                                    // console.log(request);
                                    // console.log(error);
                                    alert("Request: " + JSON.stringify(request));
                                }
                            });
                        }
                    });
                })

                $('#btn-delete').click(function(e) {
                    e.preventDefault();
                    let id = $('input[name=id]').val()
                    // console.log(id);

                    Swal.fire({
                        icon: "question",
                        title: "¿Estás seguro de eliminar?",
                        showCancelButton: true,
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('events.destroy') }}",
                                type: 'GET',
                                dataType: 'json',
                                data: {
                                    id: id
                                },
                                // mimeType: "multipart/form-data",
                                // contentType: false,
                                // cache: false,
                                // processData: false,
                                success: function(data) {
                                    // console.log(data);
                                    // toastr.success('Se ha guardado correctamente')
                                    // $('#btn-dismiss-event').click()
                                    alertify.success('Se ha eliminado correctamente');
                                    setTimeout(() => {
                                        location.href = "{{ route('events') }}";
                                    }, 1000);
                                },
                                error: function(request, error) {
                                    // console.log(request);
                                    // console.log(error);
                                    alert("Request: " + JSON.stringify(request));
                                }
                            });
                        }
                    });
                })
                /**
                 * Dropzone 
                 * */
                let myDropzone = new Dropzone("#form-upload", 
                    { 
                        url: "{{ route('events.upload-file') }}",
                        method: "POST",
                        paramName: 'adjunto',
                        // autoProcessQueue: false,
                        uploadMultiple: true,
                        // addRemoveLinks: true,
                        // parallelUploads: 5,
                        // maxFiles: 5,
                    }
                );
                myDropzone.on('sending', function () {
                    // console.log('sending');
                })
                // myDropzone.on("sending", function(file, xhr, formData) {
                //     // Will send the filesize along with the file as POST data.
                //     formData.append("event_id", $('#form-upload input[name=event_id]').val());
                // });
                myDropzone.on("successmultiple", function(file, response, x) {
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    // console.log(response);
                    // console.log('success all files');
                    alertify.success('Se ha subido correctamente, redireccionando...');
                });
                myDropzone.on("errormultiple", function(file, response, x) {
                    alertify.error('No se ha procesado los archivos');
                });
                /**
                 * End Dropzone 
                 * */
            });
        </script>
    @endsection
