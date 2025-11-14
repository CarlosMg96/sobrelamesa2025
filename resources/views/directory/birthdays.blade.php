

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Cumpleaños de hoy</h5>
                    <a href="{{ route('directory.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al directorio
                    </a>
                </div>

                <div class="card-body">
                    @if($birthdays->isEmpty())
                        <div class="alert alert-info mb-0">
                            No hay cumpleaños para mostrar hoy.
                        </div>
                    @else
                        <div class="row">
                            @foreach($birthdays as $user)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            @if($user->avatar)
                                                <img src="{{ asset('storage/' . $user->avatar) }}" 
                                                     alt="{{ $user->name }}" 
                                                     class="rounded-circle mb-3" 
                                                     width="100" 
                                                     height="100"
                                                      nonce="newN0nc3ForS3cur1ty" style="object-fit: cover;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-3" 
                                                      nonce="newN0nc3ForS3cur1ty" style="width: 100px; height: 100px; font-size: 2.5rem;">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                            @endif
                                            
                                            <h5 class="card-title mb-1">{{ $user->directory_name ?? $user->name }}</h5>
                                            
                                            @if($user->position || $user->area)
                                                <p class="card-text text-muted mb-2">
                                                    {{ $user->position }}
                                                    @if($user->position && $user->area)
                                                        <br>
                                                    @endif
                                                    {{ $user->area }}
                                                </p>
                                            @endif
                                            
                                            @if($user->birthdate)
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        <i class="fas fa-birthday-cake"></i> 
                                                        {{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y') }}
                                                    </small>
                                                </p>
                                            @endif
                                            
                                            <a href="{{ route('directory.show', $user) }}" class="btn btn-sm btn-outline-primary mt-2">
                                                Ver perfil
                                            </a>
                                        </div>
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
@endsection
