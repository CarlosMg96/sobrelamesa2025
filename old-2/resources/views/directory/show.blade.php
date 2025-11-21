@extends('layouts.app')

@section('css')
<style nonce="newN0nc3ForS3cur1ty">
/* CSS classes to replace inline styles */
.avatar-img-cover {
    object-fit: cover;
}

.avatar-fallback-large {
    width: 150px;
    height: 150px;
    font-size: 4rem;
}

.table-header-width {
    width: 30%;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detalles del Colaborador</h5>
                    <a href="{{ route('directory.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al directorio
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" 
                                     alt="{{ $user->name }}" 
                                     class="img-fluid rounded-circle mb-3 avatar-img-cover" 
                                     width="150" 
                                     height="150"
                                     nonce="newN0nc3ForS3cur1ty">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-3 avatar-fallback-large" 
                                     nonce="newN0nc3ForS3cur1ty">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            @endif
                            <h4>{{ $user->directory_name ?? $user->name }}</h4>
                            <p class="text-muted">{{ $user->position }}</p>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th class="text-nowrap table-header-width" nonce="newN0nc3ForS3cur1ty">Nombre completo:</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Correo electrónico:</th>
                                            <td>
                                                <a href="mailto:{{ $user->email }}" class="text-decoration-none">
                                                    {{ $user->email }}
                                                </a>
                                            </td>
                                        </tr>
                                        @if($user->direct_number)
                                            <tr>
                                                <th>Número directo:</th>
                                                <td>{{ $user->direct_number }}</td>
                                            </tr>
                                        @endif
                                        @if($user->number)
                                            <tr>
                                                <th>Extensión:</th>
                                                <td>{{ $user->number }}</td>
                                            </tr>
                                        @endif
                                        @if($user->area)
                                            <tr>
                                                <th>Área:</th>
                                                <td>{{ $user->area }}</td>
                                            </tr>
                                        @endif
                                        @if($user->work_team)
                                            <tr>
                                                <th>Equipo de trabajo:</th>
                                                <td>{{ $user->work_team }}</td>
                                            </tr>
                                        @endif
                                        @if($user->birthdate)
                                            <tr>
                                                <th>Fecha de nacimiento:</th>
                                                <td>{{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
