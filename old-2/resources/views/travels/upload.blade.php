@extends('layouts.master')
@section('title')
    Upload Travel
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
@endsection
@section('page-title')
    Upload Excel Travels
@endsection
@section('breadcrumb')
    {{-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('deals') }}">Deals</a></li>
            <li class="breadcrumb-item active">Upload Excel Deal</li>
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
                    <h5 class="card-title">Upload Excel Travels 
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('travels') }}">Travels</a></li>
                            <li class="breadcrumb-item active">Upload File</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <button type="button" class="btn btn-warning text-black btn-save">
                            <i class="bx bx-upload me-1"></i> Upload Excel
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
                        {{-- <p>{{ Hash::make('galiciauser') }} </p> --}}
                        {{-- <p>{{ Hash::make('93-*1k.-xSñ8k]}s{dl9?|12}') }} </p> --}}
                        <form action="{{ route('deals.store') }}" id="form-upload" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="0">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="excel_file" class="form-label">Select Excel File (.xlsx)</label>
                                        <input type="file" class="form-control" id="excel_file" name="excel_file" accept=".xlsx, .csv" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div id="upload-status" class="mt-3"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

            <div style='clear:both'></div>

            <div class="col-md-12">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <button type="button" class="btn btn-warning text-black btn-save">
                            <i class="bx bx-upload me-1"></i> Upload Excel
                        </button>
                    </div>
                </div>
            </div>
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
        {{-- IMask --}}
        <script src="https://unpkg.com/imask" integrity="sha384-MfCuG63MU1ZAcTsOI5gjgTtPliw8TUi5OltJrtmhBdu6RKig+1YIuyTsS3k8TRzE" crossorigin="anonymous"></script>
        @session('success')
            <script nonce="newN0nc3ForS3cur1ty" >
                $(function(){
                    alertify.success('Se ha guardado correctamente');
                });
            </script>
        @endsession
        <script nonce="newN0nc3ForS3cur1ty" >
            $(function(){
                $('#form-upload').on('submit', function (e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    $('#upload-status').html('<p class="text-info">Uploading...</p>');
                    $('.btn-save').prop('disabled', true); // Disable the button

                    $.ajax({
                        url: "{{ route('travels.uploading') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#upload-status').html('<p class="text-success">File uploaded successfully!</p>');
                            // console.log(response);
                        },
                        error: function (xhr) {
                            let errorMessage = xhr.responseJSON?.message || 'An error occurred during upload.';
                            $('#upload-status').html('<p class="text-danger">' + errorMessage + '</p>');
                        },
                        complete: function () {
                            $('.btn-save').prop('disabled', false); // Re-enable the button
                        }
                    });
                });

                $('.btn-save').on('click', function(){
                    $('#form-upload').submit();
                });
            });
        </script>
    @endsection
