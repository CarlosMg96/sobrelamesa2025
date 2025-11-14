@extends('layouts.master')

@section('title')
    Próximos Cumpleaños
@endsection

@section('page-title')
    Próximos Cumpleaños
@endsection

@section('css')
    <style nonce="newN0nc3ForS3cur1ty" >
        .page-content {
            background-color: #1D1D1D !important;
            padding: 75px 0px 0px !important;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .birthday-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: calc(100% - 2rem);
            box-sizing: border-box;
            margin-left: auto;
            margin-right: auto;
            transition: all 0.3s ease;
        }

        /* Ajuste cuando el menú está abierto */
        body.sidebar-enable .birthday-container {
            width: calc(100% - 260px - 2rem);
            margin-left: 260px;
        }

        @media (max-width: 1024px) {
            .birthday-container {
                width: calc(100% - 2rem) !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
        }

        .birthday-header {
            text-align: center;
            margin-bottom: 2rem;
            animation: slideInLeft 0.6s ease-out;
        }

        .birthday-header h1 {
            color: #FFC72C;
            font-family: "Gelasio", serif;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .birthday-header p {
            color: #8c8c8c;
            font-size: 1.1rem;
        }

        .birthday-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
        }

        .birthday-card {
            background: #2d2d2d;
            border-radius: 12px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out;
            /* border-left: 4px solid #FFC72C; */
            color: #e0e0e0;
            position: relative;
            /* Para posicionar el botón de felicitar */
        }

        .birthday-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            background: #363636;
        }

        .avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            font-size: 1.8rem;
            font-weight: bold;
            color: #1D1D1D;
            flex-shrink: 0;
        }

        .birthday-info h3 {
            color: #FFFFFF;
            font-family: "Gelasio", serif;
            margin: 0 0 0.5rem 0;
            font-size: 1.3rem;
        }

        .birthday-date {
            color: #FFC72C;
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }

        .birthday-remaining {
            color: #a0a0a0;
            font-size: 0.9rem;
        }

        .today-badge {
            background: #FFC72C;
            color: rgb(0, 0, 0);
            padding: 0.2rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: inline-block;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(248, 255, 48, 0.7);
            }

            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(255, 59, 48, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 59, 48, 0);
            }
        }

        .no-birthdays {
            text-align: center;
            padding: 3rem;
            color: #8c8c8c;
            grid-column: 1 / -1;
        }

        .month-section {
            grid-column: 1 / -1;
            margin-bottom: 1.5rem;
        }

        .month-header {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 0.8rem 1rem;
            background: #2d2d2d;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid #FFC72C;
            transition: all 0.3s ease;
        }

        .month-header:hover {
            background: #363636;
        }

        .month-title {
            color: #FFC72C;
            font-family: "Gelasio", serif;
            font-size: 1.5rem;
            margin: 0;
            flex-grow: 1;
        }

        .month-toggle {
            background: none;
            border: none;
            color: #FFC72C;
            font-size: 1.2rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .month-toggle.collapsed {
            transform: rotate(-90deg);
        }

        .month-content {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
            animation: fadeInUp 0.4s ease-out;
            justify-content: center;
            align-items: start;
        }

        .month-content.collapsed {
            display: none;
        }

        @media (max-width: 768px) {

            .birthday-grid,
            .month-content {
                grid-template-columns: 1fr;
                max-width: 100%;
                padding: 0 1rem;
            }

            .birthday-card {
                flex-direction: column;
                text-align: center;
            }

            .avatar {
                margin: 0 0 1rem 0;
            }
        }

        /* Botón de felicitar */
        .btn-felicitar {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #FFC72C;
            border: none;
            color: #000;
            padding: 6px 10px;
            font-size: 13px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-felicitar:hover {
            background-color: #ffd966;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-felicitar:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .btn-felicitar-today {
            background-color: #FFC72C !important;
            border: none !important;
        }

        /* Estilos para el confeti */
        #confetti-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1000;
        }
    </style>
@endsection
@section('body')

    <body data-topbar="dark" class="bg-color">
    @endsection
    @section('content')

        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/" class="btn btn-light">
                    <i class="fas fa-arrow-left me-2"></i> Volver al inicio
                </a>
            </div>

            <div class="birthday-header" data-aos="fade-up">
                <h1>Próximos Cumpleaños</h1>
                <p>Celebra con tus compañeros en sus días especiales</p>
            </div>

            @if ($upcomingBirthdays->count() > 0)
                @php
                    // Agrupar por mes
                    $groupedBirthdays = $upcomingBirthdays
                        ->groupBy(function ($user) {
                            return \Carbon\Carbon::parse($user->birthdate)->month;
                        })
                        ->sortKeys();

                    // Obtener el mes actual (1-12)
                    $currentMonth = now()->month;

                    // Crear un array con los meses en el orden correcto
                    $orderedMonths = [];

                    // Agregar meses desde el actual hasta diciembre
                    for ($i = $currentMonth; $i <= 12; $i++) {
                        $orderedMonths[] = $i;
                    }

                    // Agregar meses desde enero hasta el mes anterior al actual
                    for ($i = 1; $i < $currentMonth; $i++) {
                        $orderedMonths[] = $i;
                    }
                @endphp

                <div class="birthday-grid">
                    @foreach ($orderedMonths as $month)
                        @php
                            // Saltar meses sin cumpleaños
                            if (!isset($groupedBirthdays[$month])) {
                                continue;
                            }
                            $birthdays = $groupedBirthdays[$month];
                            $monthName = \Carbon\Carbon::createFromDate(null, $month, 1)->isoFormat('MMMM');
                            $monthId = 'month-' . $month;
                        @endphp

                        <div class="month-section">
                            <div class="month-header" data-month-id="{{ $monthId }}">
                                <h3 class="month-title">{{ $monthName }}</h3>
                                <button class="month-toggle" id="toggle-{{ $monthId }}">▼</button>
                            </div>

                            <div class="month-content" id="{{ $monthId }}">
                                @foreach ($birthdays as $user)
                                    @php
                                        $birthday = \Carbon\Carbon::parse($user->birthdate);
                                        $today = now()->startOfDay();
                                        $nextBirthday = $birthday->copy()->year($today->year);

                                        // Check if the birthday is today before any adjustments
                                        $isToday = ($nextBirthday->month === $today->month && $nextBirthday->day === $today->day);
                                        
                                        // If the birthday has already passed this year (and it's not today), set it to next year
                                        if ($nextBirthday->isPast() && !$isToday) {
                                            $nextBirthday->addYear();
                                        }

                                        // Calculate days difference
                                        $daysUntilBirthday = $today->diffInDays($nextBirthday, false);
                                        
                                        // Update isToday and isTomorrow after potential year adjustment
                                        $isToday = $nextBirthday->isToday();
                                        $isTomorrow = $nextBirthday->isTomorrow();
                                        $daysText = '';

                                        if ($isToday) {
                                            $daysText = '¡ES HOY!';
                                        } elseif ($isTomorrow) {
                                            $daysText = '¡MAÑANA!';
                                        } else {
                                            $daysText = 'FALTAN ' . ceil($daysUntilBirthday) . ' DÍAS';
                                        }
                                    @endphp

                                    <div class="birthday-card" data-aos="fade-up">
                                        <div class="avatar">
                                            {{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                                        </div>
                                        <div class="birthday-info">
                                            <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                                            <div class="birthday-date">
                                                {{ $birthday->isoFormat('D [de] MMMM') }}
                                            </div>
                                            @if ($isToday)
                                                <span class="today-badge">¡Hoy es su cumpleaños!</span>
                                            @else
                                                <div class="birthday-remaining">
                                                    {{ $daysText }}
                                                </div>
                                            @endif
                                        </div>
                                        @if ($isToday || $isTomorrow)
                                            <button class="btn btn-sm btn-warning btn-felicitar @if($isToday) btn-felicitar-today @endif"
                                                data-user-id="{{ $user->id }}">
                                                <i class="fas fa-birthday-cake me-1"></i> Felicitar
                                            </button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-birthdays" data-aos="fade-up">
                    <p>No hay cumpleaños próximos por el momento.</p>
                </div>
            @endif

        </div>

    @endsection

    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" integrity="sha384-wziAfh6b/qT+3LrqebF9WeK4+J5sehS6FA10J1t3a866kJ/fvU5UwofWnQyzLtwu" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js" integrity="sha384-0DP0MDbig+ZDZ9nB+hxK0onRr5KVsL0nGdTEFh1XVBS7HRf4AHMW2i+bOKH+8qkK" crossorigin="anonymous"></script>

        <!-- Notification Styles -->
        <style nonce="newN0nc3ForS3cur1ty" >
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background: #fff;
                padding: 15px 20px;
                border-radius: 5px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                transform: translateX(120%);
                transition: transform 0.3s ease-out;
                z-index: 1100;
                max-width: 300px;
            }

            .notification.notification-success {
                background: #28a745;
                color: white;
            }

            .notification.notification-error {
                background: #dc3545;
                color: white;
            }

            .notification-content {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .notification-close {
                background: none;
                border: none;
                color: inherit;
                font-size: 20px;
                cursor: pointer;
                margin-left: 10px;
                padding: 0;
                line-height: 1;
            }
        </style>

        <!-- Birthday Scripts -->
        <script nonce="newN0nc3ForS3cur1ty">
                // Initialize all month headers
                const monthHeaders = document.querySelectorAll('.month-header');
                
                monthHeaders.forEach(header => {
                    header.addEventListener('click', function() {
                        const monthId = this.getAttribute('data-month-id');
                        toggleMonth(monthId);
                    });
                });

                // Collapse all months except current
                const currentMonth = new Date().getMonth() + 1; // JavaScript months are 0-11
                const monthSections = document.querySelectorAll('.month-section');

                monthSections.forEach(section => {
                    const monthId = section.querySelector('.month-content')?.id;
                    if (!monthId) return;

                    const monthNumber = parseInt(monthId.split('-')[1]);

                    // Expand only current month, collapse others
                    if (monthNumber !== currentMonth) {
                        window.toggleMonth(monthId, false);
                    }
                });
        </script>

        <script nonce="newN0nc3ForS3cur1ty" >
            // Make toggleMonth globally available
            window.toggleMonth = function(monthId, animate = true) {
                const content = document.getElementById(monthId);
                const toggleBtn = document.getElementById('toggle-' + monthId);

                if (content.classList.contains('collapsed')) {
                    content.classList.remove('collapsed');
                    toggleBtn.classList.remove('collapsed');
                    if (animate) {
                        content.style.animation = 'fadeInUp 0.4s ease-out';
                    }
                } else {
                    content.classList.add('collapsed');
                    toggleBtn.classList.add('collapsed');
                }
            };

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize AOS
                AOS.init({
                    duration: 800,
                    once: true,
                    easing: 'ease-out',
                });

                // Collapse all months except current
                const currentMonth = new Date().getMonth() + 1; // JavaScript months are 0-11
                const monthSections = document.querySelectorAll('.month-section');

                monthSections.forEach(section => {
                    const monthId = section.querySelector('.month-content')?.id;
                    if (!monthId) return;

                    const monthNumber = parseInt(monthId.split('-')[1]);

                    // Expand only current month, collapse others
                    if (monthNumber !== currentMonth) {
                        window.toggleMonth(monthId, false);
                    }
                });
            });

            // Birthday greeting functionality
            document.querySelectorAll('.btn-felicitar').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.dataset.userId;
                    const btn = this;

                    // Disable button and show loading state
                    btn.disabled = true;
                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Enviando...';

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
                                // Show confetti for successful send
                                launchConfetti();
                                showNotification('🎉 ¡Correo de felicitación enviado!', 'success');
                            } else {
                                showNotification('Error al enviar el correo.', 'error');
                            }
                        })
                        .catch(() => {
                            showNotification('Error de conexión al enviar el correo.', 'error');
                        })
                        .finally(() => {
                            // Re-enable button and restore text after a delay
                            setTimeout(() => {
                                btn.disabled = false;
                                btn.innerHTML = originalHTML;
                            }, 2000);
                        });
                });
            });

            function launchConfetti() {
                // Confetti effect using canvas-confetti
                confetti({
                    particleCount: 150,
                    spread: 70,
                    origin: {
                        y: 0.6
                    },
                    colors: ['#FFC72C', '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4']
                });
            }

            function showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `notification notification-${type}`;
                notification.innerHTML = `
                    <div class="notification-content">
                        <span>${message}</span>
                        <button class="notification-close">&times;</button>
                    </div>
                `;

                // Add to page
                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.style.transform = 'translateX(0)';
                }, 100);

                // Auto remove after 3 seconds
                setTimeout(() => {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 300);
                }, 3000);

                // Close button functionality
                const closeBtn = notification.querySelector('.notification-close');
                closeBtn.addEventListener('click', function() {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 300);
                });
            }
        </script>
    @endsection
