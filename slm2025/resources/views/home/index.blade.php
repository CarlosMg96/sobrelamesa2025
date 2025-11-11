@extends('layouts.app')
@section('title', 'Sobre La Mesa | Admin')

@section('css')
<style>
</style>
@endsection

@section('modal')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 text-center">
            <!-- Logo -->
            <div class="mb-4">
                <a href="{{ route('dashboard') }}" class="text-decoration-none">
                    <img src="{{ asset('images/icons/logo_04.png') }}" 
                         class="img-fluid" 
                         alt="Sobre La Mesa Logo" 
                         style="max-width: 350px;">
                </a>
            </div>

            <!-- Footer -->
            <footer class="mt-5">
                <p class="text-muted">
                    Copyright &copy; 2025 
                    <a href="https://bigtech.com.mx/" class="text-decoration-none text-dark fw-bold">
                        BigTech
                    </a>
                    <br>
                    <small>All rights reserved</small>
                </p>
            </footer>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Aquí puedes agregar cualquier inicialización de JavaScript que necesites
        const menuPanel = document.getElementById('menu_panel');
        if (menuPanel) {
            menuPanel.classList.add('active');
        }
    });
</script>
@endsection