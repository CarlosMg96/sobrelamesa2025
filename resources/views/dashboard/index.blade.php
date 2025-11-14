@extends('layouts.master')
@section('title')
    Inicio
@endsection
@section('page-title')
    Inicio
@endsection
@section('css')
    <!-- jsvectormap css -->
    <link href="{{ URL::asset('libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <style nonce="newN0nc3ForS3cur1ty" >
        .custom-responsive-container {
            display: none;
        }

        .avatar-container-text {
            width: 42px;
            height: 42px;
            background-color: #FFC629;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-family: sans-serif;
            color: #1D1D1D;
            font-size: 14px;
            border: 1px solid #fff;
            overflow: hidden;
            text-align: center;
            line-height: 1;
            /* <-- clave */
        }


        .avatar-container-text:hover {
            transform: scale(1.1);
        }

        .avatar-container-text:active {
            transform: scale(0.95);
        }

        .bg-color {
            background-color: #1D1D1D;
            border: none;
            border-radius: 0px;
        }

        :root {
            --banner-image: url('{{ asset('images/home/Banner.png') }}');
            --travel-image: url('{{ asset('images/home/Travel.png') }}');
            --deal-image: url('{{ asset('images/home/Deal.png') }}');
            --manual-image: url('{{ asset('images/home/Manual.png') }}');
            --conflict-image: url('{{ asset('images/home/Conflict.png') }}');
        }

        /* Smooth scrolling */
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

        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #1e1e1e;
        }

        ::-webkit-scrollbar-thumb {
            background: #ffc72c;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ffd700;
        }

        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--background);
            color: var(--foreground);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* MOBILE DASHBOARD STYLES - Only for viewports < 769px */
        @media (max-width: 768px) {

            /* Dashboard Container */
            .dashboard-container {
                min-height: 100vh;
                background: linear-gradient(to bottom, #1E1E1E 52%, white 26%);
                padding: 20px;
                overflow: hidden;
            }

            .dashboard-content {
                width: 100%;
                max-width: 350px;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            /* Header */
            .header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            .avatar-container {
                cursor: pointer;
                transition: transform 0.2s ease;
                text-decoration: none;
                display: block;
            }

            .avatar-container:hover {
                transform: scale(1.1);
            }

            .avatar-container:active {
                transform: scale(0.95);
            }

            .avatar {
                width: 32px;
                height: 32px;
                border-radius: 50%;
            }

            .menu-button {
                width: 21px;
                height: 25px;
                background: #FDFDFD;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.2s ease;
            }

            .menu-button:hover {
                transform: scale(1.1);
            }

            .menu-button:active {
                transform: scale(0.95);
            }

            .menu-button svg {
                color: #1E1E1E;
            }

            .notification-container {
                position: relative;
                cursor: pointer;
                transition: transform 0.2s ease;
            }

            .notification-container:hover {
                transform: scale(1.1);
            }

            .notification-container:active {
                transform: scale(0.95);
            }

            .notification-bell {
                width: 35px;
                height: 36px;
                background: #ffc72c00;
                border-radius: 2px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .notification-bell svg {
                color: #ffffff;
            }

            .notification-badge {
                position: absolute;
                top: -4px;
                right: -4px;
                width: 16px;
                height: 16px;
                background: #FFC72C;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #1D1D1D;
                font-size: 8px;
                font-weight: bold;
                font-family: 'Nunito', sans-serif;
                animation: badgeAppear 0.5s ease 0.5s both;
            }

            @keyframes badgeAppear {
                from {
                    transform: scale(0);
                }

                to {
                    transform: scale(1);
                }
            }

            /* Greeting Section */
            .greeting-section {
                display: flex;
                flex-direction: column;
                gap: 4px;
                animation: slideInLeft 0.6s ease 0.3s both;
            }

            .greeting-title {
                color: #FFC72C;
                font-size: 28px;
                font-family: 'Signerica', cursive !important;
                line-height: 30.27px;
                animation: slideInLeft 0.6s ease 0.3s both;
            }

            .greeting-name {
                color: #FDFDFD;
                font-size: 28px;
                font-family: "Gelasio", serif;
                font-weight: bold;
                line-height: 28px;
                animation: slideInLeft 0.6s ease 0.4s both;
            }

            .greeting-message {
                color: rgba(255, 255, 255, 0.5);
                font-size: 16px;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 300;
                line-height: 16px;
                animation: fadeIn 0.6s ease 0.5s both;
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

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            /* Main Card */
            .main-card {
                height: 210px;
                background: transparent;
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                padding: 20px;
                padding-top: 60px;
                position: relative;
                overflow: hidden;
                cursor: pointer;
                animation: cardAppear 0.6s ease 0.6s both;
            }

            .main-card:hover {
                transform: scale(1.02);
                transition: transform 0.2s ease;
            }

            .card-overlay {
                position: absolute;
                inset: 0;
                background-image: var(--banner-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .card-content {
                position: relative;
                z-index: 10;
                display: flex;
                flex-direction: column;
                gap: 4px;
                flex: 1;
                justify-content: flex-end;
            }

            .card-location {
                color: #FFC72C;
                font-size: 15px;
                font-family: "Gelasio", serif;
                font-weight: bold;
                line-height: 15px;
                animation: slideInUp 0.6s ease 0.6s both;
            }

            .card-title {
                color: #FFC72C;
                font-size: 19px;
                font-family: "Gelasio", serif;
                font-weight: bold;
                line-height: 19px;
                animation: slideInUp 0.6s ease 0.7s both;
            }

            .card-description {
                color: #FDFDFD;
                font-size: 14px;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 400;
                animation: slideInUp 0.6s ease 0.8s both;
            }

            .card-buttons {
                display: flex;
                gap: 4px;
                margin-top: 8px;
            }

            .card-button {
                flex: 1;
                height: 39px;
                padding: 0 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.2s ease;
                border: none;
                cursor: pointer;
                font-family: 'Fira Sans', sans-serif;
                font-size: 14px;
                font-weight: 500;
                animation: slideInUp 0.6s ease 0.9s both;
            }

            .card-button:hover {
                transform: scale(1.02);
            }

            .card-button:active {
                transform: scale(0.98);
            }

            .card-button.active {
                background: #FFC72C;
                color: black;
            }

            .card-button:not(.active) {
                background: transparent;
                border: 1px solid #CFCFCF;
                color: #CFCFCF;
            }

            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes cardAppear {
                from {
                    opacity: 0;
                    transform: scale(0.9);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            /* Navigation Cards */
            .navigation-cards {
                display: flex;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.0s both;
            }

            .nav-card {
                flex: 1;
                background: black;
                padding: 24px 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .nav-card:hover {
                transform: scale(1.02);
                background: #2A2A2A;
            }

            .nav-card:active {
                transform: scale(0.98);
            }

            .nav-card span {
                color: #FDFDFD;
                font-size: 16px;
                font-family: 'Fira Sans', sans-serif;
            }

            /* Directory Section */
            .directory-section {
                background: black;
                padding: 16px;
                display: flex;
                flex-direction: column;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.1s both;
                cursor: pointer;
                transition: all 0.2s ease;
                position: relative;
                overflow: hidden;
            }

            .directory-section::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 16px 16px 0;
                border-color: transparent #FFC72C transparent transparent;
                transition: all 0.2s ease;
            }

            .section-title {
                color: #FDFDFD;
                font-size: 24px;
                font-family: "Gelasio", serif;
                font-weight: bold;
            }

            .section-subtitle {
                color: rgba(255, 255, 255, 0.5);
                font-size: 14px;
                font-family: 'Fira Sans', sans-serif;
            }

            .directory-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 16px;
                margin-top: 16px;
            }

            .directory-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 8px;
                padding: 16px;
                background: rgba(255, 255, 255, 0.1);
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .directory-item:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: scale(1.05);
            }

            .directory-section:hover {
                background: #2A2A2A;
                transform: scale(1.02);
            }

            .directory-section:active {
                transform: scale(0.98);
            }

            .directory-icon {
                font-size: 24px;
            }

            .directory-item span {
                color: #FDFDFD;
                font-family: 'Fira Sans', sans-serif;
                font-size: 14px;
            }

            /* Report Cards */
            .report-cards {
                display: flex;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.2s both;
            }

            .report-card {
                flex: 1;
                height: 170px;
                background-size: cover;
                background-position: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
                cursor: pointer;
            }

            .report-card:hover {
                transform: scale(1.02);
                transition: transform 0.2s ease;
            }

            .travel-card {
                background: transparent;
            }

            .deal-card {
                background: transparent;
            }

            .manual-card {
                background: transparent;
            }

            .conflict-card {
                background: transparent;
            }

            .report-overlay {
                position: absolute;
                inset: 0;
            }

            .travel-card .report-overlay {
                background-image: var(--travel-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .deal-card .report-overlay {
                background-image: var(--deal-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .manual-card .report-overlay {
                background-image: var(--manual-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .conflict-card .report-overlay {
                background-image: var(--conflict-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .report-content {
                position: relative;
                z-index: 10;
                text-align: center;
            }

            .report-title {
                color: #1D1D1D;
                font-size: 24px;
                font-family: "Gelasio", serif;
                font-weight: bold;
            }

            .report-subtitle {
                color: #1D1D1D;
                font-size: 16px;
                font-family: 'Fira Sans', sans-serif;
            }

            /* Meet Section */
            .meet-section {
                background-color: #d1d1d2;
                padding: 16px;
                display: flex;
                flex-direction: column;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.3s both;
                cursor: pointer;
                transition: all 0.2s ease;
                position: relative;
                overflow: hidden;
            }

            .meet-section::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 16px 16px 0;
                border-color: transparent #FFC72C transparent transparent;
                transition: all 0.2s ease;
            }

            .meet-section .section-title {
                color: #1D1D1D;
            }

            .meet-section .section-subtitle {
                color: rgba(29, 29, 29, 0.5);
            }

            .meet-events {
                margin-top: 16px;
                display: flex;
                flex-direction: column;
                gap: 16px;
            }

            .meet-event {
                display: flex;
                gap: 16px;
                padding: 16px;
                background: rgba(255, 255, 255, 0.8);
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .meet-event:hover {
                background: rgba(255, 255, 255, 1);
                transform: scale(1.02);
            }

            .meet-section:hover {
                background: rgba(167, 168, 170, 0.7);
                transform: scale(1.02);
            }

            .meet-section:active {
                transform: scale(0.98);
            }

            .event-time {
                color: #1D1D1D;
                font-family: 'Fira Sans', sans-serif;
                font-weight: bold;
                font-size: 16px;
                min-width: 60px;
            }

            .event-details h4 {
                color: #1D1D1D;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 600;
                font-size: 16px;
                margin-bottom: 4px;
            }

            .event-details p {
                color: rgba(29, 29, 29, 0.7);
                font-family: 'Fira Sans', sans-serif;
                font-size: 14px;
            }

            /* Responsive Design */
            @media (max-width: 400px) {
                .dashboard-container {
                    padding: 16px;
                }

                .dashboard-content {
                    max-width: 100%;
                }

                .greeting-title,
                .greeting-name {
                    font-size: 24px;
                }

                .main-card {
                    height: 180px;
                }

                .card-title {
                    font-size: 16px;
                }

                .nav-card span {
                    font-size: 14px;
                }
            }

            /* Animation delays for staggered entrance */
            .header {
                animation: fadeIn 0.6s ease 0.2s both;
            }

            /* Hover effects for interactive elements */
            .avatar-container,
            .menu-button,
            .notification-container,
            .nav-card,
            .directory-item,
            .report-card,
            .meet-event {
                transition: all 0.2s ease;
            }

            /* Focus states for accessibility */
            .card-button:focus,
            .nav-card:focus,
            .directory-item:focus,
            .directory-section:focus,
            .meet-section:focus {
                outline: 2px solid #FFC72C;
                outline-offset: 2px;
            }
        }

        /* End of @media (max-width: 768px) */

        /* DESKTOP DASHBOARD STYLES - Only for viewports > 768px */
        @media (min-width: 769px) {

            /* Dashboard Container */
            .dashboard-container {
                min-height: 100vh;
                background: #232323;
                padding: 20px;
                overflow: hidden;
            }

            .dashboard-content {
                width: 100%;
                max-width: none;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            /* Header */
            .header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            .avatar-container {
                cursor: pointer;
                transition: transform 0.2s ease;
                text-decoration: none;
                display: block;
            }

            .avatar-container:hover {
                transform: scale(1.1);
            }

            .avatar-container:active {
                transform: scale(0.95);
            }

            .avatar {
                width: 32px;
                height: 32px;
                border-radius: 50%;
            }

            .notification-container {
                position: relative;
                cursor: pointer;
                transition: transform 0.2s ease;
            }

            .notification-container:hover {
                transform: scale(1.1);
            }

            .notification-container:active {
                transform: scale(0.95);
            }

            .notification-bell {
                width: 35px;
                height: 36px;
                background: #ffc72c00;
                border-radius: 2px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .notification-bell svg {
                color: #ffffff;
            }

            .notification-badge {
                position: absolute;
                top: -4px;
                right: -4px;
                width: 16px;
                height: 16px;
                background: #FFC72C;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #1D1D1D;
                font-size: 8px;
                font-weight: bold;
                font-family: 'Nunito', sans-serif;
                animation: badgeAppear 0.5s ease 0.5s both;
            }

            /* Greeting Section */
            .greeting-section {
                display: flex;
                flex-direction: column;
                gap: 4px;
                animation: slideInLeft 0.6s ease 0.3s both;
            }

            .greeting-title {
                color: #FFC72C;
                font-size: 28px;
                font-family: 'Signerica', cursive !important;
                line-height: 30.27px;
                animation: slideInLeft 0.6s ease 0.3s both;
            }

            .greeting-name {
                color: #FDFDFD;
                font-size: 28px;
                font-family: "Gelasio", serif;
                font-weight: bold;
                line-height: 28px;
                animation: slideInLeft 0.6s ease 0.4s both;
            }

            .greeting-message {
                color: rgba(255, 255, 255, 0.5);
                font-size: 16px;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 300;
                line-height: 16px;
                animation: fadeIn 0.6s ease 0.5s both;
            }

            /* Main Card */
            .main-card {
                min-height: 250px;
                background: transparent;
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                padding: 20px;
                padding-top: 60px;
                position: relative;
                overflow: hidden;
                cursor: pointer;
                animation: cardAppear 0.6s ease 0.6s both;
            }

            .main-card:hover {
                transform: scale(1.02);
                transition: transform 0.2s ease;
            }

            .card-overlay {
                position: absolute;
                inset: 0;
                background-image: var(--banner-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .card-content {
                position: relative;
                z-index: 10;
                display: flex;
                flex-direction: column;
                gap: 4px;
                flex: 1;
                justify-content: flex-end;
            }

            .card-location {
                color: #FFC72C;
                font-size: 15px;
                font-family: "Gelasio", serif;
                font-weight: bold;
                line-height: 15px;
                animation: slideInUp 0.6s ease 0.6s both;
            }

            .card-title {
                color: #FFC72C;
                font-size: 19px;
                font-family: "Gelasio", serif;
                font-weight: bold;
                line-height: 19px;
                animation: slideInUp 0.6s ease 0.7s both;
            }

            .card-description {
                color: #FDFDFD;
                font-size: 14px;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 400;
                animation: slideInUp 0.6s ease 0.8s both;
            }

            .card-buttons {
                display: flex;
                gap: 4px;
                margin-top: 8px;
            }

            .card-button {
                flex: 1;
                height: 39px;
                padding: 0 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.2s ease;
                border: none;
                cursor: pointer;
                font-family: 'Fira Sans', sans-serif;
                font-size: 14px;
                font-weight: 500;
                animation: slideInUp 0.6s ease 0.9s both;
            }

            .card-button:hover {
                transform: scale(1.02);
            }

            .card-button:active {
                transform: scale(0.98);
            }

            .card-button.active {
                background: #FFC72C;
                color: black;
            }

            .card-button:not(.active) {
                background: transparent;
                border: 1px solid #CFCFCF;
                color: #CFCFCF;
            }

            /* Navigation Cards */
            .navigation-cards {
                display: flex;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.0s both;
            }

            .nav-card {
                flex: 1;
                background: black;
                padding: 24px 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .nav-card:hover {
                transform: scale(1.02);
                background: #2A2A2A;
            }

            .nav-card:active {
                transform: scale(0.98);
            }

            .nav-card span {
                color: #FDFDFD;
                font-size: 16px;
                font-family: 'Fira Sans', sans-serif;
            }

            /* Directory Section */
            .directory-section {
                background: black;
                padding: 16px;
                display: flex;
                flex-direction: column;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.1s both;
                cursor: pointer;
                transition: all 0.2s ease;
                position: relative;
                overflow: hidden;
            }

            .directory-section::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 16px 16px 0;
                border-color: transparent #FFC72C transparent transparent;
                transition: all 0.2s ease;
            }

            .section-title {
                color: #FDFDFD;
                font-size: 24px;
                font-family: "Gelasio", serif;
                font-weight: bold;
            }

            .section-subtitle {
                color: rgba(255, 255, 255, 0.5);
                font-size: 14px;
                font-family: 'Fira Sans', sans-serif;
            }

            .directory-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 16px;
                margin-top: 16px;
            }

            .directory-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 8px;
                padding: 16px;
                background: rgba(255, 255, 255, 0.1);
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .directory-item:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: scale(1.05);
            }

            .directory-section:hover {
                background: #2A2A2A;
                transform: scale(1.02);
            }

            .directory-section:active {
                transform: scale(0.98);
            }

            .directory-icon {
                font-size: 24px;
            }

            .directory-item span {
                color: #FDFDFD;
                font-family: 'Fira Sans', sans-serif;
                font-size: 14px;
            }

            /* Report Cards */
            .report-cards {
                display: flex;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.2s both;
            }

            .report-card {
                flex: 1;
                height: 170px;
                background-size: cover;
                background-position: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
                cursor: pointer;
            }

            .report-card:hover {
                transform: scale(1.02);
                transition: transform 0.2s ease;
            }

            .travel-card {
                background: transparent;
            }

            .deal-card {
                background: transparent;
            }

            .manual-card {
                background: transparent;
            }

            .conflict-card {
                background: transparent;
            }

            .report-overlay {
                position: absolute;
                inset: 0;
            }

            .travel-card .report-overlay {
                background-image: var(--travel-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .deal-card .report-overlay {
                background-image: var(--deal-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .manual-card .report-overlay {
                background-image: var(--manual-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .conflict-card .report-overlay {
                background-image: var(--conflict-image);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .report-content {
                position: relative;
                z-index: 10;
                text-align: center;
            }

            .report-title {
                color: #1D1D1D;
                font-size: 24px;
                font-family: "Gelasio", serif;
                font-weight: bold;
            }

            .report-subtitle {
                color: #1D1D1D;
                font-size: 16px;
                font-family: 'Fira Sans', sans-serif;
            }

            /* Meet Section */
            .meet-section {
                background-color: #d2d2d3;
                padding: 16px;
                display: flex;
                flex-direction: column;
                gap: 8px;
                animation: fadeIn 0.6s ease 1.3s both;
                cursor: pointer;
                transition: all 0.2s ease;
                position: relative;
                overflow: hidden;
            }

            .meet-section::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 16px 16px 0;
                border-color: transparent #FFC72C transparent transparent;
                transition: all 0.2s ease;
            }

            .meet-section .section-title {
                color: #1D1D1D;
            }

            .meet-section .section-subtitle {
                color: rgba(29, 29, 29, 0.5);
            }

            .meet-events {
                margin-top: 16px;
                display: flex;
                flex-direction: column;
                gap: 16px;
            }

            .meet-event {
                display: flex;
                gap: 16px;
                padding: 16px;
                background: rgba(255, 255, 255, 0.8);
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .meet-event:hover {
                background: rgba(255, 255, 255, 1);
                transform: scale(1.02);
            }

            .meet-section:hover {
                background: rgba(167, 168, 170, 0.7);
                transform: scale(1.02);
            }

            .meet-section:active {
                transform: scale(0.98);
            }

            .event-time {
                color: #1D1D1D;
                font-family: 'Fira Sans', sans-serif;
                font-weight: bold;
                font-size: 16px;
                min-width: 60px;
            }

            .event-details h4 {
                color: #1D1D1D;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 600;
                font-size: 16px;
                margin-bottom: 4px;
            }

            .event-details p {
                color: rgba(29, 29, 29, 0.7);
                font-family: 'Fira Sans', sans-serif;
                font-size: 14px;
            }

            /* Animation delays for staggered entrance */
            .header {
                animation: fadeIn 0.6s ease 0.2s both;
            }

            /* Hover effects for interactive elements */
            .avatar-container,
            .notification-container,
            .nav-card,
            .directory-item,
            .report-card,
            .meet-event {
                transition: all 0.2s ease;
            }

            /* Focus states for accessibility */
            .card-button:focus,
            .nav-card:focus,
            .directory-item:focus,
            .directory-section:focus,
            .meet-section:focus {
                outline: 2px solid #FFC72C;
                outline-offset: 2px;
            }

            /* Desktop Grid Layout for Navigation Items - 2x2 Grid */
            .navigation-cards-container {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(2, 1fr);
                gap: 20px;
                width: 100%;
                height: 100%;
                min-height: 300px;
            }

            .navigation-cards-container .navigation-cards-row {
                display: contents !important;
            }

            .navigation-cards-container .nav-card {
                grid-column: 1;
                grid-row: 1;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .navigation-cards-container .nav-card:nth-child(2) {
                grid-column: 2;
                grid-row: 1;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .navigation-cards-container .directory-section[data-action="promociones"] {
                grid-column: 1;
                grid-row: 2;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .navigation-cards-container .directory-section[data-action="directorio"] {
                grid-column: 2;
                grid-row: 1;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Desktop Grid Layout for Report Cards - 2x2 Grid */
            .report-cards-container {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: auto auto auto;
                gap: 20px;
                width: 100%;
                height: 100%;
                min-height: 400px;
            }

            .report-cards-container .report-cards-row {
                display: contents !important;
            }

            /* First row: Travel and Deal */
            .report-cards-container .report-cards-row:first-child .report-card:first-child {
                grid-column: 1;
                grid-row: 1;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .report-cards-container .report-cards-row:first-child .report-card:last-child {
                grid-column: 2;
                grid-row: 1;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Meet section in the middle */
            .report-cards-container .meet-section {
                grid-column: 1 / -1;
                grid-row: 2;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Second row: Manual and Conflict */
            .report-cards-container .report-cards-row:last-child .report-card:first-child {
                grid-column: 1;
                grid-row: 3;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .report-cards-container .report-cards-row:last-child .report-card:last-child {
                grid-column: 2;
                grid-row: 3;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* Desktop Layout - Three Row Layout */
            .dashboard-content {
                display: grid !important;
                grid-template-rows: auto auto 1fr;
                gap: 20px;
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 20px;
            }

            .dashboard-content .header {
                grid-column: 1 / -1;
                grid-row: 1;
            }

            .dashboard-content .greeting-container {
                grid-column: 1 / -1;
                grid-row: 2;
            }

            .dashboard-content .main-content-row {
                grid-column: 1 / -1;
                grid-row: 3;
                display: grid !important;
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }

            .dashboard-content .left-column-content,
            .dashboard-content .right-column-content {
                display: flex !important;
                flex-direction: column;
                gap: 20px;
                justify-content: space-between;
                height: 100%;
            }


            /* Desktop Animations - Custom for Desktop Layout */
            .dashboard-content .header {
                animation: slideInDown 0.8s ease 0.1s both;
            }

            .dashboard-content .greeting-container {
                animation: slideInRight 0.8s ease 0.3s both;
            }

            .dashboard-content .left-column-content .banner-section {
                animation: slideInLeft 0.8s ease 0.5s both;
            }

            .dashboard-content .left-column-content .navigation-cards-container {
                animation: slideInUp 0.8s ease 0.7s both;
            }


            .dashboard-content .right-column-content .report-cards-container {
                animation: slideInUp 0.8s ease 0.9s both;
            }

            /* Individual Button Animations */
            .dashboard-content .nav-card {
                animation: fadeInScale 0.6s ease 1.1s both;
            }

            .dashboard-content .nav-card:nth-child(2) {
                animation: fadeInScale 0.6s ease 1.2s both;
            }

            .dashboard-content .directory-section[data-action="promociones"] {
                animation: fadeInScale 0.6s ease 1.3s both;
            }

            .dashboard-content .directory-section[data-action="directorio"] {
                animation: fadeInScale 0.6s ease 1.4s both;
            }

            .dashboard-content .report-card {
                animation: fadeInScale 0.6s ease 1.1s both;
            }

            .dashboard-content .report-card:nth-child(2) {
                animation: fadeInScale 0.6s ease 1.2s both;
            }

            .dashboard-content .report-card:nth-child(3) {
                animation: fadeInScale 0.6s ease 1.3s both;
            }

            .dashboard-content .report-card:nth-child(4) {
                animation: fadeInScale 0.6s ease 1.4s both;
            }

            .dashboard-content .meet-section {
                animation: fadeInScale 0.6s ease 1.5s both;
            }

            /* Banner Individual Elements Animations */
            .dashboard-content .card-location {
                animation: slideInUp 0.6s ease 0.6s both;
            }

            .dashboard-content .card-title {
                animation: slideInUp 0.6s ease 0.7s both;
            }

            .dashboard-content .card-description {
                animation: slideInUp 0.6s ease 0.8s both;
            }

            .dashboard-content .card-button {
                animation: slideInUp 0.6s ease 0.9s both;
            }

            .dashboard-content .card-button:nth-child(2) {
                animation: slideInUp 0.6s ease 1.0s both;
            }

            /* Desktop-specific keyframes */
            @keyframes slideInDown {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes fadeInScale {
                from {
                    opacity: 0;
                    transform: scale(0.8);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            /* Desktop Hover Effects */
            .dashboard-content .greeting-section {
                transition: all 0.2s ease;
            }

            .dashboard-content .greeting-section:hover {
                transform: scale(1.02);
            }

            .dashboard-content .main-card {
                transition: all 0.2s ease;
            }

            .dashboard-content .main-card:hover {
                transform: scale(1.02);
            }

            .dashboard-content .main-card:active {
                transform: scale(0.98);
            }

            .dashboard-content .nav-card {
                transition: all 0.2s ease;
            }

            .dashboard-content .nav-card:hover {
                transform: scale(1.05);
            }

            .dashboard-content .nav-card:active {
                transform: scale(0.98);
            }

            .dashboard-content .directory-section {
                transition: all 0.2s ease;
            }

            .dashboard-content .directory-section:hover {
                transform: scale(1.02);
            }

            .dashboard-content .directory-section:active {
                transform: scale(0.98);
            }

            .dashboard-content .report-card {
                transition: all 0.2s ease;
            }

            .dashboard-content .report-card:hover {
                transform: scale(1.05);
            }

            .dashboard-content .report-card:active {
                transform: scale(0.98);
            }

            .dashboard-content .meet-section {
                transition: all 0.2s ease;
            }

            .dashboard-content .meet-section:hover {
                transform: scale(1.02);
            }

            .dashboard-content .meet-section:active {
                transform: scale(0.98);
            }

            /* Desktop Focus States */
            .dashboard-content .nav-card:focus,
            .dashboard-content .directory-section:focus,
            .dashboard-content .report-card:focus,
            .dashboard-content .meet-section:focus {
                outline: 2px solid #FFC72C;
                outline-offset: 2px;
            }
        }

        .h-amber {
            color: #FFC72C !important;
        }

        .bg-color-amber {
            background-color: #FFC72C !important;
            color: black !important;
        }

        .bg-color-gray {
            background-color: #FDFDFD !important;
        }

        .bg-color-gray-light {
            background-color: #EDEDED !important;
            color: black !important;
            align-items: center !important;
            justify-content: center !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 10px !important;
            width: 100% !important;
        }

        .ff-sans {
            font-family: 'Fira Sans', sans-serif !important;
            font-weight: 500 !important;
        }

        /* CSS classes to replace inline styles */
        .avatar-container-relative {
            position: relative;
        }

        .avatar-image {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .avatar-fallback {
            display: flex;
            position: absolute;
            top: 0;
            left: 0;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1rem;
            background-color: #ccc;
            border-radius: 50%;
            color: black;
        }

        .avatar-fallback-hidden {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1rem;
            background-color: #ccc;
            border-radius: 50%;
            color: black;
        }

        .flex-column-gap {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 20px;
        }

        .section-title-black {
            color: black;
        }

        .section-subtitle-gray {
            color: gray;
        }

        .flex-row-gap {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .benefits-text-black {
            color: black;
        }

        .nav-cards-offset {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: -78px;
        }

        .birthday-badge {
            background-color: #FFC72C;
            width: fit-content;
            color: #000 !important;
            padding: 0.5rem 1rem;
        }

        .birthday-avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        .birthday-avatar-fallback {
            width: 40px;
            height: 40px;
        }

        .birthday-button {
            min-width: 90px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 0.75rem;
            padding: 0.2rem 0.5rem;
        }

        .birthday-icon {
            font-size: 0.7rem;
        }

        /* JavaScript notification styles */
        .notification-dynamic {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #FFC72C;
            color: #1D1D1D;
            padding: 12px 16px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 1000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 300px;
            font-family: 'Fira Sans', sans-serif;
            font-size: 14px;
        }

        .notification-close-btn {
            background: none;
            border: none;
            color: #1D1D1D;
            font-size: 18px;
            cursor: pointer;
            margin-left: 8px;
            padding: 0;
            line-height: 1;
        }

        .animation-fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .animation-fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Click animation utility class */
        .transform-scale-95 {
            transform: scale(0.95) !important;
            transition: transform 0.15s ease;
        }

        @media (min-width: 769px) {
            .bg-color-gray-light {
            background-color: #EDEDED !important;
            color: black !important;
            align-items: center !important;
            justify-content: center !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 10px !important;
            width: 100% !important;
            margin-top: -108px !important;
        }
        }
    </style>
@endsection
@section('body')

    <body data-topbar="dark" class="bg-color">
    @endsection
    @section('content')
        <div class="dashboard-container">
            <div class="dashboard-content">
                <!-- Header -->
                <div class="header">
                    @php
                        use Illuminate\Support\Facades\File;

                        $user = Auth::user();
                        $avatarFile = $user->avatar ?? null;
                        $avatarPath = public_path('build/images/users/' . $avatarFile);
                        $avatarExists = $avatarFile && File::exists($avatarPath);

                        $firstInitial = $user?->first_name[0] ?? '';
                        $lastInitial = $user?->last_name[0] ?? '';
                    @endphp

                    <a href="{{ route('my.profile') }}" class="avatar-container avatar-container-relative" nonce="newN0nc3ForS3cur1ty" nonce="newN0nc3ForS3cur1ty">
                        @if ($avatarExists)
                            <img src="{{ asset('build/images/users/' . $avatarFile) }}" alt="Avatar" class="avatar avatar-image"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                nonce="newN0nc3ForS3cur1ty" nonce="newN0nc3ForS3cur1ty">
                        @endif

                        {{-- Span se muestra solo si no existe avatar o si falla la carga --}}
                        @if (!$avatarExists)
                            <span class="avatar-fallback" nonce="newN0nc3ForS3cur1ty" nonce="newN0nc3ForS3cur1ty">
                                {{ $firstInitial }}{{ $lastInitial }}
                            </span>
                        @else
                            <span class="avatar-fallback-hidden" nonce="newN0nc3ForS3cur1ty" nonce="newN0nc3ForS3cur1ty">
                                {{ $firstInitial }}{{ $lastInitial }}
                            </span>
                        @endif
                    </a>


                    <!-- <a href="{{ route('notificaciones.index') }}" class="notification-container">
                                            <div class="notification-bell">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9z"></path>
                                                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                                                </svg>
                                            </div>
                                            <div class="notification-badge">4</div>
                                        </a> -->
                </div>

                <!-- Greeting Section Container -->
                <div class="greeting-container mt-5">
                    <div class="greeting-section">
                        @php
                            use Carbon\Carbon;

                            $hour = Carbon::now()->hour;
                            if ($hour >= 6 && $hour < 12) {
                                $greeting = 'Buenos días';
                            } elseif ($hour >= 12 && $hour < 20) {
                                $greeting = 'Buenas tardes';
                            } else {
                                $greeting = 'Buenas noches';
                            }
                        @endphp

                        <h1 class="greeting-title">{{ $greeting }}</h1>

                        <h2 class="greeting-name">{{ Auth::user()->name }}</h2>
                    </div>

                </div>

                <div class="main-content-row">
                    <!-- Left Column Content -->
                    <div class="left-column-content">
                        <!-- Banner Section (Main Card) -->
                        <div class="banner-section">
                            <!-- Main Card -->
                            <div class="main-card">
                                <div class="card-overlay"></div>
                                <div class="card-content">
                                    <div class="card-location">CDMX</div>
                                    <h3 class="card-title h-amber">Nuestro nuevo edificio</h3>
                                    <!-- <p class="card-description">
                                                                                    Búsqueda de servicios y<br>
                                                                                    distribución en Park Hyatt
                                                                                </p> -->

                                    <div class="card-buttons">
                                        <a href="{{ route('maps.index') }}" class="card-button active"
                                            data-action="explorar">
                                            <span>Explorar</span>
                                        </a>
                                        <a href="{{ route('menu_items.index') }}" class="card-button"
                                            data-action="catering">
                                            <span>Catering</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="https://issuu.com/galiciaabogados/docs/manual_appgalicia?fr=sZDRkNjgzNTAxMzY"
                            target="_blank" class="btn btn-sm px-3 font-size-16 header-item d-flex align-items-center">
                            <span>Guía de instalación y uso #AppGalicia</span>
                        </a>
                        <!-- Mai

                                    <!-- Navigation Cards Container -->
                        <div class="navigation-cards-container flex-column-gap" nonce="newN0nc3ForS3cur1ty" nonce="newN0nc3ForS3cur1ty">

                            <!-- Promociones Button -->
                            <a href="{{ route('user.manual') }}" class="directory-section bg-color-gray"
                                data-action="usermanual">
                                <h4 class="section-title section-title-black" nonce="newN0nc3ForS3cur1ty" nonce="newN0nc3ForS3cur1ty">Manual de Inducción</h4>
                                <p class="section-subtitle section-subtitle-gray" nonce="newN0nc3ForS3cur1ty" nonce="newN0nc3ForS3cur1ty">Nuevas Oficinas</p>
                            </a>

                            <!-- Directory Section -->
                            <a href="{{ route('directory.index') }}" class="directory-section" data-action="directorio">
                                <h4 class="section-title" nonce="newN0nc3ForS3cur1ty">Directorio</h4>
                                <p class="section-subtitle" nonce="newN0nc3ForS3cur1ty">Contacto y ubicación</p>
                            </a>


                        </div>
                    </div>

                    <!-- Right Column Content -->
                    <div class="right-column-content">
                        <!-- Report Cards Container -->
                        <div class="report-cards-container flex-column-gap" nonce="newN0nc3ForS3cur1ty">
                            <!-- First Row - Travel and Deal Cards -->
                            <div class="report-cards-row flex-row-gap" nonce="newN0nc3ForS3cur1ty">
                                <a href="{{ route('travels') }}" class="report-card travel-card">
                                    <div class="report-overlay"></div>
                                    <div class="report-content">
                                        <h4 class="report-title">Travel</h4>
                                        <p class="report-subtitle">Reports</p>
                                    </div>
                                </a>

                                <a href="{{ route('meet.index') }}" class="report-card deal-card">
                                    <div class="report-overlay"></div>
                                    <div class="report-content">
                                        <h4 class="report-title">#Galicia <br>Meet</h4>
                                    </div>
                                </a>
                            </div>

                            <!-- Meet Section -->
                            <a href="{{ route('contacts') }}" class="meet-section" data-action="meet">
                                <h4 class="section-title">Registra Contactos</h4>
                                <p class="section-subtitle">Mis contactos de otros despachos / empresas</p>
                            </a>

                            <div class="d-sm-block d-md-none">
                                <div class="navigation-cards-row flex-row-gap" nonce="newN0nc3ForS3cur1ty">
                                    <a href="{{ route('next-to-me.index') }}" class="nav-card">
                                        <span class="ff-sans">Cerca de mí</span>
                                    </a>
                                    <a href="{{ route('benefits') }}" class="nav-card bg-color-amber">
                                        <span class="ff-sans benefits-text-black text-black" >Mis beneficios</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Navigation Cards Row -->
                        <div class="d-none d-md-block">
                            <div class="navigation-cards-container custom-responsive-container nav-cards-offset">
                                <div class="navigation-cards-row flex-row-gap" nonce="newN0nc3ForS3cur1ty">
                                    <a href="{{ route('next-to-me.index') }}" class="nav-card">
                                        <span class="ff-sans">Cerca de mí</span>
                                    </a>
                                    <a href="{{ route('benefits') }}" class="nav-card bg-color-amber">
                                        <span class="ff-sans benefits-text-black text-black" >Mis beneficios</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                         <!-- Parking Regulation Section -->
                         <a href="{{ route('parking.regulation') }}" class="directory-section bg-color-gray-light" data-action="parking">
                                <h4 class="section-title section-title-black" nonce="newN0nc3ForS3cur1ty">Reglamento de Estacionamiento</h4>
                            </a>
                    </div>
            </div>
            <div class="birthdays-section pt-5">
                                    <!-- Birthdays Section -->
                                    @if (count($upcomingBirthdays) > 0)
                                    <div class="card-body bg-dark text-white py-3">
                                        <div>
                                            <div>
                                                <h6 class="card-subtitle mb-2 text-white">¡Hoy celebramos</h6>
                                                <div class="birthday-badge" nonce="newN0nc3ForS3cur1ty">
                                                    <h4 class="mb-0 fw-bold">Cumpleaños!</h4>
                                                </div>
                                                @foreach ($upcomingBirthdays as $user)
                                                    @php
                                                        $firstInitial = !empty($user->first_name)
                                                            ? strtoupper(substr(trim($user->first_name), 0, 1))
                                                            : '';
                                                        $lastInitial = !empty($user->last_name)
                                                            ? strtoupper(substr(trim($user->last_name), 0, 1))
                                                            : '';
                                                        $initial = trim($firstInitial . $lastInitial);
                                                        $hasAvatar = !empty($user->avatar);
                                                        $fullName = trim(
                                                            ($user->first_name ?? '') . ' ' . ($user->last_name ?? ''),
                                                        );
            
                                                        $avatarFile = $user->avatar ?? null;
                                                        $avatarPath = public_path('build/images/users/' . $avatarFile);
                                                        $avatarExists = $avatarFile && File::exists($avatarPath);
            
                                                        $practiceArea = $user->practiceAreas->first()->name ?? 'Sin equipo';
                                                        $birthday = $user->birthdate
                                                            ? strtoupper(
                                                                \Carbon\Carbon::parse($user->birthdate)
                                                                    ->locale('es')
                                                                    ->isoFormat('MMM DD'),
                                                            )
                                                            : '';
                                                    @endphp
                                                    <div class="d-flex align-items-center mb-3 p-2 border-bottom border-secondary">
                                                        <div class="position-relative me-3">
                                                            @if ($avatarExists)
                                                                <img src="{{ asset('build/images/users/' . $avatarFile) }}"
                                                                    alt="{{ $fullName }}"
                                                                    class="rounded-circle border border-2 border-warning birthday-avatar"
                                                                    nonce="newN0nc3ForS3cur1ty"
                                                                    onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                            @endif
                                                            @if (!$avatarExists)
                                                                <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center birthday-avatar-fallback"
                                                                    nonce="newN0nc3ForS3cur1ty">
                                                                    <span class="text-dark fw-bold">{{ $initial }}</span>
                                                                </div>
                                                            @endif
                                                            @if (\Carbon\Carbon::parse($user->birthdate)->isBirthday())
                                                                <span
                                                                    class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                                                                    ¡Hoy!
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between w-100">
                                                            <div class="ms-2">
                                                                <div class="d-block text-white">{{ $fullName }}</div>
                                                                <small class="text-white-50">{{ $practiceArea }}</small>
                                                            </div>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="text-warning small text-nowrap me-2">
                                                                    {{ $birthday }}
                                                                </div>
                                                                <button class="btn btn-sm btn-warning btn-felicitar birthday-button"
                                                                                    data-user-id="{{ $user->id }}"
                                                                                    nonce="newN0nc3ForS3cur1ty">
                                                                                    <i class="fas fa-birthday-cake me-1 birthday-icon" nonce="newN0nc3ForS3cur1ty"></i> Felicitar
                                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="text-end mt-2">
                                                    <a href="{{ route('dashboard.next-birthday-complete') }}"
                                                        class="text-warning text-decoration-none small">
                                                        Ver todos <i class="fas fa-chevron-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        
        @endsection
        @section('scripts')
            {{-- datatables js --}}
            <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js" integrity="sha384-0DP0MDbig+ZDZ9nB+hxK0onRr5KVsL0nGdTEFh1XVBS7HRf4AHMW2i+bOKH+8qkK" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" integrity="sha384-wziAfh6b/qT+3LrqebF9WeK4+J5sehS6FA10J1t3a866kJ/fvU5UwofWnQyzLtwu" crossorigin="anonymous"></script>


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
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js" integrity="sha384-MgwUq0TVErv5Lkj/jIAgQpC+iUIqwhwXxJMfrZQVAOhr++1MR02yXH8aXdPc3fk0" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js" integrity="sha384-ytWx70TEZNWKvhA4mV4nQPHLRzPJeBf42voNnsXOSCv7ZxlBWQIceO1G8bJirjxl" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js" integrity="sha384-m1YnvBcNGjKAtJ9d9O4s6EuBhKPlLADOZwIu9q7rZBl9d52CUmsHElEO7fNmajv9" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js" integrity="sha384-tMI2NOtgmf/QM9L3vlG0tyNSWXuAnVHcIOhU6+PDkOqN1a5BAZRMrXCvQIgk9KyG" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha384-+mbV2IY1Zk/X1p/nWllGySJSUN8uMs+gUAN10Or95UBH0fpj6GfKgPmgC5EXieXG" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js" integrity="sha384-MjweF+FY5MNbjB5ONlHWtlrou29MgBI/+acgSv4n5CBD79xUbMbLyka8NeCoK0D7" crossorigin="anonymous"></script>
            <!-- apexcharts -->
            <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js') }}"></script>

            <!-- Vector map-->
            <script src="{{ URL::asset('libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
            <script src="{{ URL::asset('libs/jsvectormap/maps/world-merc.js') }}"></script>

            <!-- App js -->
            <script src="{{ URL::asset('js/app.js') }}"></script>
            <script nonce="newN0nc3ForS3cur1ty" >
                // Mobile Dashboard JavaScript
                document.addEventListener('DOMContentLoaded', function() {
                    // Initialize the dashboard
                    initDashboard();

                    // Add event listeners
                    setupEventListeners();

                    // Start animations
                    startAnimations();
                });

                function initDashboard() {
                    // console.log('Mobile Dashboard initialized');

                    // Set initial state
                    let activeButton = 'explorar';

                    // Add loading animation
                    document.body.classList.add('loaded');
                }

                function setupEventListeners() {
                    // Card button functionality (para botones y enlaces)
                    const cardButtons = document.querySelectorAll('.card-button');
                    cardButtons.forEach(button => {
                        button.addEventListener('click', function(e) {
                            const action = this.dataset.action;

                            // Si es un enlace, no prevenir el comportamiento por defecto
                            if (this.tagName.toLowerCase() === 'a' && action === 'catering') {
                                handleCardButtonClick(action, this);
                                // Permitir que el enlace funcione normalmente
                                return;
                            }

                            // Para botones, prevenir comportamiento por defecto si es necesario
                            if (this.tagName.toLowerCase() === 'button') {
                                e.preventDefault();
                                handleCardButtonClick(action, this);
                            }
                        });
                    });

                    // Navigation cards
                    const navCards = document.querySelectorAll('.nav-card');
                    navCards.forEach(card => {
                        card.addEventListener('click', function() {
                            handleNavCardClick(this);
                        });
                    });

                    // Directory items
                    const directoryItems = document.querySelectorAll('.directory-item');
                    directoryItems.forEach(item => {
                        item.addEventListener('click', function() {
                            handleDirectoryItemClick(this);
                        });
                    });

                    // Report cards
                    const reportCards = document.querySelectorAll('.report-card');
                    reportCards.forEach(card => {
                        card.addEventListener('click', function() {
                            handleReportCardClick(this);
                        });
                    });

                    // Meet events
                    const meetEvents = document.querySelectorAll('.meet-event');
                    meetEvents.forEach(event => {
                        event.addEventListener('click', function() {
                            handleMeetEventClick(this);
                        });
                    });

                    // Header interactions
                    setupHeaderInteractions();
                }

                function handleCardButtonClick(action, button) {
                    // Si es el enlace de catering, permitir navegación normal
                    if (action === 'catering' && button.tagName.toLowerCase() === 'a') {
                        // El enlace manejará la navegación automáticamente
                        showNotification('Accediendo a catering...', 'info');
                        return;
                    }

                    // Remove active class from all buttons and links
                    document.querySelectorAll('.card-button').forEach(btn => {
                        btn.classList.remove('active');
                    });

                    // Add active class to clicked button
                    button.classList.add('active');

                    // Handle different actions
                    switch (action) {
                        case 'explorar':
                            // console.log('Explorar clicked');
                            showNotification('Explorando servicios...', 'info');
                            break;
                        case 'catering':
                            // console.log('Catering clicked');
                            showNotification('Accediendo a catering...', 'info');
                            // Redirigir a la página de catering
                            window.location.href = button.href;
                            break;
                    }

                    // Add click animation
                    button.classList.add('transform-scale-95');
                    setTimeout(() => {
                        button.classList.remove('transform-scale-95');
                    }, 150);
                }

                function handleNavCardClick(card) {
                    const text = card.querySelector('span').textContent;
                    // console.log('Navigation clicked:', text);

                    if (text.includes('mudanza')) {
                        showNotification('Abriendo plan de mudanza...', 'info');
                    } else if (text.includes('Cerca')) {
                        showNotification('Buscando ubicaciones cercanas...', 'info');
                    }

                    // Add click animation
                    card.classList.add('transform-scale-95');
                    setTimeout(() => {
                        card.classList.remove('transform-scale-95');
                    }, 150);
                }

                function handleDirectoryItemClick(item) {
                    const text = item.querySelector('span').textContent;
                    // console.log('Directory item clicked:', text);

                    showNotification(`Accediendo a ${text.toLowerCase()}...`, 'info');

                    // Add click animation
                    item.classList.add('transform-scale-95');
                    setTimeout(() => {
                        item.classList.remove('transform-scale-95');
                    }, 150);
                }

                function handleReportCardClick(card) {
                    const title = card.querySelector('.report-title').textContent;
                    // console.log('Report card clicked:', title);

                    showNotification(`Abriendo ${title} reports...`, 'info');

                    // Add click animation
                    card.classList.add('transform-scale-95');
                    setTimeout(() => {
                        card.classList.remove('transform-scale-95');
                    }, 150);
                }

                function handleMeetEventClick(event) {
                    const title = event.querySelector('h4').textContent;
                    const time = event.querySelector('.event-time').textContent;
                    // console.log('Meet event clicked:', title, time);

                    showNotification(`Uniéndose a ${title} a las ${time}`, 'info');

                    // Add click animation
                    event.classList.add('transform-scale-95');
                    setTimeout(() => {
                        event.classList.remove('transform-scale-95');
                    }, 150);
                }

                function setupHeaderInteractions() {
                    // Avatar click
                    const avatar = document.querySelector('.avatar-container');
                    avatar.addEventListener('click', function(e) {
                        // Permitir que el enlace funcione normalmente, solo mostrar notificación
                        showNotification('Abriendo perfil de usuario...', 'info');
                    });

                    // Menu button
                    const menuButton = document.querySelector('.menu-button');
                    menuButton.addEventListener('click', function() {
                        showNotification('Menú principal', 'info');
                    });

                    // Notification bell
                    const notificationBell = document.querySelector('.notification-container');
                    notificationBell.addEventListener('click', function() {
                        showNotification('Notificaciones (2)', 'info');
                    });

                    // Directory section click
                    const directorySection = document.querySelector('.directory-section');
                    directorySection.addEventListener('click', function() {
                        showNotification('Directorio - Contacto y ubicación', 'info');
                    });

                    // Meet section click
                    const meetSection = document.querySelector('.meet-section');
                    meetSection.addEventListener('click', function() {
                        showNotification('Meet - Próximos eventos', 'info');
                    });

                    // Add keyboard support for accessibility
                    directorySection.setAttribute('tabindex', '0');
                    meetSection.setAttribute('tabindex', '0');

                    directorySection.addEventListener('keydown', function(e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            showNotification('Directorio - Contacto y ubicación', 'info');
                        }
                    });

                    meetSection.addEventListener('keydown', function(e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            showNotification('Meet - Próximos eventos', 'info');
                        }
                    });
                }

                function showNotification(message, type = 'info') {
                    // Create notification element
                    const notification = document.createElement('div');
                    notification.className = `notification notification-${type} notification-dynamic`;
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

                    // Apply close button class
                    closeBtn.className = 'notification-close notification-close-btn';
                }

                function startAnimations() {
                    // Add entrance animations to elements
                    const animatedElements = document.querySelectorAll(
                        '.header, .greeting-section, .main-card, .navigation-cards, .directory-section, .report-cards, .meet-section'
                    );

                    animatedElements.forEach((element, index) => {
                        element.classList.add('animation-fade-in');

                        setTimeout(() => {
                            element.classList.add('visible');
                        }, index * 100 + 200);
                    });
                }

                // Add smooth scrolling for better UX
                function smoothScrollTo(element) {
                    element.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }

                // Add keyboard navigation support
                document.addEventListener('keydown', function(e) {
                    switch (e.key) {
                        case 'Escape':
                            // Close any open modals or notifications
                            const notifications = document.querySelectorAll('.notification');
                            notifications.forEach(notification => {
                                notification.style.transform = 'translateX(100%)';
                                setTimeout(() => {
                                    if (notification.parentNode) {
                                        notification.parentNode.removeChild(notification);
                                    }
                                }, 300);
                            });
                            break;
                    }
                });

                // Add touch gesture support for mobile
                let touchStartY = 0;
                let touchEndY = 0;

                document.addEventListener('touchstart', function(e) {
                    touchStartY = e.changedTouches[0].screenY;
                });

                document.addEventListener('touchend', function(e) {
                    touchEndY = e.changedTouches[0].screenY;
                    handleSwipe();
                });

                function handleSwipe() {
                    const swipeThreshold = 50;
                    const diff = touchStartY - touchEndY;

                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            // Swipe up
                            // console.log('Swiped up');
                        } else {
                            // Swipe down
                            // console.log('Swiped down');
                        }
                    }
                }

                // Performance optimization: Use requestAnimationFrame for smooth animations
                function animateWithRAF(callback) {
                    requestAnimationFrame(callback);
                }

                // Add loading state management
                window.addEventListener('load', function() {
                    document.body.classList.add('fully-loaded');

                    // Preload images for better performance
                    const images = [
                        '#',
                        '/modern-cdmx-building.png',
                        '/travel-business-reports.png',
                        '/deal-business-reports.png'
                    ];

                    images.forEach(src => {
                        const img = new Image();
                        img.src = src;
                    });
                });

                // Export functions for potential external use
                window.MobileDashboard = {
                    showNotification,
                    handleCardButtonClick,
                    startAnimations
                };

                // Birthday greeting functionality
                document.querySelectorAll('.btn-felicitar').forEach(button => {
                    button.addEventListener('click', function() {
                        const userId = this.dataset.userId;
                        const btn = this;

                        // Disable button and show loading state
                        btn.disabled = true;
                        const originalText = btn.textContent;
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
                                    confetti({
                                        particleCount: 150,
                                        spread: 70,
                                        origin: {
                                            y: 0.6
                                        },
                                        colors: ['#FFC72C', '#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4']
                                    });
                                    showNotification('🎉 ¡Correo de felicitación enviado!',
                                        'notification-success');
                                } else {
                                    showNotification('Error al enviar el correo.', 'error');
                                }
                            })
                            .catch(() => {
                                showNotification('Error de conexión al enviar el correo.', 'error');
                            })
                            .finally(() => {
                                // Re-enable button and restore text
                                btn.disabled = false;
                                btn.innerHTML = '<i class="fas fa-birthday-cake me-1"></i> Felicitar';
                            });
                    });
                });

                function showNotification(message, type = 'info') {
                    const notification = document.createElement('div');
                    notification.className = `notification notification-${type} notification-dynamic`;
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
                    closeBtn.className = 'notification-close notification-close-btn';
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
