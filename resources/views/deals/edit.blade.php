@extends('layouts.master')
@section('title')
    New Deal
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
    New Deal
@endsection
@section('breadcrumb')
    {{-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('deals') }}">Deals</a></li>
            <li class="breadcrumb-item active">New Deal</li>
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
                    <h5 class="card-title">Edit Deal 
                        {{-- <span class="text-muted fw-normal ms-2">(834)</span> --}}
                    </h5> 
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('deals') }}">Deals</a></li>
                            <li class="breadcrumb-item active">Edit Deal</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <a href="{{ route('deals.pdf', ['id' => $deal->id]) }}" target="_blank" id="btn-previous-report" class="btn btn-dark">
                            <i class="bx bx-cloud-download me-1"></i> Download Deal Report
                        </a>
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
                        <form action="{{ route('deals.update', ['id' => $deal->id]) }}" id="form-update" method="POST">
                            <input type="hidden" name="id" value="{{ $deal->id }}">
                            <div class="row">
                                @csrf
                                <div class="col-md-6 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="practice_area_ids">Practice Area(s) involved*</label>
                                        @php
                                            if ($deal->practices_areas) 
                                                $practice_areas = $deal->practices_areas->pluck('id') ->toArray();
                                             else 
                                                $practice_areas = [];
                                        @endphp
                                        <select class="form-select" name="practice_area_ids[]"
                                            id="practice_area_ids" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @foreach (\App\Models\PracticeArea::where('is_interest_area', false)->get() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $practice_areas))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="branches">Register this issue in office*</label>
                                        @php
                                            if ($deal->branches) 
                                                $branches = $deal->branches;
                                             else 
                                                $branches = [];
                                        @endphp
                                        <select class="form-select" name="branches[]" id="branches" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            <option value="CDMX" @selected(in_array('CDMX', $branches))>CDMX</option>
                                            <option value="Monterrey" @selected(in_array( 'Monterrey', $branches))>Monterrey</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name of Deal*</label>
                                        <input type="text" class="form-control" placeholder="Name of Deal" id="name" name="name" value="{{ $deal->name }}">
                                    </div>
                                </div>
                                <div class="col-md-5 col-xxl-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="send_publications">Send to publications*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="send_publications" id="send_publications1" value="1" @checked($deal->send_publications)>
                                                <label class="form-check-label" for="send_publications1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="send_publications" id="send_publications2" value="0" @checked(!$deal->send_publications)>
                                                <label class="form-check-label" for="send_publications2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="authorized_by">Authorized for publications by</label>
                                        <select class="form-select" name="authorized_by" id="authorized_by"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            <option selected disabled>Name of partner</option>
                                            @foreach (\App\Models\Assistant::all() as $item)
                                                <option value="{{ $item->id }}" @selected($item->id == $deal->authorized_by)>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="confidential">Confidential*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="confidential" id="confidential1" value="1" @checked($deal->confidential)>
                                                <label class="form-check-label" for="confidential1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="confidential" id="confidential2" value="0" @checked(!$deal->confidential)>
                                                <label class="form-check-label" for="confidential2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="client_id">Name of Client*</label>
                                        <select class="form-select" name="client_id[]" id="client_id"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;" multiple>
                                            <option disabled >Select a option</option>
                                            @php
                                                $client_ids = $deal->clients->pluck('id') ->toArray();
                                            @endphp
                                            @foreach (\App\Models\Client::all() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $client_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="summary">Summary of Deal*</label>
                                            <textarea name="summary" id="summary" class="form-control" rows="6">{{ $deal->summary }}</textarea>
                                            {{-- <div id="summary-editor" class="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 200px;"></div> <!-- end Snow-editor--> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-7">
                                    <div class="mb-3">
                                        <label class="form-label" for="publication_social_media">For publication in Social Media/Galicia News?*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="publication_social_media" id="publication_social_media1" value="1" @checked($deal->publication_in_social_media)>
                                                <label class="form-check-label" for="publication_social_media1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="publication_social_media" id="publication_social_media2" value="0" @checked(!$deal->publication_in_social_media)>
                                                <label class="form-check-label" for="publication_social_media2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-5">
                                    <div class="mb-3">
                                        <label class="form-label" for="deal_size">Deal Size*</label>
                                        <div class="input-group">
                                            <span class="input-group-text">US$</span>
                                            <input type="text" class="form-control" placeholder="USD" id="deal_size" name="deal_size" value="{{ $deal->deal_size }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="highlights">Highlights, why this deal is relevant, innovative, first-of- its-kind, has ESG components, or other?*</label>
                                        <textarea name="highlights" id="highlights" class="form-control" rows="10">{{ $deal->highlights }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomination_dofy">This deal should be considered for nominations to DofY Awards?*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nomination_dofy" id="nomination_dofy1" value="1" @checked($deal->nomination_dofy_awards)>
                                                <label class="form-check-label" for="nomination_dofy1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="nomination_dofy" id="nomination_dofy2" value="0" @checked(!$deal->nomination_dofy_awards)>
                                                <label class="form-check-label" for="nomination_dofy2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="partner_id">Lead Partner(s)*</label>
                                        <select class="form-select" name="partner_id[]" id="partner_id" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @php
                                                $partner_ids = [];
                                                foreach ($deal->partners as $key => $partner) {
                                                    if($partner->pivot->is_lead)
                                                        $partner_ids[] = $partner->id;
                                                }
                                            @endphp
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $partner_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="team_members">Other teams members*</label>
                                        <select class="form-select" name="team_members[]" id="team_members" multiple="multiple"  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
                                            @php
                                                $team_members = [];
                                                foreach ($deal->partners as $key => $partner) {
                                                    if(!$partner->pivot->is_lead)
                                                        $team_members[] = $partner->id;
                                                }
                                            @endphp
                                            @foreach (\App\Models\Partner::all() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $team_members))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="partners_role_contribution">Partners’ role/contribution</label>
                                        <textarea name="partners_role_contribution" id="partners_role_contribution" class="form-control" rows="5">{{ $deal->partners_role_contribution }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="client_counsel">Client's General Counsel</label>
                                        <textarea name="client_counsel" id="client_counsel" class="form-control" rows="5">{{ $deal->client_counsel }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="supporting_law_firms">Supporting law firms</label>
                                        <select class="form-control" placeholder="list all law firms involved, role and name of client advised" name="supporting_law_firms[]" id="supporting_law_firms"   nonce="newN0nc3ForS3cur1ty" style="width: 100%" multiple>
                                            @php
                                                $supporting_law_firms = $deal->law_firms->pluck('id') ->toArray();
                                            @endphp
                                            @foreach (\App\Models\LawFirm::orderby('name')->get() as $item)
                                                <option value="{{ $item->id }}"  @selected(in_array($item->id, $supporting_law_firms))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control" placeholder="list all law firms involved, role and name of client advised" name="supporting_law_firms" id="supporting_law_firms"> --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="law_firms_client_advised">Law firms involved, role and name of client advised</label>
                                        <textarea name="law_firms_client_advised" id="law_firms_client_advised" class="form-control" rows="5">{{ $deal->law_firms_client_advised }}</textarea>
                                        {{-- <input type="text" class="form-control" placeholder="Client's General Counsel" name="client_counsel" id="client_counsel"> --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="supporting_banks">Supporting banks</label>
                                        <input type="text" class="form-control" placeholder="List all banks involved, roles" name="supporting_banks" id="supporting_banks">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="completion_date">Date of completion*</label>
                                        <input type="date" class="form-control" placeholder="Date of completion" name="completion_date" id="completion_date" value="{{ $deal->date_completion }}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="is_cross_border">Is this cross border?*</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_cross_border" id="is_cross_border1" value="1" @checked($deal->is_cross_border)>
                                                <label class="form-check-label" for="is_cross_border1">
                                                  Yes
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_cross_border" id="is_cross_border2" value="0" @checked(!$deal->is_cross_border)>
                                                <label class="form-check-label" for="is_cross_border2">
                                                  No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xxl-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="jurisdiction_ids">Jurisdiction</label>
                                        <select class="form-control" name="jurisdiction_ids[]" id="jurisdiction_ids"  nonce="newN0nc3ForS3cur1ty" style="width: 100%" multiple>
                                            @foreach (\App\Models\Jurisdiction::orderby('name')->get() as $item)
                                                <option value="{{ $item->id }}" @selected(in_array($item->id, $jurisdiction_ids))>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="coverage_links">Links to press coverage*</label>
                                        <input type="text" class="form-control" placeholder="if applicable" name="coverage_links" id="coverage_links" value="{{ $deal->link_press_converage }}">
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
                                        <th>Company</th>
                                        <th>Tel Number</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($deal->contacts as $contact)
                                        <tr class="trcontacts" data-id="{{ $contact->id }}" data-name="{{ $contact->name }}" data-position="{{ $contact->job_position }}" data-company="{{ $contact->company }}" data-email="{{ $contact->email }}"  data-tel="{{ $contact->tel }}">
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->job_position }}</td>
                                            <td>{{ $contact->company }}</td>
                                            <td>{{ $contact->tel }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn-delete-contact" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger">
                                                    <i class="bx bx-trash-alt font-size-18 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty    
                                        <tr class="no-info">
                                            <td colspan="6">
                                                <p class="text-secondary text-center mt-0 mb-0">No hay información para mostrar</p>
                                            </td>
                                        </tr>
                                    @endforelse
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
                                                <input type="text" class="form-control" name="position" id="contact-position">
                                            </div>
                                            <div class="col mb-3 ">
                                                <label class="form-label">Company</label>
                                                <input type="text" class="form-control" name="company" id="contact-company">
                                            </div>
                                            <div class="col mb-3 ">
                                                <label class="form-label">Tel Number</label>
                                                <input type="text" class="form-control" name="tel" id="contact-tel" >
                                            </div>
                                            <div class="col mb-3 ">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" id="contact-email" >
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-danger me-1" id="btn-dismiss-delegate">
                                                <i class="bx bx-x me-1 align-middle"></i> Close
                                            </button>
                                            <button type="submit" class="btn btn-success"
                                                id="btn-save-delegate">
                                                <i class="bx bx-check me-1 align-middle"></i> Add Contact
                                            </button>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button id="btn-agregar-delegados" type="button"
                                            class="btn btn-link">Add Contact</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div style='clear:both'></div>

            <div class="col-md-6">
                <div class="card card-h-100">
                    <div class="card-body">
                        <h3 class="card-title">Party 1</h3>
                        <form action="{{ route('deals.store') }}" id="form-party_1" method="POST">
                            <input type="hidden" name="id_party_1" id="id_party_1" value="{{ $deal->parties[0]->id ?? '0' }}">
                            <div class="row">
                                @csrf
                                <div class="col-md-12 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name_party_1">Name of Party</label>
                                        <input type="text" class="form-control" placeholder="Name of Party" id="name_party_1" name="name_party_1" value="{{ $deal->parties[0]->name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="role_1">Role</label>
                                        <input type="text" class="form-control" placeholder="Buyer, seller, target or other" id="role_1" name="role_1" value="{{ $deal->parties[0]->role ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="in_house_counsel_1">In-house Counsel Team on the deal</label>
                                            <textarea name="in_house_counsel_1" id="in_house_counsel_1" class="form-control" rows="6">{{ $deal->parties[0]->in_house_counsel ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="external_counsel_1">External counsel</label>
                                            <textarea name="external_counsel_1" id="external_counsel_1" class="form-control" rows="6" placeholder="Submit details of each law firm that advised that party, the country in which it is based, and the names and titles of lawyers working on the deal">{{ $deal->parties[0]->external_counsel ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-md-6">
                <div class="card card-h-100">
                    <div class="card-body">
                        <h3 class="card-title">Party 2</h3>
                        <form action="{{ route('deals.store') }}" id="form-party_2" method="POST">
                            <input type="hidden" name="id_party_2" id="id_party_2" value="{{ $deal->parties[1]->id ?? '0' }}">
                            <div class="row">
                                @csrf
                                <div class="col-md-12 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name_party_2">Name of Party</label>
                                        <input type="text" class="form-control" placeholder="Name of Party" id="name_party_2" name="name_party_2" value="{{ $deal->parties[1]->name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xxl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="role_2">Role</label>
                                        <input type="text" class="form-control" placeholder="Buyer, seller, target or other" id="role_2" name="role_2" value="{{ $deal->parties[1]->role ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="in_house_counsel_2">In-house Counsel Team on the deal</label>
                                            <textarea name="in_house_counsel_2" id="in_house_counsel_2" class="form-control" rows="6">{{ $deal->parties[1]->in_house_counsel ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="external_counsel_2">External counsel</label>
                                            <textarea name="external_counsel_2" id="external_counsel_2" class="form-control" rows="6" placeholder="Submit details of each law firm that advised that party, the country in which it is based, and the names and titles of lawyers working on the deal">{{ $deal->parties[1]->external_counsel ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

            <div style='clear:both'></div>

            <div class="col-12">
                <div class="liveAlertPlaceholder"></div>
            </div>

            <div class="col-md-12">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
                    <div>
                        <button type="button" onclick="document.getElementById('btn-save').click()" class="btn btn-warning text-black">
                            <i class="bx bx-save me-1"></i> Save
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
                /** 
                 * Start
                 * */
                // var summary_editor = new Quill('#summary-editor', {
                //     theme: 'snow',
                //     // modules: {
                //     //     'toolbar': [['bold', 'italic', 'underline', 'strike'], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['clean']]
                //     // },
                // });
                // var summary = document.getElementById('summary');
                // summary_editor.on('text-change', (delta, oldDelta, source) => {
                //     if (source == 'api') {
                //         // console.log('An API call triggered this change.');
                //     } else if (source == 'user') {
                //         // console.log('A user action triggered this change.');
                //     }
                //     summary.value = summary_editor.root.innerHTML;
                // });
                // summary.addEventListener('input', function() {
                //     summary_editor.root.innerHTML = summary.value;
                // });
                // summary_editor.pasteHTML(' $deal->summary ')
                // summary_editor.value = " $deal->summary "
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
                    // tags: true,
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
                        `<tr class="trcontacts" data-id="${newContact == true ? -1: contact_id}" data-name="${name}"  data-company="${company}" data-position="${position}" data-email="${email}"  data-tel="${tel}">
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
                    $('#form-update').submit()
                })

                $('#form-update').submit(function (e) {
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
                    // // console.log(summary_editor.getContents());
                    // // console.log(summary_editor.container.innerHTML);
                    // $('#summary').val(summary_editor.container.innerHTML)
                    
                    // let client_data = $('#client_id').select2('data')[0];
                    // let client_id = client_data.id
                    // let newClient = client_data.newClient == undefined ? null : client_data.newClient
                    // formData.append('newClient', newClient);
                    var contacts = []
                    $('.trcontacts').each(function (index) {
                        let id = $(this).data('id')
                        let name = $(this).data('name')
                        let position = $(this).data('position')
                        let email = $(this).data('email')
                        let tel = $(this).data('tel')
                        let company = $(this).data('company')
                        contacts.push({
                            id : id,
                            name : name,
                            position : position,
                            email : email,
                            tel : tel,
                            company : company,
                        })
                    })
                    formData.append('client_id', JSON.stringify($('#client_id').select2('data')));
                    formData.append('contacts', JSON.stringify(contacts));
                    formData.append('id_party[]', $('#id_party_1').val())
                    formData.append('id_party[]', $('#id_party_2').val())
                    formData.append('name_party[]', $('#name_party_1').val())
                    formData.append('name_party[]', $('#name_party_2').val())
                    formData.append('role[]', $('#role_1').val())
                    formData.append('role[]', $('#role_2').val())
                    formData.append('in_house_counsel[]', $('#in_house_counsel_1').val())
                    formData.append('in_house_counsel[]', $('#in_house_counsel_2').val())
                    formData.append('external_counsel[]', $('#external_counsel_1').val())
                    formData.append('external_counsel[]', $('#external_counsel_2').val())
                    dismiss_alert()
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        dataType: 'json',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // console.log(data);
                            alertify.success('Se ha guardado correctamente');
                            setTimeout(() => {
                                // location.href = "{{ route('deals') }}";
                                location.reload();
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
                $('#btn-agregar-delegados').click(function () {
                    $('.row-delegados').removeClass('d-none')
                    $('#btn-agregar-delegados').addClass('d-none')
                })
                $('#btn-dismiss-delegate').click(function () {
                    $('.row-delegados').addClass('d-none')
                    $('#btn-agregar-delegados').removeClass('d-none')
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
                                    <td colspan="6">
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
                // var deal_size = IMask(document.getElementById('deal_size'), {
                //     mask: 'num',
                //     blocks: {
                //         num: {
                //             // nested masks are available!
                //             mask: Number,
                //             thousandsSeparator: ',',
                //             radix: '.',
                //             min:0,
                //             padFractionalZeros: true,
                //         }
                //     }
                // });

                var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
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
