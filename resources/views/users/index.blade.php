@extends('layouts.master')
@section('title')
    Usuarios
@endsection
@section('css')
    {{-- select2 Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" integrity="sha384-OXVF05DQEe311p6ohU11NwlnX08FzMCsyoXzGOaL+83dKAb3qS17yZJxESl8YrJQ" crossorigin="anonymous">
    {{-- select2 bootstrap theme --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" integrity="sha384-IrMr0LFnIMa9H6HhC5VVqVuWNEIwspnRLKQc0SUyPj4Cy4s02DiWDZEoJOo5WNK6" crossorigin="anonymous">
    {{-- datatables css --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
Usuarios
@endsection
@section('body')

    <body data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Usuarios {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}</h5>
                </div>
            </div>
            <div class="col-md-6 pt-1">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
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
                        {{-- <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Agregar Nuevo --}}
                        {{-- </a> --}}
                        <button type="button" id="btn-new" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#modal"><i class="bx bx-plus me-1"></i> Add New </button>

                        <!-- sample modal content -->
                        <div id="modal" class="modal fade" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true" data-bs-scroll="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Nuevo Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="{{ route('users.store') }}">
                                            <input type="hidden" id="id" name="id" value="0">
                                            @csrf
                                            <div class="mb-3">
                                              <label for="name" class="col-form-label">Name</label>
                                              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="col-form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="roles" class="col-form-label">Roles</label>
                                                <select class="form-select" name="roles[]" id="roles" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    @foreach (\Spatie\Permission\Models\Role::all() as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="btn-save" class="btn btn-primary waves-effect waves-light"><i class="bx bx-save me-1"></i> Save</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                    {{-- <div class="dropdown">
                        <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div> --}}
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
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col"  nonce="newN0nc3ForS3cur1ty" style="width: 50px;">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach (App\Models\User::get() as $item)
                                    <tr>
                                        <td>
                                            {{ $item->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td class="">
                                            <span class="badge bg-success">{{ $item->type_user ?? 'Administrador' }}</span>
                                        </td>
                                        <td class="">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#" data-id="{{ $item->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-id="{{ $item->id }}" class="px-2 text-primary btn-edit">
                                                        <i class="bx bx-pencil font-size-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" data-id="{{ $item->id }}" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Delete" class="px-2 text-danger btn-delete"><i
                                                            class="bx bx-trash-alt font-size-18"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
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


    @endsection
    @section('scripts')
        {{-- select2 js --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" integrity="sha384-d3UHjPdzJkZuk5H3qKYMLRyWLAQBJbby2yr2Q58hXXtAGF8RSNO9jpLDlKKPv5v3" crossorigin="anonymous"></script>
        {{-- datatables js --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" integrity="sha384-MgwUq0TVErv5Lkj/jIAgQpC+iUIqwhwXxJMfrZQVAOhr++1MR02yXH8aXdPc3fk0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js" integrity="sha384-ytWx70TEZNWKvhA4mV4nQPHLRzPJeBf42voNnsXOSCv7ZxlBWQIceO1G8bJirjxl" crossorigin="anonymous"></script>
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
         <!-- gridjs js -->
         <script src="{{ URL::asset('libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script nonce="newN0nc3ForS3cur1ty" >
            
            $(function(){
                $('#roles').select2({
                    theme: 'bootstrap-5'
                })
                // mensaje de exito
                @if (session('status'))
                    alertify.success("{{ session('status') }}")
                @endif
                let table = new DataTable('#table');
                // const modal = document.getElementById('modal')
                const modal = new bootstrap.Modal(document.getElementById('modal'), {})
                // modal.addEventListener('show.bs.modal', event => {
                //     // console.log('show modal');
                // })
                $('#btn-new').click(function (e) {
                    // console.log('new');
                    e.preventDefault();
                    $('#id').val(0)
                    $('#form').attr('action', "{{ route('users.store') }}")
                })
                $(document).on('click', '.btn-edit', function (e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    $('#id').val(id)
                    var route = "{{ route('users.update', ':id') }}";
                    $('#form').attr('action', route.replace(':id', id))
                    route = "{{ route('users.show', ':id') }}";
                    $.ajax({
                        url:  route.replace(':id', id),
                        type: 'GET',
                        dataType: 'json',
                        data:  { id: id },
                        success: function(data) {
                            // console.log(data);
                            $('#name').val(data.name)
                            $('#email').val(data.email)
                            var roles = []
                            data.roles.forEach(element => {
                                roles.push(element.name)
                            });
                            $('#roles').val(roles).change();
                            modal.show()
                            // setTimeout(() => {
                            //     location.href= "{{ route('users') }}"
                            // }, 500);
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                })
                $('#form').submit(function (e) {
                    let action = $('#form').attr('action')
                    e.preventDefault();
                    $.ajax({
                        url: action,
                        type: 'POST',
                        dataType: 'json',
                        data:  new FormData(document.getElementById('form')),
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // console.log(data);
                            setTimeout(() => {
                                location.href= "{{ route('users') }}"
                            }, 500);
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                })
                $('#btn-save').click(function (e) {
                    e.preventDefault();
                    $('#form').submit();
                })
                $(document).on('click', '.btn-delete', function (e) {
                    var id = $(this).data('id');
                    var url = "{{ route('users.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    // console.log(url);
                    e.preventDefault();
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






            });
        </script>
    @endsection
