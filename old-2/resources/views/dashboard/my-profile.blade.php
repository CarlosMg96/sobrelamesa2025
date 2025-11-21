@extends('layouts.master')

@section('css')
<style nonce="newN0nc3ForS3cur1ty" >
    .bg-color { background-color: #1D1D1D; color: white; }
    .profile-tabs { display: flex; margin-bottom: 1rem; }
    .profile-tab { padding: 0.5rem 1rem; cursor: pointer; font-weight: 500; color: white; border-bottom: 2px solid transparent; }
    .profile-tab.active { color: #FFC629; border-bottom: 2px solid #FFC629; }
    .profile-card { background-color: #2C2C2C; padding: 1rem; border-radius: 6px; }
    .profile-image { width: 100px; height: 100px; object-fit: cover; margin-bottom: 1rem; }
    .profile-name { font-size: 1.2rem; font-weight: bold; color: #FFC629; }
    .profile-role { font-weight: bold; margin-bottom: 1rem; }
    .profile-contact { font-size: 0.9rem; margin-bottom: 1rem; }
    .btn-share { background-color: #FFC629; border: none; padding: 0.6rem; text-align: center; font-weight: 500; display: flex; align-items: center; justify-content: center; gap: 0.5rem; width: 100%; border-radius: 4px; cursor: pointer; color: black; text-decoration: none; }
    .avatar-container {
        align-items: center !important; justify-content: center !important; display: flex !important; margin-top: -28px !important; margin-bottom: 28px !important;
    }
</style>
@endsection

@section('body')
<body class="bg-color" data-topbar="dark">
@endsection

@section('content')
<div class="container my-4">
    <h5 class="text-white mb-3">Mi perfil</h5>

    <!-- Tabs -->
    <div class="profile-tabs">
        <div class="profile-tab active" data-tab="vcard">VCard</div>
        @if($user->type_user === 'Consejeros' || $user->type_user === 'Socios')
            <div class="profile-tab" data-tab="bio">Bio</div>
        @endif
    </div>

    <!-- Card -->
    <div class="profile-card">
        <div class="text-center">
             @php
                    use Illuminate\Support\Facades\File;

                    $user = Auth::user();
                    $avatarFile = $user->avatar ?? null;
                    $avatarPath = public_path('build/images/users/' . $avatarFile);
                    $avatarExists = $avatarFile && File::exists($avatarPath);

                    $firstInitial = $user?->first_name[0] ?? '';
                    $lastInitial = $user?->last_name[0] ?? '';
                @endphp

                    @if ($avatarExists)
                        <div class="avatar-container">
                            <img
                                src="{{ asset('build/images/users/' . $avatarFile) }}"
                                alt="Avatar"
                                class="avatar"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                 nonce="newN0nc3ForS3cur1ty" style="width: 90px; height: 90px; object-fit: cover;"
                            >
                        </div>
                    @endif

                    {{-- Span se muestra solo si no existe avatar o si falla la carga --}}
                    @if (!$avatarExists)
                        <div class="avatar-container">
                            <span  nonce="newN0nc3ForS3cur1ty" style="display: flex; width: 90px; height: 90px;
                                    align-items: center; justify-content: center; font-weight: bold; font-size: 1.5rem;
                                    background-color: #ccc; color: black;">
                            {{ $firstInitial }}{{ $lastInitial }}
                        </span>
                        </div>
                    @else
                        <span  nonce="newN0nc3ForS3cur1ty" style="display: none; width: 90px; height: 90px;
                                    align-items: center; justify-content: center; font-weight: bold; font-size: 1.5rem;
                                    background-color: #ccc; color: black;">
                            {{ $firstInitial }}{{ $lastInitial }}
                        </span>
                    @endif
        </div>
        <div class="profile-name text-center">{{ $user->name ?? 'Alejandro Salazar' }}</div>
        <!-- <div class="profile-role text-center">{{ $user->type_user ?? '' }}</div> -->

        <!-- VCard -->
        <div id="vcard-content">
            <div class="profile-contact text-center">
                {{ $user->email ?? 'alejandro@galicia.com.mx' }} <br>
                {{ $user->direct_number ?? '55 0000 0000' }} ext. {{ $user->number ?? '2020' }} <br>
            </div>
            <a href="{{ route('profile.share', 'vcard') }}" class="btn-share">
                <i class="bx bx-share-alt"></i> Compartir
            </a>
        </div>

        <!-- Bio -->
            <div id="bio-content"  nonce="newN0nc3ForS3cur1ty" style="display: none;">
                <div class="mb-2">
                    @php
                        $fullName = $user->name ?? 'Alejandro Salazar';
                        // Convertir a minúsculas y quitar acentos
                        $fullName = strtolower($fullName);
                        $fullName = strtr($fullName, [
                            'á' => 'a', 'é' => 'e', 'í' => 'i',
                            'ó' => 'o', 'ú' => 'u', 'ñ' => 'n',
                            'ä' => 'a', 'ë' => 'e', 'ï' => 'i',
                            'ö' => 'o', 'ü' => 'u',
                        ]);
                        // Quitar puntos
                        $fullName = str_replace('.', '', $fullName);
                        // Quitar comas
                        $fullName = str_replace(',', '', $fullName);
                        $directoryName = str_replace(' ', '-', trim($fullName ?? 'alejandro-salazar'));
                        $que = $type_user ?? 'Socios';
                    @endphp
                   <div class="text-center">
                    <a href="https://www.galicia.com.mx/links/equipo?que={{$que}}&n={{ $directoryName }}" target="_blank" class="text-white fw-bold">
                        Ver mi bio
                    </a>
                   </div>
                </div>
                <p  nonce="newN0nc3ForS3cur1ty" style="font-size: 0.9rem;">
                    {{$user->bio ?? ''}}
                </p>
                <a href="{{ route('profile.share', 'bio') }}" class="btn-share">
                    <i class="bx bx-share-alt"></i> Compartir
                </a>
            </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- App js -->
<script src="{{ URL::asset('js/app.js') }}"></script>
<script nonce="newN0nc3ForS3cur1ty" >
    document.querySelectorAll('.profile-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.profile-tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            document.getElementById('vcard-content').style.display = (tab.dataset.tab === 'vcard') ? 'block' : 'none';
            document.getElementById('bio-content').style.display = (tab.dataset.tab === 'bio') ? 'block' : 'none';
        });
    });
</script>
@endsection