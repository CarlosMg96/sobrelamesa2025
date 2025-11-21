@extends('layouts.master')

@section('title', 'Mis Contactos')
@section('page-title', 'Mis Contactos')

@section('styles')
    <style nonce="newN0nc3ForS3cur1ty" >

        .bg-color {
            background-color: #1D1D1D;
        }

        .bg-amber {
            background-color: #FFC629 !important;
        }

        .text-amber {
            color: #FFC629 !important;
        }

        .ff-gelasio{
            font-family: 'Gelasio', serif;
        }
    </style>
@endsection

@section('body')
<body data-topbar="dark" class="bg-color"  nonce="newN0nc3ForS3cur1ty" style="background-color: #1D1D1D;">
@endsection

@section('content')
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title text-white">Mis Contactos <span class="text-muted fw-normal ms-2">({{ $contacts->total() }})</span></h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                <div>
                    <a href="{{ route('contacts.create') }}" class="btn bg-amber text-dark"  nonce="newN0nc3ForS3cur1ty" style="background-color: #FFC629; border-color: #FFC629;">
                        <i class="bx bx-plus me-1"></i> Agregar Nuevo
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        @forelse($contacts as $contact)
            <div class="col-xl-3 col-sm-6">
                <div class="card"  nonce="newN0nc3ForS3cur1ty" style="background-color: #2B2B2B; border-color: #333; border-radius: none; box-shadow: none;">
                    <div class="card-body">

                        <div class="d-flex align-items-center">
                            <div>
                                @if($contact->photo)
                                    <img src="{{ asset($contact->photo) }}" alt="Foto" class="avatar-md rounded-circle img-thumbnail"  nonce="newN0nc3ForS3cur1ty" style="background-color: #FFC629; border-color: #FFC629;">
                                @else
                                    <div class="avatar-md">
                                        <div class="avatar-title bg-amber display-6 m-0 rounded-circle"  nonce="newN0nc3ForS3cur1ty" style="background-color: #FFC629; border-color: #FFC629;">
                                            <i class="bx bxs-user-circle"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 ms-3">
                                <h4 class="font-size-16 mb-1 text-white ff-gelasio"  nonce="newN0nc3ForS3cur1ty" style="color: #FFF;">
                                    {{ $contact->name }}
                                </h4>
                                @if($contact->job_position)
                                    <span class="badge bg-amber mb-0">{{ $contact->job_position }}</span>
                                @endif
                            </div>
                        </div>

                        <p class="text-muted mt-3 mb-0 text-white">
                            @if($contact->company) {{ $contact->company }} <br> @endif
                            @if($contact->specialty) <strong>Especialidad:</strong> {{ $contact->specialty }} <br> @endif
                            @if($contact->website) <strong>Sitio:</strong> <a href="{{ $contact->website }}" target="_blank">{{ $contact->website }}</a> @endif
                        </p>

                        <div class="mt-3 pt-1 text-white">
                            @if($contact->tel)
                                <p class="mb-0">
                                    <i class="mdi mdi-phone font-size-15 align-middle pe-2"></i>
                                    {{ $contact->tel }}
                                </p>
                            @endif

                            @if($contact->mobile)
                                <p class="mb-0 mt-2">
                                    <i class="mdi mdi-cellphone font-size-15 align-middle pe-2"></i>
                                    {{ $contact->mobile }}
                                </p>
                            @endif

                            @if($contact->email)
                                <p class="mb-0 mt-2">
                                    <i class="mdi mdi-email font-size-15 align-middle pe-2"></i>
                                    {{ $contact->email }}
                                </p>
                            @endif

                            @if($contact->city || $contact->region || $contact->country)
                                <p class="mb-0 mt-2">
                                    <i class="mdi mdi-google-maps font-size-15 align-middle pe-2"></i>
                                    {{ $contact->city ?? '' }}, {{ $contact->region ?? '' }}, {{ $contact->country ?? '' }}
                                </p>
                            @endif
                        </div>

                        <div class="d-flex gap-2 pt-4">
                            <a href="mailto:{{ $contact->email }}" class="btn bg-amber text-dark btn-sm w-50"  nonce="newN0nc3ForS3cur1ty" style="background-color: #FFC629; border-color: #FFC629;">
                                <i class="bx bx-message-square-dots me-1" ></i> Contactar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No hay contactos registrados.
                </div>
            </div>
        @endforelse
    </div>

    <div class="row g-0 align-items-center pb-3">
        <div class="col-sm-12 d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/app.js') }}"></script>
@endsection
