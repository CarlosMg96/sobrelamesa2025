@extends('layouts.master')

@section('title', 'Miembros del área')
@section('css')
    <!-- App js -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <style nonce="newN0nc3ForS3cur1ty" >
        .custom-card {
            background-color: #1a1a1a;
            overflow: hidden;
        }

        .custom-card-header {
            background-color: #FFC72C;
            padding: 1.25rem;
            display: flex;
            align-items: center;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .back-button {
            color: #000;
            text-decoration: none;
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }

        .area-title {
            margin: 0;
            flex-grow: 1;
            text-align: center;
            color: #000;
            font-size: 1.25rem;
            font-weight: 500;
        }

        .custom-card-content {
            padding: 1.5rem;
            background-color: #131516;
            color: #fff;
        }

        .input-area {
            background-color: #2d2d2d;
            border-radius: 10px;
            padding: 5px;
        }

        .input-area-text {
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem 0 0 0.25rem;
        }

        .form-control {
            background-color: #2d2d2d;
            border: 1px solid #444;
            color: #fff;
        }

        .form-control:focus {
            background-color: #3d3d3d;
            color: #fff;
            border-color: #FFC72C;
            box-shadow: 0 0 0 0.25rem rgba(255, 199, 44, 0.25);
        }

        .user-card {
            transition: transform 0.2s;
        }

        .user-card:hover {
            transform: translateY(-5px);
        }

        .hover-shadow {
            transition: all 0.3s ease;
            background-color: #2d2d2d;
            border: 1px solid #444;
        }

        .hover-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3) !important;
        }

        .text-yellow {
            color: #FFC72C !important;
        }

        /* CSS classes to replace inline styles */
        .user-card-width {
            width: inherit;
        }

        .avatar-container-50 {
            width: 50px;
            height: 50px;
        }

        .avatar-img-cover {
            object-fit: cover;
        }

        .avatar-img-conditional {
            /* Display will be managed by PHP conditional classes */
        }

        .avatar-fallback-conditional {
            /* Display will be managed by PHP conditional classes */
        }

        .modal-header-padding {
            padding: 2rem 1rem 2rem;
        }

        .modal-close-position {
            right: 1.5rem;
            top: 1.5rem;
        }

        .avatar-container-120 {
            width: 120px;
            height: 120px;
        }

        .avatar-initials-large {
            font-size: 3rem;
        }

        .avatar-initials-conditional {
            /* Display will be managed by PHP conditional classes */
        }

        .user-name-large {
            font-size: 1.5rem;
        }

        .js-avatar-initials {
            width: 120px;
            height: 120px;
            font-size: 3rem;
            border: 4px solid #f8f9fa;
        }

        /* Utility classes for conditional display */
        .js-hidden {
            display: none !important;
        }

        .js-visible {
            display: block !important;
        }

        .js-flex {
            display: flex !important;
        }
    </style>
@stop

@section('body')

    <body data-topbar="dark" class="bg-dark">
    @stop
    @section('content')
        <div class="container py-4">
            <div class="custom-card">
                <!-- Header -->
                <div class="custom-card-header">
                    <a href="{{ route('directory.index') }}" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h2 class="area-title">{{ $area->name }}</h2>
                </div>

                <div class="custom-card-content">
                    <!-- Search Bar -->
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-0 text-white"><i class="fas fa-search"></i></span>
                            <input type="text" id="userSearch" class="form-control border-0 bg-dark text-white"
                                placeholder="Buscar por nombre..." value="{{ request('search') }}">
                            @if (request()->has('search'))
                                <a href="{{ route('directory.area', $area) }}" class="btn btn-outline-secondary"
                                    type="button">
                                    <i class="fas fa-times"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <div id="usersContainer">
                        @forelse($users as $user)
                            <div class="col-12 col-md-6 col-lg-4 mb-3 user-card user-card-width" nonce="newN0nc3ForS3cur1ty"
                                data-name="{{ strtolower($user->name ?? $user->directory_name) }}"
                                data-work-team="{{ strtolower($user->work_team ?? '') }}">
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                    data-bs-target="#userModal{{ $user->id }}">
                                    <div class="d-flex align-items-center p-3 rounded-3 hover-shadow">
                                        <!-- Avatar -->
                                        @php
                                            $firstInitial = !empty($user->first_name)
                                                ? strtoupper(substr(trim($user->first_name), 0, 1))
                                                : '';
                                            $lastInitial = !empty($user->last_name)
                                                ? strtoupper(substr(trim($user->last_name), 0, 1))
                                                : '';
                                            $initial = trim($firstInitial . $lastInitial);
                                            $hasAvatar = !empty($user->avatar);
                                            $avatarFile = $user->avatar ?? null;
                                            $avatarPath = public_path(
                                                'build/images/users/' . $avatarFile,
                                            );
                                            $avatarExists =
                                                $avatarFile && File::exists($avatarPath);
                                            $fullName = trim(
                                                ($user->first_name ?? '') . ' ' . ($user->last_name ?? ''),
                                            );
                                        @endphp
                                        <div class="position-relative avatar-container avatar-container-50">
                                            @if ($avatarExists)
                                                <img src="{{ $avatarPath }}" alt="{{ $fullName }}"
                                                    class="rounded-circle border border-3 border-white w-100 h-100 avatar-img avatar-img-cover @if(!$avatarExists) js-hidden @endif"
                                                    data-nonce="newN0nc3ForS3cur1ty">
                                            @endif
                                            <div class="rounded-circle border border-3 border-white bg-secondary text-white d-flex align-items-center justify-content-center w-100 h-100 avatar-fallback @if($avatarExists) js-hidden @else js-flex @endif"
                                                data-nonce="newN0nc3ForS3cur1ty">
                                                {{ $initial }}
                                            </div>
                                        </div>

                                        <!-- User Info -->
                                        <div class="flex-grow-1 m-2">
                                            <h6 class="mb-0 text-white">
                                                {{ $user->name ?? $user->first_name . ' ' . $user->last_name }}</h6>
                                            @if ($user->work_team)
                                                <small class="text-muted">
                                                    {{ $user->practiceAreas->first()->name ?? 'Sin equipo' }}</small>
                                            @endif
                                        </div>

                                        <!-- Chevron -->
                                        <div class="ms-2">
                                            <i class="fas fa-chevron-right text-muted"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="userModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content overflow-hidden">
                                        <!-- Upper Half - Black Background -->
                                        <div class="bg-dark text-white text-center position-relative modal-header-padding"
                                            nonce="newN0nc3ForS3cur1ty">
                                            <button type="button" class="btn btn-dark btn-sm position-absolute modal-close-position"
                                                nonce="newN0nc3ForS3cur1ty" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fas fa-times"></i>
                                            </button>

                                            <!-- Avatar -->
                                            <div class="d-flex justify-content-center mb-3"
                                                id="modalAvatarContainer{{ $user->id }}">
                                                @php
                                                    $firstInitial = !empty($user->first_name)
                                                        ? strtoupper(substr(trim($user->first_name), 0, 1))
                                                        : '';
                                                    $lastInitial = !empty($user->last_name)
                                                        ? strtoupper(substr(trim($user->last_name), 0, 1))
                                                        : '';
                                                    $initials = trim($firstInitial . $lastInitial);
                                                    $hasAvatar = !empty($user->avatar);
                                                    $avatarFile = $user->avatar ?? null;
                                                    $avatarPath = public_path(
                                                        'build/images/users/' . $avatarFile,
                                                    );
                                                    $avatarExists =
                                                        $avatarFile && File::exists($avatarPath);
                                                    $fullName = trim(
                                                        ($user->first_name ?? '') . ' ' . ($user->last_name ?? ''),
                                                    );
                                                @endphp

                                                <div class="position-relative avatar-container-120" nonce="newN0nc3ForS3cur1ty">
                                                    @if ($avatarExists)
                                                        <img src="{{ $avatarPath }}" alt="{{ $fullName }}"
                                                            class="rounded-circle border border-3 border-white w-100 h-100 avatar-img-cover"
                                                            nonce="newN0nc3ForS3cur1ty"
                                                            onerror="this.onerror=null;
                          this.style.display='none';
                          this.parentNode.querySelector('.initials').style.display='flex';">
                                                    @endif

                                                    <div class="initials rounded-circle border border-3 border-white bg-secondary text-white 
                    d-flex align-items-center justify-content-center w-100 h-100 avatar-initials-large @if($hasAvatar) js-hidden @endif"
                                                        nonce="newN0nc3ForS3cur1ty">
                                                        {{ $initials ?: strtoupper(substr($user->name ?? $user->directory_name, 0, 1)) }}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Name -->
                                            <h4 class="mb-0 fw-bold text-white user-name-large" nonce="newN0nc3ForS3cur1ty">
                                                {{ $user->name ?? $user->first_name . ' ' . $user->last_name }}
                                            </h4>

                                            <!-- Work Team -->
                                            @if ($user->work_team)
                                                <div class="p-3 rounded-3">
                                                    <p class="mb-0 fw-medium">
                                                        {{ $user->practiceAreas->first()->name ?? 'Sin equipo' }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Lower Half - White Background -->
                                        <div class="modal-body text-center px-5 pb-4 pt-5">

                                            <!-- Contact Info -->
                                            <div class="mb-4">
                                                @if ($user->direct_number)
                                                    <div
                                                        class="d-flex align-items-center justify-content-center mb-2 text-black">
                                                        <i class="fas fa-phone-alt me-2 text-muted"></i>
                                                        <span>{{ $user->direct_number }}</span>
                                                    </div>
                                                @endif
                                                @php
                                                    $mapSection = $user->map_section ?? null;
                                                    $floor = null;
                                                    $section = null;

                                                    if ($user->map_section) {
                                                        $floor = substr($mapSection, 1, strpos($mapSection, '-') - 1);
                                                        $section = substr($mapSection, strpos($mapSection, '-') + 1);
                                                    }

                                                    echo '<div class="d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                                                        <span class="text-black">' .
                                                        ($floor == 23 || $floor == null ? 'Pendiente de asignar' : 'Piso ' . $floor . ' / Sección ' . $section) .
                                                        '</span>
                                                    </div>';
                                                @endphp
                                            </div>

                                            <!-- Action Button -->
                                            @if ($floor && $floor != 23)
                                                <div class="mt-3">
                                                    <a href="{{ route('maps.index', ['floor' => $floor]) }}?section={{ $mapSection }}"
                                                        class="btn btn-sm btn-outline-dark">
                                                        <i class="fas fa-map-marker-alt me-1"></i> Ver ubicación
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-4">
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No hay miembros en este area</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <style nonce="newN0nc3ForS3cur1ty" >
            /* Styles remain the same */
        </style>
    @endsection

    @push('scripts')
        <script src="{{ asset('js/pages/avatar-handler.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <script nonce="newN0nc3ForS3cur1ty">
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('userSearch');
                const userCards = document.querySelectorAll('.user-card');

                // Prevenir el envío del formulario al presionar Enter
                searchInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        return false;
                    }
                });

                // Manejar la búsqueda
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.trim().toLowerCase();

                    userCards.forEach(card => {
                        const name = card.dataset.name.toLowerCase();
                        const workTeam = (card.dataset.workTeam || '').toLowerCase();

                        const shouldDisplay = name.includes(searchTerm) || workTeam.includes(
                            searchTerm);
                        if (shouldDisplay) {
                            card.classList.remove('js-hidden');
                        } else {
                            card.classList.add('js-hidden');
                        }
                    });
                });

                // Aplicar filtro inicial si hay un término de búsqueda en la URL
                const urlParams = new URLSearchParams(window.location.search);
                const searchParam = urlParams.get('search');
                if (searchParam) {
                    searchInput.value = searchParam;
                    searchInput.dispatchEvent(new Event('input'));
                }

                @foreach ($users as $user)
                    // Function to display initials for user {{ $user->id }}
                    function displayInitials{{ $user->id }}(img) {
                        const avatarContainer = document.getElementById('modalAvatarContainer{{ $user->id }}');
                        const name = "{{ $user->name ?? $user->directory_name }}";
                        const nameParts = name.split(' ');
                        let initials = '';

                        if (nameParts.length >= 1) {
                            initials += nameParts[0].charAt(0).toUpperCase();
                            if (nameParts.length > 1 && nameParts[1].length >
                                0) { //Check for second name and its length
                                initials += nameParts[1].charAt(0).toUpperCase();
                            }
                        }
                        initials = initials.substring(0, 2); // Truncate to first two initials

                        avatarContainer.innerHTML = `
                            <div class="d-flex align-items-center justify-content-center bg-dark text-white rounded-circle js-avatar-initials"
                                 nonce="newN0nc3ForS3cur1ty">
                            ${initials}
                            </div>`;
                        img.onerror = null; //Remove the event handler to prevent infinite loops
                    }
                @endforeach
            });
        </script>
    @endpush
