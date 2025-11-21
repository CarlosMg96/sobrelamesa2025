@extends('layouts.master')
@section('title')
    New Permission
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
New Permission
@endsection
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @endsection
    @section('content')
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">New Permission
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('permissions') }}">Permissions</a></li>
                            <li class="breadcrumb-item active">New Permission</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <button type="button" id="btn-save" class="btn btn-primary">
                            <i class="bx bx-save me-1"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card card-h-100">
                    <div class="card-body">
                        <form action="{{ route('permissions.store') }}" id="form-store" method="POST">
                            <input type="hidden" name="id" value="0">
                            <div class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" placeholder="Name of Deal" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="client_id">Name of Client</label>
                                        <select class="form-select" name="client_id" id="client_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            <option disabled selected>Select a option</option>
                                            @foreach (\App\Models\Client::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="practice_area_ids">Practice Area(s) involved</label>
                                        <select class="form-select" name="practice_area_ids[]"
                                            id="practice_area_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\PracticeArea::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="branches">Register this issue in office</label>
                                        <select class="form-select" name="branches[]" id="branches" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            <option value="CDMX">CDMX</option>
                                            <option value="Monterrey">Monterrey</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="deal_size">Deal Size</label>
                                        <div class="input-group">
                                            <span class="input-group-text">US$</span>
                                            <input type="text" class="form-control" placeholder="USD" value="" id="deal_size" name="deal_size">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="send_publications">Send to publications</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="send_publications" id="send_publications1" value="1">
                                                <label class="form-check-label" for="send_publications1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="send_publications" id="send_publications2" value="0">
                                                <label class="form-check-label" for="send_publications2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="publication_social_media">For publication in Social Media/Galicia News?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="publication_social_media" id="publication_social_media1" value="1">
                                                <label class="form-check-label" for="publication_social_media1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="publication_social_media" id="publication_social_media2" value="0">
                                                <label class="form-check-label" for="publication_social_media2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="confidential">Confidential</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="confidential" id="confidential1" value="1">
                                                <label class="form-check-label" for="confidential1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="confidential" id="confidential2" value="0">
                                                <label class="form-check-label" for="confidential2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xxl-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="authorized_publications">Authorized for publications</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="authorized_publications" id="authorized_publications1" value="1">
                                                <label class="form-check-label" for="authorized_publications1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="authorized_publications" id="authorized_publication1" value="0">
                                                <label class="form-check-label" for="authorized_publication1">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xxl-9">
                                    <div class="mb-3">
                                        <label class="form-label" for="authorized_by">Authorized for publications by</label>
                                        <select class="form-select" name="authorized_by" id="authorized_by"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            <option selected disabled>Name of partner</option>
                                            @foreach (\App\Models\Assistant::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Summary of Deal</label>
                                            <textarea name="summary" id="summary"  nonce="newN0nc3ForS3cur1ty" style="display: none"></textarea>
                                            <div id="summary-editor" class="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 200px;"></div> <!-- end Snow-editor-->
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Client Referees/Contacts</label>
                                        <textarea name="client_referees" id="client_referees"  nonce="newN0nc3ForS3cur1ty" style="display: none"></textarea>
                                        <div id="client-editor" class="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 200px;"></div> <!-- end Snow-editor-->
                                    </div>
                                </div> --}}
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomination_dofy">This deal should be considered for nominations to DofY Awards?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nomination_dofy" id="nomination_dofy1" value="1">
                                                <label class="form-check-label" for="nomination_dofy1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nomination_dofy" id="nomination_dofy2" value="0">
                                                <label class="form-check-label" for="nomination_dofy2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="is_cross_border">Is this cross border?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_cross_border" id="is_cross_border1" value="1">
                                                <label class="form-check-label" for="is_cross_border1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_cross_border" id="is_cross_border2" value="0">
                                                <label class="form-check-label" for="is_cross_border2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <input type="date" class="form-control" placeholder="if yes, please include jurisdictions involved" name="is_cross_border" id="is_cross_border"> --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="jurisdiction_ids">Jurisdiction</label>
                                        <select class="form-control" name="jurisdiction_ids" id="jurisdiction_ids" multiple>
                                            @foreach (\App\Models\Jurisdiction::orderby('name')->get() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control" placeholder="Jurisdiction" id="jurisdiction" name="jurisdiction"> --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="highlights">Highlights, why this deal is relevant, innovative, first-of- its-kind, has ESG components, or other?</label>
                                        <textarea name="highlights" id="highlights" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="partner_id">Lead Partner(s)</label>
                                        <select class="form-select" name="partner_id[]" id="partner_id" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="team_members">Other teams members</label>
                                        <select class="form-select" name="team_members[]" id="team_members" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="client_counsel">Client's General Counsel</label>
                                        <input type="text" class="form-control" placeholder="Client's General Counsel" name="client_counsel" id="client_counsel">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="supporting_law_firms">Supporting law firms</label>
                                        <select class="form-control" placeholder="list all law firms involved, role and name of client advised" name="supporting_law_firms[]" id="supporting_law_firms" multiple>
                                            @foreach (\App\Models\LawFirm::orderby('name')->get() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control" placeholder="list all law firms involved, role and name of client advised" name="supporting_law_firms" id="supporting_law_firms"> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="supporting_banks">Supporting banks</label>
                                        <input type="text" class="form-control" placeholder="List all banks involved, roles" name="supporting_banks" id="supporting_banks">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="completion_date">Date of completion</label>
                                        <input type="date" class="form-control" placeholder="Date of completion" name="completion_date" id="completion_date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="coverage_links">Links to press coverage</label>
                                        <input type="text" class="form-control" placeholder="if applicable" name="coverage_links" id="coverage_links">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

            <div style='clear:both'></div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Client Referees/Contacts:</h4>
                        {{-- <p class="card-title-desc">For basic styling—light padding and
                            only horizontal dividers—add the base class <code>.table</code> to any
                            <code>&lt;table&gt;</code>.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0" id="table-contacts">
                                <!-- table mb-0-->
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        {{-- <th>Company</th> --}}
                                        <th>Tel Number</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="no-info">
                                        <td colspan="5">
                                            <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form action="{{ route('events.add-delegate') }}" id="form-contacts">
                            <input type="hidden" name="contact_id" >
                            @csrf
                            <div class="row">
                                <div class="container-delegados mt-4">
                                    <div class="row row-delegados d-none">
                                        <div class="row">
                                            <div class="col mb-3 ">
                                                <label class="form-label">Name</label>
                                                <select class="form-select" name="name" id="contact-name"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                                    <option selected disabled>Select an option</option>
                                                    @foreach (\App\Models\Contact::all() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" class="form-control" name="name"> --}}
                                            </div>
                                            <div class="col mb-3 ">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control" name="position" id="contact-position" readonly>
                                            </div>
                                            {{-- <div class="col mb-3 ">
                                                <label class="form-label">Company</label>
                                                <input type="text" class="form-control" name="company">
                                            </div> --}}
                                            <div class="col mb-3 ">
                                                <label class="form-label">Tel Number</label>
                                                <input type="text" class="form-control" name="tel" id="contact-tel" readonly>
                                            </div>
                                            <div class="col mb-3 ">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" id="contact-email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-danger me-1" id="btn-dismiss-delegate">
                                                <i class="bx bx-x me-1 align-middle"></i> Cerrar
                                            </button>
                                            <button type="submit" class="btn btn-success"
                                                id="btn-save-delegate">
                                                <i class="bx bx-check me-1 align-middle"></i> Agregar Visitante
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
                var client_editor = new Quill('#client-editor', {
                    theme: 'snow',
                    modules: {
                        'toolbar': [['bold', 'italic', 'underline', 'strike'], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['clean']]
                    },
                });
                var summary_editor = new Quill('#summary-editor', {
                    theme: 'snow',
                    modules: {
                        'toolbar': [['bold', 'italic', 'underline', 'strike'], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['clean']]
                    },
                });
                $('#practice_area_ids').select2({
                    // tags: true,
                    theme: 'bootstrap-5',
                })
                $('#branches').select2({
                    theme: 'bootstrap-5'
                })
                $('#client_id').select2({
                    tags: true,
                    theme: 'bootstrap-5',
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
                    theme: 'bootstrap-5'
                })
                $('#supporting_law_firms').select2({
                    // tags: true,
                    theme: 'bootstrap-5'
                })
                $('#team_members').select2({
                    tags: true,
                    theme: 'bootstrap-5'
                })
                $('#jurisdiction_ids').select2({
                    tags: true,
                    theme: 'bootstrap-5'
                })
                $('#contact-name').select2({
                    tags: true,
                    theme: 'bootstrap-5',
                    createTag: function (params) {
                        var term = $.trim(params.term);
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
                    // console.log(e);
                    if( e.params.data ) {
                        var data = e.params.data
                        if (data.newContact){
                            $('#contact-position').removeAttr('readonly')
                            $('#contact-email').removeAttr('readonly')
                            $('#contact-tel').removeAttr('readonly')
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
                    // let company = $('#form-contacts input[name=company]').val()
                    if($('table#table-contacts > tbody  tr.no-info').length == 1) {
                        $('table#table-contacts > tbody  tr.no-info').remove()
                    }
                    // <td>${company}</td>
                    $('table#table-contacts > tbody').append(
                        `<tr class="trcontacts" data-id="${newContact == true ? -1: contact_id}" data-name="${name}" data-position="${position}" data-email="${email}"  data-tel="${tel}">
                            <td>${name}</td>
                            <td>${position}</td>
                            <td>${email}</td>
                            <td>${tel}</td>
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
                    $('#summary').val(summary_editor.container.innerHTML)
                    
                    let client_data = $('#client_id').select2('data')[0];
                    let client_id = client_data.id
                    let newClient = client_data.newClient == undefined ? null : client_data.newClient
                    formData.append('newClient', newClient);
                    var contacts = []
                    $('.trcontacts').each(function (index) {
                        let id = $(this).data('id')
                        let name = $(this).data('name')
                        let position = $(this).data('position')
                        let email = $(this).data('email')
                        let tel = $(this).data('tel')
                        contacts.push({
                            id : id,
                            name : name,
                            position : position,
                            email : email,
                            tel : tel,
                        })
                    })
                    formData.append('contacts', JSON.stringify(contacts));
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
                                location.href = "{{ route('permissions') }}";
                            }, 1000);
                            sal.close();
                        },
                        error: function(request, error) {
                            // console.log(request);
                            // console.log(error);
                            alert("Request: " + JSON.stringify(request));
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
            });
        </script>
    @endsection
