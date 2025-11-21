@extends('layouts.master')

@section('title', 'Miembros del Grupo')
@section('body')

    <body data-layout="horizontal" data-topbar="dark">
    @stop
    @section('content')
        <div class="container py-4">
            <div class="card rounded-4 shadow-sm">
                <!-- Header -->
                <div class="card-header d-flex align-items-center">
                    <a href="{{ route('directory.index') }}" class="me-3 text-decoration-none">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h5 class="card-title mb-0 text-center flex-grow-1">{{ $groupName }}</h5>
                </div>

                <div class="card-body">
                    <!-- Search Bar -->
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" id="userSearch" class="form-control border-start-0"
                                placeholder="Buscar por nombre o área...">
                        </div>
                    </div>

                    <div class="row" id="usersContainer">
                        @forelse($users as $user)
                            <div class="col-12 col-md-6 col-lg-4 mb-3 user-card"
                                data-name="{{ strtolower($user->directory_name ?? $user->name) }}"
                                data-work-team="{{ strtolower($user->work_team ?? '') }}">
                                <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                    data-bs-target="#userModal{{ $user->id }}">
                                    <div class="d-flex align-items-center p-3 border rounded-3 hover-shadow">
                                        <!-- Avatar -->
                                        <div class="flex-shrink-0 me-3">
                                            @if ($user->avatar)
                                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                                    class="rounded-circle object-cover avatar-small" nonce="newN0nc3ForS3cur1ty">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center bg-dark text-white rounded-circle avatar-fallback-small"
                                                    nonce="newN0nc3ForS3cur1ty">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- User Info -->
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $user->directory_name ?? $user->name }}</h6>
                                            @if ($user->work_team)
                                                <small class="text-muted">{{ $user->work_team }}</small>
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
                                            <div class="d-flex justify-content-center mb-3">
                                                @if ($user->avatar)
                                                    <img src="{{ asset('storage/' . $user->avatar) }}"
                                                        alt="{{ $user->name }}" class="rounded-circle object-cover avatar-large"
                                                        nonce="newN0nc3ForS3cur1ty">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center bg-dark text-white rounded-circle avatar-fallback-large"
                                                        nonce="newN0nc3ForS3cur1ty">
                                                        {{ substr($user->name, 0, 1) }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Name -->
                                            <h4 class="mb-0 fw-bold text-white user-name-large" nonce="newN0nc3ForS3cur1ty">
                                                {{ $user->directory_name ?? $user->name }}
                                            </h4>

                                            <!-- Work Team -->
                                            @if ($user->work_team)
                                                <div class="p-3 rounded-3">
                                                    <p class="mb-0 fw-medium">{{ $user->work_team }}</p>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Lower Half - White Background -->
                                        <div class="modal-body text-center px-5 pb-4 pt-5">

                                            <!-- Contact Info -->
                                            <div class="mb-4">
                                                @if ($user->direct_number)
                                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                                        <i class="fas fa-phone-alt me-2 text-muted"></i>
                                                        <span>{{ $user->direct_number }}</span>
                                                    </div>
                                                @endif
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                                                    <span>Piso 1 / Oficina XX</span>
                                                </div>
                                            </div>

                                            <!-- Action Button -->
                                            <button type="button" class="btn btn-dark w-100">
                                                <i class="fas fa-map-marked-alt me-2"></i>Ver ubicación
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-4">
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No hay miembros en este grupo</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <style nonce="newN0nc3ForS3cur1ty" >
            /* CSS classes to replace inline styles */
            .avatar-small {
                width: 60px;
                height: 60px;
            }

            .avatar-fallback-small {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .modal-header-padding {
                padding: 2rem 1rem 2rem;
            }

            .modal-close-position {
                right: 1.5rem;
                top: 1.5rem;
            }

            .avatar-large {
                width: 120px;
                height: 120px;
                border: 4px solid #f8f9fa;
            }

            .avatar-fallback-large {
                width: 120px;
                height: 120px;
                font-size: 3rem;
                border: 4px solid #f8f9fa;
            }

            .user-name-large {
                font-size: 1.5rem;
            }

            /* JavaScript utility classes */
            .js-hidden {
                display: none !important;
            }

            .js-visible {
                display: block !important;
            }

            /* Existing styles */
            .hover-shadow {
                transition: all 0.3s ease;
            }

            .hover-shadow:hover {
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
                transform: translateY(-2px);
            }

            .border {
                border: 1px solid #e9ecef !important;
            }

            .rounded-3 {
                border-radius: 0.5rem !important;
            }

            .modal-content {
                border-radius: 1rem;
                overflow: hidden;
                box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            }

            .modal-header {
                position: absolute;
                right: 1rem;
                top: 1rem;
                padding: 0;
                border: none;
                z-index: 1;
            }

            .modal-body {
                padding-top: 2rem;
            }

            .btn-close {
                background: rgba(255, 255, 255, 0.9);
                opacity: 1;
                padding: 0.75rem;
                border-radius: 50%;
                background-size: 0.8em;
            }

            .btn-close:hover {
                opacity: 0.8;
            }
        </style>
    @endsection

    @push('scripts')
        <script nonce="newN0nc3ForS3cur1ty" >
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('userSearch');
                const usersContainer = document.getElementById('usersContainer');
                const userCards = Array.from(document.querySelectorAll('.user-card'));

                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();

                    userCards.forEach(card => {
                        const name = card.getAttribute('data-name').toLowerCase();
                        const workTeam = card.getAttribute('data-work-team')?.toLowerCase() || '';

                        if (name.includes(searchTerm) || workTeam.includes(searchTerm)) {
                            card.classList.remove('js-hidden');
                            card.classList.add('js-visible');
                        } else {
                            card.classList.add('js-hidden');
                            card.classList.remove('js-visible');
                        }
                    });
                });
            });
        </script>
    @endpush

