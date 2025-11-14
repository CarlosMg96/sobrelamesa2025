@extends('layouts.master-without-nav')
@section('title')
    Login | Bienvenidos
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="authentication-bg min-vh-100">
            <div id="bg-overlay" class="bg-overlay"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">

                            <!-- Login Form (Always Visible) -->
                            <div class="login-form">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('build/icons/logo_04.png') }}" alt="Login" height="60" class="mb-3">
                                </div>
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="text-center mt-2">
                                            <h5>@lang('¡Bienvenid@!')</h5>
                                            <p class="text-muted">@lang('Inicia sesión para continuar.')</p>
                                        </div>
                                        <div class="p-2 mt-4">
                                            <form method="POST" action="{{ route('login') }}" class="auth-input" id="login-form">
                                                @csrf
                                                <div id="email-password-fields" nonce="newN0nc3ForS3cur1ty" style="display: block;">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">@lang('Email') <span
                                                                class="text-danger">*</span></label>
                                                        <div class="position-relative input-custom-icon">
                                                            <input id="email" type="text"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}" required
                                                                autocomplete="email" autofocus
                                                                placeholder="@lang('Introduce tu email')">
                                                            <span class="bx bx-user"></span>
                                                        </div>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">@lang('Contraseña')
                                                            <span class="text-danger">*</span></label>
                                                        <div
                                                            class="position-relative auth-pass-inputgroup input-custom-icon">
                                                            <span class="bx bx-lock-alt"></span>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                placeholder="@lang('Introduce tu contraseña')" id="password-input"
                                                                name="password" required autocomplete="current-password">
                                                            <button type="button"
                                                                class="btn btn-link position-absolute h-100 end-0 top-0"
                                                                id="password-addon">
                                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                            </button>
                                                        </div>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="remember">@lang('Recuerdame')</label>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button class="btn btn-dark text-warning w-100"
                                                            type="submit">@lang('Iniciar sesión')</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="footer-content" >
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center p-4">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @section('scripts')
            <!-- Falta bootstrap.min.css, icons.min.css y fonts.css en public/css. Instala Bootstrap con npm y compila los assets, o descarga los archivos y colócalos en public/css. -->
            <script src="{{ URL::asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ URL::asset('libs/metismenujs/metismenujs.min.js') }}"></script>
            <script src="{{ URL::asset('libs/simplebar/simplebar.min.js') }}"></script>

            <script nonce="newN0nc3ForS3cur1ty" >
                document.addEventListener('DOMContentLoaded', function() {
                    const loginForm = document.querySelector('.login-form');
                    const bgOverlay = document.getElementById('bg-overlay');

                    bgOverlay.style.opacity = .85;
                    bgOverlay.classList.add('bg-light');

                    const passwordAddon = document.getElementById('password-addon');
                    if (passwordAddon) {
                        passwordAddon.addEventListener('click', function() {
                            const passwordInput = document.getElementById('password-input');
                            const icon = this.querySelector('i');

                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                icon.classList.remove('mdi-eye-outline');
                                icon.classList.add('mdi-eye-off-outline');
                            } else {
                                passwordInput.type = 'password';
                                icon.classList.remove('mdi-eye-off-outline');
                                icon.classList.add('mdi-eye-outline');
                            }
                        });
                    }
                });
            </script>

    </body>

    <style nonce="newN0nc3ForS3cur1ty" >
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

        .app-name {
            font-family: 'Gelasio', serif !important;
            font-style: italic !important;
            font-weight: bold !important;
            color: #ffffff;
        }

        .app-name-footer {
            font-family: 'Inter', sans-serif !important;
            font-weight: bold !important;
            color: #ffffff !important;
        }
    </style>

    </html>
