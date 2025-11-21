@extends('layouts.master')
@section('title')
    Categorías de Menú
@stop
@section('css')
    {{-- datatables css --}}
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
@stop
@section('page-title')
    Categorías de Menú
@stop
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @section('content')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Categorías de Menú
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('menu_categories.create') }}" class="btn btn-warning text-black">
                            <i class="bx bx-plus me-1"></i> Nueva Categoría</a>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a id="btn-export-excel" class="dropdown-item" href="#" target="_blank"><i
                                        class="bx bxs-download me-2"></i> Descargar XLSX</a></li>
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
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Ícono</th>
                                        <th scope="col">Orden</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col"  nonce="newN0nc3ForS3cur1ty" style="width: 120px;">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($menuCategories as $category)
                                        <tr>
                                            <td>
                                                <a href="#" class="text-body d-inline-block text-truncate"
                                                     nonce="newN0nc3ForS3cur1ty" style="max-width: 200px;">
                                                    {{ $category->name }}
                                                </a>
                                            </td>
                                            <td class="text-truncate"  nonce="newN0nc3ForS3cur1ty" style="max-width: 250px;" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="{{ $category->description }}">
                                                {{ Str::limit($category->description, 50) }}
                                            </td>
                                            <td>
                                                @if ($category->icon)
                                                    <i class="bx {{ $category->icon }} me-2"></i>
                                                    {{ $category->icon }}
                                                @else
                                                    <span class="text-muted">Sin ícono</span>
                                                @endif
                                            </td>
                                            <td>{{ $category->sort_order }}</td>
                                            <td>
                                                @if ($category->is_active)
                                                    <span class="badge bg-success">Activa</span>
                                                @else
                                                    <span class="badge bg-danger">Inactiva</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('menu_categories.edit', $category->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                                            class="px-2 text-primary">
                                                            <i class="bx bx-pencil font-size-18"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                            data-id="{{ $category->id }}" data-bs-placement="top"
                                                            title="Eliminar" class="px-2 text-danger delete">
                                                            <i class="bx bx-trash-alt font-size-18"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No hay categorías registradas</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection

    @section('scripts')
        {{-- datatables js --}}
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" integrity="sha384-MgwUq0TVErv5Lkj/jIAgQpC+iUIqwhwXxJMfrZQVAOhr++1MR02yXH8aXdPc3fk0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js" integrity="sha384-ytWx70TEZNWKvhA4mV4nQPHLRzPJeBf42voNnsXOSCv7ZxlBWQIceO1G8bJirjxl" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js" integrity="sha384-m1YnvBcNGjKAtJ9d9O4s6EuBhKPlLADOZwIu9q7rZBl9d52CUmsHElEO7fNmajv9" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js" integrity="sha384-tMI2NOtgmf/QM9L3vlG0tyNSWXuAnVHcIOhU6+PDkOqN1a5BAZRMrXCvQIgk9KyG" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha384-+mbV2IY1Zk/X1p/nWllGySJSUN8uMs+gUAN10Or95UBH0fpj6GfKgPmgC5EXieXG" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js" integrity="sha384-MjweF+FY5MNbjB5ONlHWtlrou29MgBI/+acgSv4n5CBD79xUbMbLyka8NeCoK0D7" crossorigin="anonymous"></script>

        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>

        @if (session('status'))
            <script nonce="newN0nc3ForS3cur1ty" >
                (function($) {
                    var session = JSON.parse("{{ session('status') }}".replace(/(&quot;\;)/g, '"'));
                    if (session.success)
                        alertify.success(session.message)
                })(jQuery);
            </script>
        @endif

        <script nonce="newN0nc3ForS3cur1ty" >
            $(function() {
            // Initialize DataTable
            var table = $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    text: 'Exportar a Excel',
                    className: 'btn btn-light',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                },
                order: [
                    [3, 'asc']
                ], // Default sort by sort_order
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: false,
                paging: true,
                searching: true,
                info: true
            });

            // Handle export button click
            $('#btn-export-excel').on('click', function(e) {
                e.preventDefault();
                table.button('.buttons-excel').trigger();
            });

            // Handle delete button click
            $('.delete').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{ route('menu_categories.destroy', ['menu_category' => '__ID__']) }}'.replace('__ID__', id);

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Usar fetch para enviar la solicitud DELETE
                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error en la respuesta del servidor');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                // Mostrar mensaje de éxito
                                Swal.fire(
                                    '¡Eliminado!',
                                    data.message || 'La categoría ha sido eliminada.',
                                    'success'
                                ).then(() => {
                                    // Recargar la página para actualizar la tabla
                                    window.location.reload();
                                });
                            } else {
                                throw new Error(data.message || 'Error al eliminar la categoría');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error',
                                error.message || 'Ocurrió un error al eliminar la categoría',
                                'error'
                            );
                        });
                    }
                });
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
        </script>
    @endsection
</body>
