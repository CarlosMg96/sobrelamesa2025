@extends('layouts.master')
@section('title')
    New Partner
@endsection
@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    New Partner
@endsection
@section('breadcrumb')
    {{-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('partners') }}">Partners</a></li>
            <li class="breadcrumb-item active">New Partner</li>
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
                    <h5 class="card-title">New Partner</h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('partners') }}">Partners</a></li>
                            <li class="breadcrumb-item active">New Partner</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <button type="button" id="btn-save" class="btn btn-warning text-black">
                            <i class="bx bx-save me-1"></i> Save
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
                        <form action="{{ route('partners.store') }}" id="form-store" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">First Name*</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                               placeholder="Enter first name" id="name" name="name" 
                                               value="{{ old('name') }}" required>
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
                                               value="{{ old('last_name') }}" required>
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
                                               value="{{ old('email') }}" required>
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
                                               value="{{ old('number') }}">
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
                                               value="{{ old('directory_name') }}">
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
                                               value="{{ old('direct_number') }}">
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
                                               value="{{ old('position') }}">
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
                                               value="{{ old('area') }}">
                                        @error('area')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="birthdate">Birth Date</label>
                                        <input type="date" class="form-control @error('birthdate') is-invalid @enderror" 
                                               id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
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
                            <i class="bx bx-save me-1"></i> Save
                        </button>
                    </div>
                </div>
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
                // var summary_editor = new Quill('#summary-editor', {
                //     theme: 'snow',
                //     modules: {
                //         'toolbar': [['bold', 'italic', 'underline', 'strike'], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['clean']]
                //     },
                // });
                $('#practice_area_ids').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    tokenSeparators: [','],
                })
                $('#branches').select2({
                    theme: 'bootstrap-5'
                })
                $('#client_id').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    tokenSeparators: [','],
                    createTag: function (params) {
                        var term = $.trim(params.term);
                        if (term === '')
                            return null;
                        return {
                            id: term,
                            text: term,
                            newClient: true // add additional parameters
                        }
                    }
                })
                $('#authorized_by').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                });
                $('#partner_id').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    tokenSeparators: [','],
                    createTag: function (params) {
                        var term = $.trim(params.term);
                        if (term === '')
                            return null;
                        return {
                            id: term,
                            text: term,
                            new: true // add additional parameters
                        }
                    }
                })
                $('#partner_id').on('select2:select', function (e) { 
                    // // console.log(e);
                    if( e.params.data ) {
                        var data = e.params.data
                        var values = $('#partner_id').select2('data');
                        $("#team_members option").removeAttr('disabled')
                        for (let index = 0; index < values.length; index++) {
                            const element = values[index];
                            if(!element.new)
                                $("#team_members option[value='" + element.id + "']").attr('disabled', 'disabled');
                        }
                        // console.log(data);
                    }
                });
                $('#supporting_law_firms').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    tokenSeparators: [','],
                })
                $('#team_members').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    tokenSeparators: [','],
                    createTag: function (params) {
                        var term = $.trim(params.term);
                        if (term === '')
                            return null;
                        return {
                            id: term,
                            text: term,
                            new: true // add additional parameters
                        }
                    }
                })
                $('#team_members').on('select2:select', function (e) { 
                    // // console.log(e);
                    if( e.params.data ) {
                        var data = e.params.data
                        var values = $('#team_members').select2('data');
                        $("#partner_id option").removeAttr('disabled')
                        for (let index = 0; index < values.length; index++) {
                            const element = values[index];
                            if(!element.new)
                                $("#partner_id option[value='" + element.id + "']").attr('disabled', 'disabled');
                        }
                        // console.log(data);
                    }
                });
                $('#jurisdiction_ids').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    tokenSeparators: [','],
                })
                $('#contact-name').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    tokenSeparators: [','],
                    createTag: function (params) {
                        // console.log(params);
                        var term = $.trim(params.term);
                        // console.log(term);
                        if (term === '')
                            return null;
                        return {
                            id: term,
                            text: term,
                            newContact: true // add additional parameters
                        }
                    }
                })
                $('#contact-name').on('select2:select', function (e) {
                    // Do something
                    if( e.params.data ) {
                        var data = e.params.data
                        if (data.newContact){
                            $('#contact-position, #contact-email, #contact-tel, #contact-company').val('')
                        } else {
                            $.ajax({
                                url: "{{ route('contacts.get') }}",
                                type: 'get',
                                dataType: 'json',
                                data: { id: data.id },
                                success: function(data) {
                                    if(data) {
                                        $('#contact-position').val(data.job_position)
                                        $('#contact-email').val(data.email)
                                        $('#contact-tel').val(data.tel)
                                        $('#contact-company').val(data.company)
                                    } else 
                                        $('#contact-position, #contact-email, #contact-tel, #contact-company').val('')
                                },
                                error: function(jqXHR, status, error) {
                                    $('#contact-position, #contact-email, #contact-tel, #contact-company').val('')
                                }
                            });
                        }
                    }
                });
                $('#form-contacts').submit(function(e) {
                    e.preventDefault();
                    // let assistant_id = $('#form-contacts input[name=assistant_id]').val()
                    let contact_data = $('#contact-name').select2('data')[0];
                    // console.log(contact_data);
                    let contact_id = contact_data.id
                    let newContact = contact_data.newContact == undefined ? null : contact_data.newContact
                    let name = contact_data.text
                    let position = $('#contact-position').val()
                    let tel = $('#contact-tel').val()
                    let email = $('#contact-email').val()
                    let company = $('#contact-company').val()
                    // let company = $('#form-contacts input[name=company]').val()
                    if($('table#table-contacts > tbody  tr.no-info').length == 1) {
                        $('table#table-contacts > tbody  tr.no-info').remove()
                    }
                    // <td>${company}</td>
                    $('table#table-contacts > tbody').append(
                        `<tr class="trcontacts" data-id="${newContact == true ? -1: contact_id}" data-name="${name}" data-position="${position}" data-company="${company}" data-email="${email}"  data-tel="${tel}">
                            <td>${name}</td>
                            <td>${position}</td>
                            <td>${company}</td>
                            <td>${tel}</td>
                            <td>${email}</td>
                            <td>
                                <a href="javascript:void(0);" class="btn-delete-contact" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger">
                                    <i class="bx bx-trash-alt font-size-18 text-danger"></i>
                                </a>
                            </td>
                        </tr>`
                    )
                    $('#form-contacts').trigger('reset')
                })
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
                    // $('#summary').val(summary_editor.container.innerHTML)
                    
                    
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
                            // toastr.success('Se ha guardado correctamente')
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                location.href = "{{ route('partners') }}";
                            }, 1000);
                            // sal.close();
                        },
                        error: function(jqXHR, status, error) {
                            sal.close();
                            if (jqXHR.status === 422) {
                                var list = '<ul  nonce="newN0nc3ForS3cur1ty" style="columns: 2;">'
                                $.each(jqXHR.responseJSON.errors, function(i, error) {
                                    list += `<li>${error}</li>`
                                    // console.log(i);
                                    var el = $('[name="' + i + '"], [name="' + i + '[]"]');
                                    // if (!el)
                                        // el = $('[name="' + i + '[]"]')
                                        // console.log(el);
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
               
                $('table#table-contacts').on('click', '.btn-delete-contact', function(e) {
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
                            if($('table#table-contacts > tbody  tr').length == 0) {
                                $('table#table-contacts > tbody ').append(`
                                <tr class="no-info">
                                    <td colspan="5">
                                        <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                    </td>
                                </tr>
                                `)
                            }
                        }
                    });
                })
                /** 
                 * End
                 * */
                $('#btn-agregar-delegados').click(function () {
                    $('.row-delegados').removeClass('d-none')
                    $('#btn-agregar-delegados').addClass('d-none')
                })
                $('#btn-dismiss-delegate').click(function () {
                    $('.row-delegados').addClass('d-none')
                    $('#btn-agregar-delegados').removeClass('d-none')
                })
                $('#btn-agregar-asistente').click(function () {
                    $('.row-asistente').removeClass('d-none')
                    $('#btn-agregar-asistente').addClass('d-none')
                })
                $('#btn-dismiss-assistant').click(function () {
                    $('.row-asistente').addClass('d-none')
                    $('#btn-agregar-asistente').removeClass('d-none')
                })
                $('#form-delegates').submit(function (e) {
                    e.preventDefault();
                    var formData = $('#form-delegates').serialize();
                    $.ajax({
                        url: "{{ route('events.add-delegate') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: formData ,
                        success: function(data) {
                            // console.log(data);
                            // toastr.success('Se ha guardado correctamente')
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
                $('#form-assistant').submit(function (e) {
                    e.preventDefault();
                    var formData = $('#form-assistant').serialize();
                    $.ajax({
                        url: "{{ route('events.add-assistant') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: formData ,
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
                $('#form-adjunto').submit(function (e) {
                    e.preventDefault()
                    $.ajax({
                        url: "{{ route('events.upload-file') }}",
                        type: 'POST',
                        dataType: 'json',
                        data:  new FormData(document.getElementById('form-adjunto')),
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
                        }
                    });
                })
                $('#form-update').submit(function (e) {
                    // e.preventDefault();
                    $('#notes').val($('#snow-editor').html())
                })

                // var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
                // var alertTrigger = document.getElementById('liveAlertBtn')

                function alert(message, type) {
                    var wrapper = document.createElement('div')
                    // alert alert-success alert-dismissible alert-label-icon label-arrow fade show
                    // {{-- <h5>Campos vacios</h5>  --}}
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
