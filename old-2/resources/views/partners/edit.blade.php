@extends('layouts.master')
@section('title')
    Edit Partner
@endsection
@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Edit Partner
@endsection
@section('breadcrumb')
    {{-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('partners') }}">Partners</a></li>
            <li class="breadcrumb-item active">Edit Partner</li>
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
                    <h5 class="card-title">Edit Partner</h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('partners') }}">Partners</a></li>
                            <li class="breadcrumb-item active">Edit Partner</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <button type="button" id="btn-save" class="btn btn-warning text-black">
                            <i class="bx bx-save me-1"></i> Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('partners.update', $partner->id) }}" id="form-store" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">First Name*</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               placeholder="Enter first name" id="name" name="name" 
                                               value="{{ old('name', $partner->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="last_name">Last Name*</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                               placeholder="Enter last name" id="last_name" name="last_name" 
                                               value="{{ old('last_name', $partner->last_name) }}" required>
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email*</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                               placeholder="Enter email address" id="email" name="email" 
                                               value="{{ old('email', $partner->email) }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="number">Phone Number</label>
                                        <input type="text" class="form-control @error('number') is-invalid @enderror" 
                                               placeholder="Enter phone number" id="number" name="number" 
                                               value="{{ old('number', $partner->number) }}">
                                        @error('number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="directory_name">Directory Name</label>
                                        <input type="text" class="form-control @error('directory_name') is-invalid @enderror" 
                                               placeholder="Enter directory name" id="directory_name" name="directory_name" 
                                               value="{{ old('directory_name', $partner->directory_name) }}">
                                        @error('directory_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="direct_number">Direct Number</label>
                                        <input type="text" class="form-control @error('direct_number') is-invalid @enderror" 
                                               placeholder="Enter direct number" id="direct_number" name="direct_number" 
                                               value="{{ old('direct_number', $partner->direct_number) }}">
                                        @error('direct_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="position">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                               placeholder="Enter position" id="position" name="position" 
                                               value="{{ old('position', $partner->position) }}">
                                        @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="area">Practice Area</label>
                                        <input type="text" class="form-control @error('area') is-invalid @enderror" 
                                               placeholder="Enter practice area" id="area" name="area" 
                                               value="{{ old('area', $partner->area) }}">
                                        @error('area')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="birthdate">Birth Date</label>
                                        <input type="date" class="form-control @error('birthdate') is-invalid @enderror" 
                                               id="birthdate" name="birthdate" value="{{ old('birthdate', $partner->birthdate) }}">
                                        @error('birthdate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>

            <div class="col-md-12">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('partners') }}" class="btn btn-secondary me-2">
                            <i class="bx bx-arrow-back me-1"></i> Back
                        </a>
                        <button type="button" onclick="document.getElementById('btn-save').click()" class="btn btn-warning text-black">
                            <i class="bx bx-save me-1"></i> Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        @session('success')
            <script nonce="newN0nc3ForS3cur1ty" >
                $(function(){
                    alertify.success('Se ha actualizado correctamente');
                });
            </script>
        @endsession
        <script nonce="newN0nc3ForS3cur1ty" >
            $(function(){
                $('#btn-save').click(function (e) {
                    e.preventDefault();
                    $('#form-store').submit()
                })

                $('#form-store').submit(function (e) {
                    var formData = new FormData($(this)[0]);
                    e.preventDefault();
                    sal = Swal.fire({
                        icon: 'info',
                        title: 'Espera un momento',
                        html: 'Estamos procesando la información',
                        didOpen: function() {
                            Swal.showLoading()
                        },
                    })
                    
                    dismiss_alert();
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        dataType: 'json',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // console.log(data);
                            alertify.success('Se ha actualizado correctamente');
                            setTimeout(() => {
                                location.href = "{{ route('partners') }}";
                            }, 1000);
                        },
                        error: function(jqXHR, status, error) {
                            sal.close();
                            if (jqXHR.status === 422) {
                                var list = '<ul  nonce="newN0nc3ForS3cur1ty" style="columns: 2;">'
                                $.each(jqXHR.responseJSON.errors, function(i, error) {
                                    list += `<li>${error}</li>`
                                    // console.log(i);
                                    var el = $('[name="' + i + '"], [name="' + i + '[]"]');
                                    // console.log(el);
                                    if(el.attr('type') == 'checkbox' || el.attr('type') == 'radio'){
                                        el.addClass('is-invalid');
                                    }
                                    if(el.attr('type') == 'select'){
                                        el.addClass('is-invalid');
                                    } else {
                                        el.addClass('is-invalid');
                                    }
                                });
                                list += '</ul>'
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

                function alert(message, type) {
                    var wrapper = document.createElement('div')
                    var al = 
                    `<div class="alert alert-${type} alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                        <i class="mdi mdi-block-helper label-icon"></i>
                        <p>${message}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    wrapper.innerHTML = al

                    $('.liveAlertPlaceholder').append(wrapper)
                }

                function dismiss_alert(){
                    $('.liveAlertPlaceholder').empty()
                }
            });
        </script>
    @endsection
