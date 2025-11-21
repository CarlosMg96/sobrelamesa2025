@extends('layouts.master')
@section('title')
    Roles
@endsection
@section('css')
    {{-- datatables css --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
Roles
@endsection
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Roles {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}</h5>
                </div>
            </div>
            <div class="col-md-6 pt-1">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <button type="button" id="btn-new" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#modal"><i class="bx bx-plus me-1"></i> Add New </button>

                        <!-- sample modal content -->
                        <div id="modal" class="modal fade" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true" data-bs-scroll="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">New Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="{{ route('roles.store') }}">
                                            <input type="hidden" id="id" name="id" value="0">
                                            @csrf
                                            <div class="mb-3">
                                              <label for="name" class="col-form-label">Name</label>
                                              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                            </div>

                                            <div class="mb-3">
                                                <label class="col-form-label">Permissions</label>
                                                <table class="table">
                                                    @foreach ($permissions as $kp => $item)
                                                       <tr>
                                                         <th>{{ $kp }}</th>
                                                        </tr> 
                                                        <tr>
                                                            @foreach ($item as $permission)
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" id="formrow-{{ $permission['id'] }}" name="permissions[]" value="{{ $permission['name'] }}">
                                                                        <label class="form-check-label" for="formrow-{{ $permission['id'] }}">{{ $permission['name'] }}</label>
                                                                    </div>
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </table>
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
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col">Nombre</th>
                                        <th scope="col"  nonce="newN0nc3ForS3cur1ty" style="width: 50px;">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach (Spatie\Permission\Models\Role::get() as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ route('roles.store', ['id' => $item->id]) }}" class="text-body">{{ $item->name??''}}</a>
                                        </td>
                                        <td class="text-end">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('roles.store', ['id' => $item->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-id="{{ $item->id }}" class="px-2 text-primary btn-edit">
                                                        <i class="bx bx-pencil font-size-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{ route('roles.destroy', ['id' => $item->id]) }}" data-bs-toggle="tooltip" 
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
                    $('#form').trigger("reset");
                    // console.log('new');
                    e.preventDefault();
                    $('#id').val(0)
                    $('#form').attr('action', "{{ route('roles.store') }}")
                })
                $('.btn-edit').click(function (e) {
                    $('#form').trigger("reset");
                    e.preventDefault();
                    let id = $(this).data('id');
                    $('#id').val(id)
                    var route = "{{ route('roles.update', ':id') }}";
                    // console.log(route.replace(':id', id));
                    $('#form').attr('action', route.replace(':id', id))
                    route = "{{ route('roles.show', ':id') }}";
                    $.ajax({
                        url:  route.replace(':id', id),
                        type: 'GET',
                        dataType: 'json',
                        data:  { id: id },
                        success: function(data) {
                            // console.log(data);
                            $('#name').val(data.name)
                            data.permissions.forEach(element => {
                                $("input[value='" + element.name + "']").prop('checked', true)
                            });
                            modal.show()
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
                                location.href= "{{ route('roles') }}"
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
                $('.btn-delete').click(function (e) {
                    var url = $(this).attr('href');
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
