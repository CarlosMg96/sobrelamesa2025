@extends('layouts.master')
@section('title')
    Directorio
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
    Directorio
@endsection
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @endsection
    @section('content')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Directorio 
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        @can('create partners')
                            <a href="{{ route('partners.create') }}" class="btn btn-warning text-black me-2">
                                <i class="bx bx-plus me-1"></i> Nuevo Asociado</a>
                            <a href="{{ route('partners.import') }}" class="btn btn-outline-warning">
                                <i class="bx bx-upload me-1"></i> Importar Excel</a>
                        @endcan
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a id="btn-export-excel" class="dropdown-item" href="#" target="_blank"><i class="bx bxs-download me-2"></i> Descargar XLSX</a></li>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Directory Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Birthdate</th>
                                        <th scope="col"  nonce="newN0nc3ForS3cur1ty" style="width: 200px;">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($partners as $partner)
                                    <tr>
                                        <td>
                                            @can('edit partners')
                                                <a href="{{ route('partners.edit', ['id' => $partner->id]) }}" class="text-body d-inline-block text-truncate"  nonce="newN0nc3ForS3cur1ty" style="max-width: 350px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $partner->name}} {{ $partner->last_name}}">{{ $partner->name}} {{ $partner->last_name}}</a>
                                            @else
                                                <span class="text-body d-inline-block text-truncate"  nonce="newN0nc3ForS3cur1ty" style="max-width: 350px;">{{ $partner->name}} {{ $partner->last_name}}</span>
                                            @endcan
                                        </td>
                                        <td>
                                            {{ $partner->directory_name }}
                                        </td>
                                        <td>
                                            {{ $partner->email }}
                                        </td>
                                        <td>
                                            {{ $partner->number }}
                                        </td>
                                        <td>
                                            {{ $partner->position }}
                                        </td>
                                        <td>
                                            {{ $partner->area }}
                                        </td>
                                        <td>
                                            {{ $partner->birthdate ? \Carbon\Carbon::parse($partner->birthdate)->format('d/m/Y') : '' }}
                                        </td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                @can('edit partners')    
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('partners.edit', ['id' => $partner->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-id="{{ $partner->id }}" class="px-2 text-primary btn-edit-partner">
                                                            <i class="bx bx-pencil font-size-18"></i>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('delete partners')    
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-id="{{ $partner->id }}"
                                                            data-bs-placement="top" title="Delete" class="px-2 text-danger delete"><i
                                                                class="bx bx-trash-alt font-size-18"></i></a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </td>
                                    </tr>    
                                    @empty
                                        {{-- <tr>
                                            <td colspan="5" class="text-center">No partners found</td>
                                        </tr> --}}
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
                            <h4 class="mt-3">Partner Added Successfully</h4>
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
        @if (session('status'))
        <script nonce="newN0nc3ForS3cur1ty" >
            (function($) {
                var session = JSON.parse("{{ session('status') }}".replace(/(&quot\;)/g,"\""));
                if (session.success) 
                    alertify.success(session.message)
            })(jQuery);
        </script>
        @endif
        <script nonce="newN0nc3ForS3cur1ty" >
            $(function(){
                $('.delete').click(function(e) {
                    e.preventDefault();
                    var id = $(this).data('id')
                    Swal.fire({
                        icon: "question",
                        title: "¿Estás seguro de eliminar?",
                        showCancelButton: true,
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            // console.log(id);
                            $.ajax({
                                url: "{{ route('partners.destroy') }}",
                                type: 'post',
                                dataType: 'json',
                                data: { id: id, _token: $('[name=_token]').val() },
                                success: function(data) {
                                    // console.log(data);
                                    setTimeout(() => {
                                        location.href = "{{ route('partners') }}";
                                    }, 1000);
                                },
                                error: function(jqXHR, status, error) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Hay un problema al eliminar",
                                    })
                                }
                            });
                        }
                    });
                })

                let table = new DataTable('#table', {
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay datos disponibles",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activar para ordenar la columna ascendente",
                            "sortDescending": ": activar para ordenar la columna descendente"
                        }
                    }
                });
                new DataTable.Buttons(table, {
                    buttons: [
                        {
                            extend: 'copy',
                            text: 'Copiar'
                        },
                        {
                            extend: 'csv',
                            text: 'CSV'
                        },
                        {
                            extend: 'excel',
                            text: 'Excel'
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF'
                        },
                        {
                            extend: 'print',
                            text: 'Imprimir'
                        }
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
