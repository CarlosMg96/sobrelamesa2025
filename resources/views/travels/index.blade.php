@extends('layouts.master')
@section('title')
@lang('Mis Viajes')
@endsection
@section('css')
    {{-- datatables css --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <style nonce="newN0nc3ForS3cur1ty" >
        div.dt-buttons {
            display: none;
        }
    </style>
@endsection
@section('page-title')
@lang('Mis Viajes')
@endsection
@section('body')

    <body data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">@lang('Mi lista de Viajes Registrados')
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    {{-- <div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="contacts-list" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="contacts-grid" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                    <div>
                        @can('create travels')     
                        <a href="{{ route('travels.create') }}" class="btn btn-warning text-black">
                            <i class="bx bx-plus me-1"></i>@lang('Registrar tu próximo Viaje')</a>
                        @endcan
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a id="btn-export-excel" class="dropdown-item" href="#" target="_blank"><i class="bx bxs-download me-2"></i> Descargar XLSX</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap align-middle" id="table">
                                <thead class="table-light">
                                    <tr>
                                        {{-- <th scope="col" class="ps-4"  nonce="newN0nc3ForS3cur1ty" style="width: 50px;">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="contacusercheck">
                                                <label class="form-check-label" for="contacusercheck"></label>
                                            </div>
                                        </th> --}}
                                        <th scope="col">@lang('Nombre')</th>
                                        <th scope="col">@lang('Lugar')</th>
                                        <th scope="col">@lang('Fechas')</th>
                                        {{-- <th scope="col">Clientes / Despachos</th> --}}
                                        <th scope="col"  nonce="newN0nc3ForS3cur1ty" style="width: 200px;">@lang('Acciones')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse (App\Models\Travel::all() as $item)
                                    <tr>
                                        {{-- <th scope="row" class="ps-4">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                <label class="form-check-label" for="contacusercheck1"></label>
                                            </div>
                                        </th> --}}
                                        <td>
                                            {{-- <img src="{{ URL::asset('images/users/avatar-2.jpg') }}" alt=""
                                                class="avatar rounded-circle img-thumbnail me-2"> --}}
                                            @can('edit travels')
                                            <a href="{{ route('travels.edit', ['id' => $item->id]) }}" class="text-body">{{ $item->name}}</a>
                                            @else
                                            <span class="text-body">{{ $item->name}}</span>
                                            @endcan
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success mb-0">{{ $item->place }}</span></td>
                                        <td>{{ $item->start_date }} al {{ $item->end_date }}</td>
                                        {{-- <td>
                                            @foreach ($item->clients as $value)
                                            <span class="badge bg-primary-subtle text-primary mb-0">{{ $value->name }}</span>
                                            @endforeach
                                            @foreach ($item->law_firms as $value)
                                            <span class="badge bg-secondary-subtle text-secondary mb-0">{{ $value->name }}</span>
                                            @endforeach
                                        </td> --}}
                                        <td>
                                            <ul class="list-inline mb-0">
                                                @can('edit travels')    
                                                <li class="list-inline-item">
                                                    <a href="{{ route('travels.edit', ['id' => $item->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('Editar')" data-id="{{ $item->id }}" class="px-2 text-primary btn-edit-deal">
                                                        <i class="bx bx-pencil font-size-18"></i>
                                                    </a>
                                                </li>
                                                @endcan
                                                @can('delete travels')    
                                                <li class="list-inline-item">
                                                    <a href="{{ route('travels.destroy', ['id' => $item->id]) }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="@lang('Eliminar')" class="px-2 text-danger btn-delete"><i
                                                            class="bx bx-trash-alt font-size-18"></i></a>
                                                </li>
                                                @endcan
                                            </ul>
                                        </td>
                                    </tr>    
                                    @empty
                                        
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        
        </div>
        <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!--  successfully modal  -->
        <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-check-circle display-1 text-success"></i>
                            <h4 class="mt-3">User Added Successfully</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--  Extra Large modal example -->
        <div class="modal fade add-new" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">@lang('Nuevo Viaje')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('events.store') }}" id="form-create">
                            <div class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="lawfirm">Despacho</label>
                                        <input type="text" class="form-control" placeholder="Despacho"
                                            id="lawfirm" name="lawfirm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="country">Jurisdicción</label>
                                        <input type="text" class="form-control" placeholder="Jurisdicción"
                                            id="country" name="country">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="room">Lugar</label>
                                        <input type="text" class="form-control" placeholder="Lugar"
                                            id="room" name="room">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date">Fecha</label>
                                        <input type="date" class="form-control" placeholder="Fecha"
                                            id="date" name="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="format">Formato</label>
                                        <input type="text" class="form-control" placeholder="Formato"
                                            id="format" name="format">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="practice_area">Área de Interés</label>
                                        <input type="text" class="form-control" placeholder="Área de Interés"
                                            id="practice_area" name="practice_area">
                                    </div>
                                </div>
                                {{-- <label class="form-label">Asistentes Visitante</label>
                                <div class="container-delegados">
                                    <div class="row row-delegados">
                                        <div class="col mb-3 ">
                                            <label class="form-label">Nombre Visitante</label>
                                            <input type="text" class="form-control" name="name_delegate[]">
                                        </div>
                                        <div class="col mb-3 ">
                                            <label class="form-label">Area Visitante</label>
                                            <input type="text" class="form-control" name="area_delegate[]">
                                        </div>
                                        <div class="col mb-3 ">
                                            <label class="form-label">Correo Visitante</label>
                                            <input type="text" class="form-control" name="email_delegate[]">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button id="btn-agregar-delegados" type="button" class="btn btn-link">Agregar Visitante</button>
                                    </div>
                                </div> --}}
                                {{-- <label class="form-label">Asistentes Galicia</label>
                                <div class="container-asistentes">
                                    <div class="row row-asistente">
                                        <div class="col mb-3 ">
                                            <label class="form-label">Nombre </label>
                                            <input type="text" class="form-control" name="name_assistant[]">
                                        </div>
                                        <div class="col mb-3 ">
                                            <label class="form-label">Area </label>
                                            <input type="text" class="form-control" name="area_assistant[]">
                                        </div>
                                        <div class="col mb-3 ">
                                            <label class="form-label">Correo </label>
                                            <input type="text" class="form-control" name="email_assistant[]">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button id="btn-agregar-asistente" type="button" class="btn btn-link">Agregar Asistente</button>
                                    </div>
                                </div> --}}
                                {{-- <label class="form-label">Adjuntos</label>
                                <div class="container-adjunto">
                                    <div class="row row-adjunto">
                                        <div class="col mb-3 ">
                                            <label class="form-label">Archivo Adjunto</label>
                                            <input class="form-control" type="file" name="adjunto[]">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button id="btn-agregar-adjunto" type="button" class="btn btn-link">Agregar Adjunto</button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                  <label for="notes" class="form-label">Notas</label>
                                  <textarea rows="6" class="form-control" name="notes" id="notes"></textarea>
                                </div> --}}
                            </div>
                        </form>
                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-danger me-1" id="btn-dismiss-event" data-bs-dismiss="modal"><i
                                        class="bx bx-x me-1 align-middle"></i> Cancelar</button>
                                <button type="submit" class="btn btn-success" id="btn-save-event"><i
                                        class="bx bx-check me-1 align-middle"></i> Confirmar</button>
                            </div>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    @endsection
    @section('scripts')
        {{-- datatables js --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" integrity="sha384-MgwUq0TVErv5Lkj/jIAgQpC+iUIqwhwXxJMfrZQVAOhr++1MR02yXH8aXdPc3fk0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js" integrity="sha384-ytWx70TEZNWKvhA4mV4nQPHLRzPJeBf42voNnsXOSCv7ZxlBWQIceO1G8bJirjxl" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js" integrity="sha384-m1YnvBcNGjKAtJ9d9O4s6EuBhKPlLADOZwIu9q7rZBl9d52CUmsHElEO7fNmajv9" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js" integrity="sha384-tMI2NOtgmf/QM9L3vlG0tyNSWXuAnVHcIOhU6+PDkOqN1a5BAZRMrXCvQIgk9KyG" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha384-+mbV2IY1Zk/X1p/nWllGySJSUN8uMs+gUAN10Or95UBH0fpj6GfKgPmgC5EXieXG" crossorigin="anonymous"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js" integrity="sha384-MjweF+FY5MNbjB5ONlHWtlrou29MgBI/+acgSv4n5CBD79xUbMbLyka8NeCoK0D7" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js" integrity="sha384-FvTRywo5HrkPlBKFrm2tT8aKxIcI/VU819roC/K/8UrVwrl4XsF3RKRKiCAKWNly" crossorigin="anonymous"></script> --}}

        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
         <!-- gridjs js -->
         <script src="{{ URL::asset('libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty" >
            $(function(){
                @if (session('status'))
                    var session = JSON.parse("{{ session('status') }}".replace(/(&quot\;)/g,"\""));
                    if (session.success) 
                        alertify.success(session.message)
                    else
                        alertify.error(session.message)
                @endif

                $('#btn-save-event').click(function (e) {
                    e.preventDefault();
                    var delegados = []
                    var asistentes = []
                    $('.row-delegados').each(function(index, elem) {
                        let nombre_delegado = $(this).find('[name=name_delegate]').val()
                        let area_delegado = $(this).find('[name=area_delegate]').val()
                        let email_delegado = $(this).find('[name=email_delegate]').val()
                        if (!nombre_delegado || !area_delegado || !email_delegado){
                            return;
                        }
                        delegados.push({
                            name_delegate: nombre_delegado,
                            area_delegate: area_delegado,
                            email_delegate: email_delegado,
                        })
                    })
                    $('.row-asistente').each(function(index, elem) {
                        let nombre_asistente = $(this).find('[name=name_assistant]').val()
                        let area_asistente = $(this).find('[name=area_assistant]').val()
                        let email_asistente = $(this).find('[name=email_assistant]').val()
                        if (!nombre_asistente || !area_asistente || !email_asistente){
                            return;
                        }
                        asistentes.push({
                            name_assistant: nombre_asistente,
                            area_assistant: area_asistente,
                            email_assistant: email_asistente,
                        })
                    })
                    $.ajax({
                        url: "{{ route('events.store') }}",
                        type: 'POST',
                        dataType: 'json',
                        data:  new FormData(document.getElementById('form-create')),
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // console.log(data);
                            // toastr.success('Se ha guardado correctamente')
                            $('#btn-dismiss-event').click()
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.href= "{{ url('events/edit') }}/" + data.id
                            }, 1000);
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                })
                $('.btn-delete').click(function (e) {
                    var url = $(this).attr('href');
                    // console.log(url);
                    e.preventDefault();
                    Swal.fire({
                        icon: "question",
                        title: "@lang('¿Está seguro de eliminar?')",
                        showCancelButton: true,
                        confirmButtonText: "@lang('Eliminar')",
                        cancelButtonText: "@lang('Cancelar')",
                        customClass: {
                            confirmButton: "btn btn-lg btn-warning",
                            cancelButton: "btn btn-lg btn-dark"
                        },
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: url,
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _token: "{{ csrf_token() }}"
                                },
                                // mimeType: "multipart/form-data",
                                // contentType: false,
                                // cache: false,
                                // processData: false,
                                success: function(data) {
                                    // console.log(data);
                                    // toastr.success('Se ha guardado correctamente')
                                    // $('#btn-dismiss-event').click()
                                    // alertify.success('Se ha guardado correctamente');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 500);
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
                let table = new DataTable('#table', {
                    // language: {
                    //     url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json"
                    // }
                });
                new DataTable.Buttons(table, {
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                table
                    .buttons(0, null)
                    .container()
                    .prependTo(table.table().container());
                $('#btn-export-excel').click(function (e) {
                    e.preventDefault();
                    $('.dt-button.buttons-excel').trigger('click')
                })
            });
        </script>
    @endsection
