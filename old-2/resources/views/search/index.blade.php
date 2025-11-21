@extends('layouts.master')
@section('title')
    Search
@endsection
@section('page-title')
    Search
@endsection
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-12">

                <!-- Right Sidebar -->
                <div class="mb-3">

                    <div class="card">
                        <div class="card-body">

                            <div class="">
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-md-12">
                                        <div class="pb-3 pb-xl-0">
                                            <form class="email-search">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control bg-light"
                                                        placeholder="Search..." name="q" value="{{ $_GET['q'] }}">
                                                    <span class="bx bx-search font-size-18"></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="pb-3 pb-xl-0 d-none">
                                            <div class="btn-toolbar float-end" role="toolbar">
                                                <div class="btn-group me-2 mb-2">
                                                    <button type="button"
                                                        class="btn btn-primary waves-light waves-effect"><i
                                                            class="fa fa-inbox"></i></button>
                                                    <button type="button"
                                                        class="btn btn-primary waves-light waves-effect"><i
                                                            class="fa fa-exclamation-circle"></i></button>
                                                    <button type="button"
                                                        class="btn btn-primary waves-light waves-effect"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div>
                                                <div class="btn-group me-2 mb-2">
                                                    <button type="button"
                                                        class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-folder"></i> <i
                                                            class="mdi mdi-chevron-down ms-1"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Updates</a>
                                                        <a class="dropdown-item" href="#">Social</a>
                                                        <a class="dropdown-item" href="#">Team Manage</a>
                                                    </div>
                                                </div>
                                                <div class="btn-group me-2 mb-2">
                                                    <button type="button"
                                                        class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Updates</a>
                                                        <a class="dropdown-item" href="#">Social</a>
                                                        <a class="dropdown-item" href="#">Team Manage</a>
                                                    </div>
                                                </div>

                                                <div class="btn-group me-2 mb-2">
                                                    <button type="button"
                                                        class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        More <i class="mdi mdi-dots-vertical ms-2"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Mark as Unread</a>
                                                        <a class="dropdown-item" href="#">Mark as Important</a>
                                                        <a class="dropdown-item" href="#">Add to Tasks</a>
                                                        <a class="dropdown-item" href="#">Add Star</a>
                                                        <a class="dropdown-item" href="#">Mute</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h6 class="text-muted text-uppercase mb-3">Resultados para "{{ request('q') }}"</h6>
                                    <div class="mb-2">
                                        @if (count($deals) <= 0 &&  count($travels) <= 0)
                                            <div>
                                                <p class="text-muted text-center">No se han encontrado resultados para tu búsqueda "{{ request('q') }}"</p>
                                            </div>
                                        @else
                                            <div class="list-group list-group-flush">
                                                @foreach ($deals as $item)    
                                                <div class="list-group-item list-group-item-action">
                                                    <div class="w-100 d-flex justify-content-between">
                                                        <div>
                                                            <a href="{{ route('deals.edit', ['id' => $item->id]) }}" class="mb-1 h5 me-2">{{ $item->name }} </a>
                                                            <small class="badge rounded-pill bg-warning text-bg-secondary me-2">Deal Report</small>
                                                        </div>
                                                        <small>{{ $item->date_completion }}</small>
                                                    </div>
                                                    <div>@foreach ($item->practice_areas as $i) <a href="#" class="badge bg-primary-subtle text-primary">{{$i->name}}</a> @endforeach</div>
                                                    <small class="mb-0">{{ substr(strip_tags($item->summary), 0,150) }}</small>
                                                    <div class="d-flex justify-content-between">

                                                        <p class="mb-1">
                                                            <small class="mb-0 fw-semibold">Clients: </small>
                                                            @foreach ($item->clients as $i) <a href="#" class="badge bg-primary-subtle text-primary">{{$i->name}}</a> @endforeach
                                                        </p>
                                                        <p class="mb-1">
                                                            <small class="mb-0 fw-semibold">Contacts: </small>
                                                            @foreach ($item->contacts as $i) <a href="#" class="badge bg-dark">{{$i->name}}</a> @endforeach
                                                        </p>
                                                        <p class="mb-1">
                                                            <small class="mb-0 fw-semibold">Partners: </small>
                                                            @foreach ($item->partners as $i) <a href="#" class="link-body-emphasis">{{$i->name}}</a> @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @foreach ($travels as $item)    
                                                <div class="list-group-item ">
                                                    <div class="w-100 d-flex justify-content-between">
                                                        <div>
                                                            <a href="{{ route('travels.edit', ['id' => $item->id]) }}" class="mb-1 h5 me-2">{{ $item->name }}</a>
                                                            <small class="badge rounded-pill bg-success me-2">Travel Report</small>
                                                        </div>
                                                        <small>{{ $item->start_date }}</small>
                                                    </div>
                                                    <div>@foreach ($item->practice_areas as $i) <a href="#" class="badge bg-primary-subtle text-primary">{{$i->name}}</a> @endforeach</div>
                                                    <small class="mb-0">{{ substr(strip_tags($item->purpose), 0, 150) }}</small>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-1">
                                                            <small class="mb-0 fw-semibold">Clients: </small>
                                                            @foreach ($item->clients as $i) <a href="#" class="badge bg-primary-subtle text-primary">{{$i->name}}</a> @endforeach
                                                        </p>
                                                        <p class="mb-1">
                                                            <small class="mb-0 fw-semibold">Contacts: </small>
                                                            @foreach ($item->contacts as $i) <a href="#" class="badge bg-dark">{{$i->name}}</a> @endforeach
                                                        </p>
                                                        <p class="mb-1">
                                                            <small class="mb-0 fw-semibold">Partners: </small>
                                                            @foreach ($item->partners as $i) <a href="#" class="link-body-emphasis">{{$i->name}}</a> @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> <!-- end Col-9 -->

            </div>
        </div><!-- End row -->

        </div>
        <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Modal -->
        <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="composemodalTitle">New Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="To">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="mb-3">
                                <div id="email-editor"></div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send <i
                                class="fab fa-telegram-plane ms-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <!-- ckeditor -->
        <script src="{{ URL::asset('libs/@ckeditor/ckeditor5-build-classic/ckeditor.js') }}"></script>

        <!-- email editor init -->
        <script src="{{ URL::asset('js/pages/email-editor.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
    @endsection
