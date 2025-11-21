@extends('layouts.master')

@section('title', 'Directorio')

@section('css')
    {{-- App js --}}
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <style nonce="newN0nc3ForS3cur1ty" >
        /* Estilos generales */
        body {
            font-family: sans-serif;
            background-color: #212529;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .btn-amber {
            color: #000 !important;
            background-color: #FFC72C !important;
            border-color: transparent !important;
        }

        .bg-dark {
            background-color: #343a40 !important;
        }

        .text-white {
            color: #fff !important;
        }

        .card-header {
            background-color: #212529;
            color: #fff;
            border-bottom: 1px solid #495057;
        }

        /* Hover effect for user cards */
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        /* Fix for avatar size */
        .user-avatar {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        /* Fix for avatar initials */
        .avatar-initials {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #212529;
            color: white;
            border-radius: 50%;
            font-size: 1.5rem;
            width: 60px;
            height: 60px;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .bg-birthday {
            color: #fff;
            border-radius: 0;
        }

        /* Base group card styles */
        .group-card {
            color: #000;
            margin-bottom: 1rem;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: none;
        }

        .group-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.3) 100%);
            z-index: 1;
        }

        .group-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .group-card:hover::before {
            opacity: 1;
        }

        .group-card>* {
            position: relative;
            z-index: 2;
        }

        .group-card h6 {
            margin-bottom: 0.25rem;
            font-weight: 600;
            font-size: 1.05rem;
        }

        .nav-tabs .nav-link {
            color: #777;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-bottom: none;
            border-radius: 5px 5px 0 0;
        }

        .nav-tabs .nav-link.active {
            background-color: #fff;
            color: #333;
            border-bottom: 1px solid #fff;
        }

        .nav-tabs .nav-item {
            text-align: center;
        }

        /* Fuentes */
        @font-face {
            font-family: 'Signerica';
            src: url('{{ asset('fonts/Signerica_Fat.ttf') }}') format('truetype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Signerica';
            src: url('{{ asset('fonts/Signerica_Thin.ttf') }}') format('truetype');
            font-weight: 100;
            font-style: normal;
            font-display: swap;
        }

        .ff-signerica {
            font-family: 'Signerica', cursive !important;
            color: #FFC629;
            font-weight: bold;
        }

        /* Color variations based on grid position */
        .col-12:nth-child(4n+1) .group-card,
        .col-md-6:nth-child(4n+1) .group-card {
            background-color: #FFC72C;
        }

        .col-12:nth-child(4n+2) .group-card,
        .col-md-6:nth-child(4n+2) .group-card {
            background-color: #FFD04F;
        }

        .col-12:nth-child(4n+3) .group-card,
        .col-md-6:nth-child(4n+3) .group-card {
            background-color: #FFD872;
        }

        .col-12:nth-child(4n+4) .group-card,
        .col-md-6:nth-child(4n+4) .group-card {
            background-color: #FFE195;
        }

        .profile-tabs {
            display: flex;
            margin-bottom: 1rem;
        }

        .profile-tab {
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-weight: 500;
            color: white;
            border-bottom: 2px solid transparent;
        }

        .profile-tab.active {
            color: #FFC629;
            border-bottom: 2px solid #FFC629;
        }

        /* CSS classes to replace inline styles */
        .avatar-container-40 {
            width: 40px;
            height: 40px;
        }

        .avatar-img-cover {
            object-fit: cover;
        }

        .avatar-fallback-conditional {
            /* Will be handled by JavaScript display logic */
        }

        .tab-equipos-hidden {
            display: none;
        }

        .modal-header-padding {
            padding: 2rem 1rem 2rem;
        }

        .modal-close-btn {
            right: 1.5rem;
            top: 1.5rem;
        }

        .avatar-container-120 {
            margin: 0 auto;
            width: 120px;
            height: 120px;
        }

        .user-name-large {
            font-size: 1.5rem;
        }

        .view-location-hidden {
            display: none;
        }

        .avatar-modal-large {
            width: 120px;
            height: 120px;
            border: 3px solid white;
        }

        .avatar-initials-large {
            font-size: 3rem;
            line-height: 1;
        }

        .avatar-full-size {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* JavaScript utility classes */
        .js-hidden {
            display: none !important;
        }

        .js-visible {
            display: block !important;
        }

        .js-inline-block {
            display: inline-block !important;
        }

        .js-flex {
            display: flex !important;
        }

        .js-no-pointer-events {
            pointer-events: none !important;
        }

        .js-muted-color {
            color: #6c757d !important;
        }
    </style>
@stop

@section('body')

    <body data-topbar="dark" class="bg-dark">
    @show

    @section('content')
        <div class="container-fluid px-0">
            <div class="bg-dark text-white">
                <!-- Header -->
                <div class="card-header d-flex align-items-center bg-dark py-2 px-3">
                    <a href="{{ url()->previous() }}" class="me-3 text-decoration-none text-white">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h5 class="card-title mb-0 text-center flex-grow-1 text-white">Directorio</h5>
                </div>


                <!-- Search Bar -->
                <form action="{{ route('directory.index') }}" method="GET" class="m-3">
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-0 text-white"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" id="searchInput"
                            class="form-control border-0 bg-dark text-white"
                            placeholder="Buscar por nombre, puesto o área..." value="{{ $searchTerm ?? '' }}">
                        @if (isset($searchTerm))
                            <a href="{{ route('directory.index') }}" class="btn " type="button">
                                <i class="fas fa-times"></i>
                            </a>
                        @endif
                    </div>
                </form>

                @if (isset($searchResults) && request()->has('search') && !empty(request('search')))
                    <div class="px-3 mb-4">
                        <h6 class="mb-3 text-white">Resultados de búsqueda para: <strong>{{ request('search') }}</strong>
                        </h6>

                        @if (count($searchResults['users']) > 0 || count($searchResults['groups']) > 0 || count($searchResults['areas']) > 0)
                            <!-- Sección de Personas -->
                            @if (count($searchResults['users']) > 0)
                                <div class="mb-4">
                                    <h6 class="text-muted mb-3">Personas</h6>
                                    <div class="row">
                                        @foreach ($searchResults['users'] as $user)
                                        @php
                                        $avatarFile = $user->avatar ?? null;
                                        $avatarPath = public_path(
                                            'build/images/users/' . $avatarFile,
                                        );
                                        $avatarExists =
                                            $avatarFile && File::exists($avatarPath);
                                        $avatarURL = '';
                                        if ($avatarExists) {
                                            $avatarURL = asset('build/images/users/' . $avatarFile);
                                        } else {
                                            $avatarURL = null;
                                            }
                                        @endphp
                                            <div class="col-12 col-md-6 col-lg-4 mb-3 user-card"
                                                data-name="{{ strtolower($user->name ?? $user->directory_name) }}"
                                                data-work-team="{{ strtolower($user->work_team ?? '') }}">
                                                <a href="#" class="text-decoration-none text-white"
                                                    data-bs-toggle="modal" data-bs-target="#userModal"
                                                    data-first-name="{{ $user->first_name }}"
                                                    data-last-name="{{ $user->last_name }}"
                                                    data-position="{{ $user->position }}" data-email="{{ $user->email }}"
                                                    data-direct_number="{{ $user->direct_number }}"
                                                    data-map-section="{{ $user->map_section }}"
                                                    data-avatar="{{ $avatarURL }}">
                                                    <div
                                                        class="d-flex align-items-center p-3 border rounded-3 hover-shadow bg-dark">
                                                        <!-- Avatar -->
                                                        <div class="flex-shrink-0 me-3 position-relative avatar-container-40" nonce="newN0nc3ForS3cur1ty">
                                                            @php
                                                                $firstInitial = !empty($user->first_name)
                                                                    ? strtoupper(substr(trim($user->first_name), 0, 1))
                                                                    : '';
                                                                $lastInitial = !empty($user->last_name)
                                                                    ? strtoupper(substr(trim($user->last_name), 0, 1))
                                                                    : '';
                                                                $initial = trim($firstInitial . $lastInitial);
                                                                $avatarFile = $user->avatar ?? null;
                                                                $avatarPath = public_path(
                                                                    'build/images/users/' . $avatarFile,
                                                                );
                                                                $avatarExists =
                                                                    $avatarFile && File::exists($avatarPath);
                                                            @endphp
                                                            <div class="position-relative w-100 h-100">
                                                                @if ($avatarExists)
                                                                    <img src="{{ asset('build/images/users/' . $avatarFile) }}"
                                                                        alt="{{ $user->name }}"
                                                                        class="rounded-circle border border-3 border-white w-100 h-100 avatar-img-cover"
                                                                        nonce="newN0nc3ForS3cur1ty"
                                                                        onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                                @else
                                                                    <div class="rounded-circle border border-3 border-white bg-secondary text-white d-flex align-items-center justify-content-center w-100 h-100 @if($avatarExists) js-hidden @endif"
                                                                        nonce="newN0nc3ForS3cur1ty">
                                                                        {{ $initial }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <!-- User Info -->
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-0 text-white">
                                                                {{ $user->name ?? $user->directory_name }}
                                                            </h6>
                                                            @if ($user->work_team)
                                                                <small
                                                                    class="text-muted">{{ $user->practiceAreas->first()->name ?? 'Sin equipo' }}</small>
                                                            @elseif($user->position)
                                                                <small class="text-muted">{{ $user->position }}</small>
                                                            @endif
                                                        </div>

                                                        <!-- Chevron -->
                                                        <div class="ms-2">
                                                            <i class="fas fa-chevron-right text-muted"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Sección de Áreas de Práctica -->
                            @if (count($searchResults['areas']) > 0)
                                <div class="mb-4">
                                    <h6 class="text-muted mb-3">Áreas de Práctica</h6>
                                    <div class="row">
                                        @foreach ($searchResults['areas'] as $area)
                                            <div class="col-12 col-md-6 mb-3">
                                                <a href="{{ route('directory.area', $area->id) }}"
                                                    class="text-decoration-none text-white">
                                                    <div class="group-card">
                                                        <div>
                                                            <h6 class="mb-1">{{ $area->name }}</h6>
                                                            <!-- <small class="text-muted">{{ $area->user_count }}
                                                                                            integrantes</small> -->
                                                        </div>
                                                        <i class="fas fa-chevron-right text-muted"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No se encontraron resultados para tu búsqueda</p>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="profile-tabs mb-3">
                        <div class="profile-tab active" data-tab="areas">Áreas de Práctica</div>
                        <div class="profile-tab" data-tab="equipos">Equipos de Trabajo</div>
                    </div>

                    <!-- Contenido por pestaña -->
                    <div class="tab-content bg-dark text-white p-3 rounded">
                        <div class="tab-pane custom-tab-pane show" id="tab-areas">
                            <!-- Aquí va el foreach de áreas de práctica -->
                            <div class="row">
                                @foreach ($areas->whereIn('id', [1, 5, 16, 41, 6, 10, 13, 7, 9, 3, 8, 11, 12, 15, 14, 42, 20, 19, 40]) as $area)
                                    <div class="col-12 col-md-6">
                                        <a href="{{ route('directory.area', $area->id) }}"
                                            class="text-white text-decoration-none">
                                            <div class="group-card">
                                                <h6>{{ $area->name }}</h6>
                                                <i class="fas fa-chevron-right text-muted"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane custom-tab-pane tab-equipos-hidden" id="tab-equipos" nonce="newN0nc3ForS3cur1ty">
                            <!-- Aquí va el foreach de equipos de trabajo -->
                            <div class="row">
                                @foreach ($areas->whereIn('id', [28, 31, 30]) as $equipo)
                                    <div class="col-12 col-md-6">
                                        <a href="{{ route('directory.area', $equipo->id) }}"
                                            class="text-white text-decoration-none">
                                            <div class="group-card">
                                                <h6>{{ $equipo->name }}</h6>
                                                <i class="fas fa-chevron-right text-muted"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    @endsection

    <!-- Single Dynamic User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <!-- Upper Half - Black Background -->
                <div class="bg-dark text-white text-center position-relative modal-header-padding" nonce="newN0nc3ForS3cur1ty">
                    <button type="button" class="btn btn-dark btn-sm position-absolute modal-close-btn"
                        nonce="newN0nc3ForS3cur1ty" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>

                    <!-- Avatar Container -->
                    <div id="userAvatarContainer" class="d-flex justify-content-center mb-3 avatar-container-120"
                        nonce="newN0nc3ForS3cur1ty">
                        <!-- Will be populated by JavaScript -->
                    </div>

                    <!-- Name -->
                    <h4 id="userName" class="mb-0 fw-bold text-white user-name-large" nonce="newN0nc3ForS3cur1ty"></h4>

                    <!-- Position -->
                    <p id="userPosition" class="mb-0 text-muted"></p>
                </div>

                <!-- Lower Half - White Background -->
                <div class="modal-body text-center px-5 pb-4 pt-5">
                    <!-- Contact Info -->
                    <div class="mb-4">
                        <!-- Email -->
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <i class="fas fa-envelope me-2 text-muted"></i>
                            <a id="userEmail" href="#" class="text-decoration-none"></a>
                        </div>

                        <!-- Phone -->
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <i class="fas fa-direct_number-alt me-2 text-muted"></i>
                            <span id="userPhone"></span>
                        </div>

                        <!-- Location -->
                        <div id="userLocation" class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                            <span id="locationText">Ubicación no disponible</span>
                        </div>
                    </div>

                    <!-- View Location Button -->
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-primary view-location-hidden" id="viewLocationBtn" nonce="newN0nc3ForS3cur1ty">
                            <i class="fas fa-map-marked-alt me-2"></i>Ver Ubicación
                        </button>
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>

        @if (session('status'))
            <script nonce="newN0nc3ForS3cur1ty" >
                (function($) {
                    var session = JSON.parse("{{ session('status') }}".replace(/(&quot;)/g, '"'));
                    if (session.success) {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(session.message);
                    }
                })(jQuery);
            </script>
        @endif

        <script nonce="newN0nc3ForS3cur1ty" >
            document.addEventListener('DOMContentLoaded', function() {
                const userModal = document.getElementById('userModal');
                const modal = new bootstrap.Modal(userModal);

                if (userModal) {
                    userModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget;
                        const firstName = button.getAttribute('data-first-name') || '';
                        const lastName = button.getAttribute('data-last-name') || '';
                        const fullName = `${firstName} ${lastName}`.trim();
                        const position = button.getAttribute('data-position') || '';
                        const email = button.getAttribute('data-email') || '';
                        const direct_number = button.getAttribute('data-direct_number') || '';
                        const avatar = button.getAttribute('data-avatar') || '';
                        const mapSection = button.getAttribute('data-map-section') || '';

                        // Update modal content
                        const avatarContainer = userModal.querySelector('#userAvatarContainer');
                        const locationText = userModal.querySelector('#locationText');
                        const viewLocationBtn = userModal.querySelector('#viewLocationBtn');


                        // Get initials from first and last name
                        const firstInitial = firstName ? firstName.charAt(0).toUpperCase() : '';
                        const lastInitial = lastName ? lastName.charAt(0).toUpperCase() : '';
                        const initials = (firstInitial + lastInitial).trim();

                        // Function to display initials
                        const displayInitials = () => {
                            avatarContainer.innerHTML = `
                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center avatar-modal-large"
                                 nonce="newN0nc3ForS3cur1ty">
                                <span class="text-white avatar-initials-large" nonce="newN0nc3ForS3cur1ty">${initials}</span>
                            </div>`;
                        };

                        // Set avatar or initials
                        if (avatar) {
                            const avatarFile = avatar.split('/').pop(); // Get just the filename
                            const avatarPath = '{{ asset('build/images/users/') }}/' + avatarFile;

                            // Create avatar image
                            const avatarImg = document.createElement('img');
                            avatarImg.src = avatarPath;
                            avatarImg.className = 'rounded-circle border border-3 border-white avatar-full-size';
                            avatarImg.alt = fullName;
                            avatarImg.onerror = function() {
                                displayInitials();
                            };

                            
                            // Clear container and append elements
                            avatarContainer.innerHTML = '';
                            avatarContainer.appendChild(avatarImg);
                        } else {
                            displayInitials();
                        }



                        // Set location info if available
                        if (mapSection) {
                            // Remove 'p' prefix from floor number
                            const floorNum = mapSection.split('-')[0].replace('p', '');
                            const section = mapSection.split('-')[1];
                            if (floorNum === '23') {
                                locationText.textContent = 'Pendiente de asignar';
                                viewLocationBtn.classList.add('js-hidden');
                                viewLocationBtn.classList.remove('js-inline-block');
                            } else {
                                locationText.textContent = `Piso ${floorNum} / Sección ${section}`;
                                viewLocationBtn.classList.remove('js-hidden');
                                viewLocationBtn.classList.add('js-inline-block');
                                viewLocationBtn.onclick = function() {
                                    window.location.href = `/maps/${floorNum}?section=${mapSection}`;
                                };
                            }
                        } else {
                            locationText.textContent = 'Ubicación no disponible';
                            viewLocationBtn.classList.add('js-hidden');
                            viewLocationBtn.classList.remove('js-inline-block');
                        }

                        // Set user info
                        userModal.querySelector('#userName').textContent = fullName || 'Nombre no disponible';
                        userModal.querySelector('#userPosition').textContent = position || '';

                        // Set email
                        const emailLink = userModal.querySelector('#userEmail');
                        emailLink.href = email ? `mailto:${email}` : '#';
                        emailLink.textContent = email || 'No disponible';
                        if (!email) {
                            emailLink.classList.add('js-no-pointer-events', 'js-muted-color');
                        } else {
                            emailLink.classList.remove('js-no-pointer-events', 'js-muted-color');
                        }

                        // Set direct_number
                        const direct_numberElement = userModal.querySelector('#userPhone');
                        if (direct_number) {
                            direct_numberElement.textContent = direct_number;
                            direct_numberElement.closest('div').classList.add('js-flex');
                        } else {
                            direct_numberElement.textContent = 'No disponible';
                            direct_numberElement.closest('div').classList.add('js-flex');
                        }
                    });
                }

                const searchInput = document.getElementById('searchInput');
                if (searchInput) {
                    if (searchInput.value) {
                        searchInput.focus();
                        const resultsSection = document.querySelector('.search-results');
                        if (resultsSection) {
                            resultsSection.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    }
                }
                $('.nav-tabs a').on('click', function(event) {
                    event.preventDefault();
                    $(this).tab('show');
                });
            });
            document.querySelectorAll('.btn-felicitar').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.dataset.userId;

                    fetch("{{ route('email.birthday') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                user_id: userId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Correo de felicitación enviado!');
                            } else {
                                alert('Error al enviar el correo.');
                            }
                        })
                        .catch(() => alert('Error al enviar el correo.'));
                });
            });
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('.profile-tab');
                const panes = document.querySelectorAll('.custom-tab-pane');

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        // Quitar clase 'active' de todos los tabs
                        tabs.forEach(t => t.classList.remove('active'));
                        tab.classList.add('active');

                        // Ocultar todos los contenidos
                        panes.forEach(pane => pane.classList.add('js-hidden'));

                        // Mostrar el contenido correspondiente
                        const targetId = 'tab-' + tab.dataset.tab;
                        const targetPane = document.getElementById(targetId);
                        if (targetPane) {
                            targetPane.classList.remove('js-hidden');
                            targetPane.classList.add('js-visible');
                        }
                    });
                });

                // Mostrar por defecto el tab activo (por si está oculto inicialmente)
                const defaultActive = document.querySelector('.profile-tab.active');
                if (defaultActive) {
                    const targetId = 'tab-' + defaultActive.dataset.tab;
                    const defaultPane = document.getElementById(targetId);
                    if (defaultPane) {
                        defaultPane.classList.remove('js-hidden');
                        defaultPane.classList.add('js-visible');
                    }
                }
            });
        </script>
    @endsection
