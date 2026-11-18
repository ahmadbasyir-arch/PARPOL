<!DOCTYPE html>
<html lang="id" class="{{ request()->routeIs('wasbang.*') ? 'wasbang-html' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Data Partai Politik Kab. Tanah Laut Tahun 2026 | Portal Resmi')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/tanahlaut.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Flatpickr (Kalender Indonesia) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    
    <style>
        :root {
            --parpol-primary: #1e3a8a; /* Biru Pemerintahan Elegan */
            --parpol-primary-hover: #172554;
            --parpol-secondary: #0f172a; /* Slate / Navy */
            --parpol-accent: #dc2626; /* Merah Tegas */
            --parpol-gold: #f59e0b; /* Kuning Emas */
            --parpol-light: #f8fafc;
            --parpol-gray: #64748b;
        }

        html, body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #1e293b;
            background-color: #f1f5f9;
            overflow-x: hidden !important;
            max-width: 100vw !important;
            width: 100% !important;
            scroll-behavior: smooth;
            -webkit-text-size-adjust: 100%;
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* Container Fluid & Row Mobile Reset */
        @media (max-width: 575.98px) {
            .container, .container-fluid {
                padding-left: 14px !important;
                padding-right: 14px !important;
            }
        }

        /* Swipe Hint Mobile Indicator */
        .swipe-hint {
            display: none;
        }

        @media (max-width: 991.98px) {
            .swipe-hint {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 0.78rem;
                font-weight: 600;
                color: #334155;
                background: linear-gradient(90deg, #eff6ff 0%, #f8fafc 100%);
                border: 1px solid #bfdbfe;
                padding: 7px 12px;
                border-radius: 8px;
                margin-bottom: 10px;
                user-select: none;
            }
        }

        /* Smooth Touch Table Responsive */
        .table-responsive {
            -webkit-overflow-scrolling: touch !important;
            overflow-x: auto !important;
            max-width: 100% !important;
            overscroll-behavior-x: contain;
            position: relative;
        }

        @if(request()->routeIs('wasbang.*'))
        /* ========================================================
           Khusus Modul Wasbang: Skala Proporsional 90% (Tanpa Bug Zoom Terpotong)
           Menggunakan root font scaling (90% = 14.4px) sehingga seluruh elemen
           Bootstrap (font, tombol, margin, card) mengecil rapi sebesar 10%
           (setara zoom 90%), dan layar tetap 100% PENUH tanpa ada celah putih
           atau bagian yang terpotong di sebelah kanan saat zoom browser 100%.
           ======================================================== */
        html.wasbang-html {
            font-size: 90% !important; /* Skala 90% murni untuk seluruh turunan rem */
            width: 100% !important;
            overflow-x: hidden;
        }

        body.wasbang-scoped {
            width: 100% !important;
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f8fafc;
            margin: 0 !important;
            padding: 0 !important;
        }

        body.wasbang-scoped .container {
            max-width: 1320px;
            width: 100%;
        }

        /* ========================================================
           Khusus Tampilan Layar PC / Desktop Wasbang (min-width: 1024px)
           - Memastikan semua elemen navbar muat dalam 1 baris penuh (max-width: 100%)
           - Tombol paling kanan (Login / User Profile / Rekap) tidak terpotong
           - Tanpa horizontal scrollbar
           - Kode tampilan versi ponsel (mobile) tetap aman & tidak terganggu
           ======================================================== */
        @media (min-width: 1024px) {
            html.wasbang-html,
            body.wasbang-scoped {
                overflow-x: hidden !important;
                max-width: 100% !important;
                width: 100% !important;
            }

            /* Container navbar Wasbang: padding pas & proporsional di PC/Laptop */
            body.wasbang-scoped .navbar-parpol .container-fluid {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
                max-width: 100% !important;
            }

            /* Logo & Judul Brand Wasbang di Desktop */
            body.wasbang-scoped .navbar-brand {
                margin-right: 0.35rem !important;
                gap: 0.35rem !important;
            }
            body.wasbang-scoped .navbar-brand img {
                width: 32px !important;
                height: auto !important;
            }
            body.wasbang-scoped .navbar-brand .brand-title {
                font-size: 0.92rem !important;
                letter-spacing: 0.4px !important;
                word-spacing: 1px !important;
            }
            body.wasbang-scoped .navbar-brand .brand-sub {
                font-size: 0.62rem !important;
                letter-spacing: 0.7px !important;
            }

            /* Tombol Pindah Bidang Ramping di Desktop */
            body.wasbang-scoped .btn-outline-secondary.dropdown-toggle {
                padding: 3px 7px !important;
                font-size: 0.72rem !important;
            }

            /* Navbar expand 1 baris penuh di desktop */
            body.wasbang-scoped .navbar-expand-xl .navbar-collapse {
                display: flex !important;
                flex-basis: auto !important;
                background: transparent !important;
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                margin-top: 0 !important;
            }
            body.wasbang-scoped .navbar-expand-xl .navbar-toggler {
                display: none !important;
            }

            /* Rapatkan jarak (gap/margin) antar menu navigasi Wasbang */
            body.wasbang-scoped .navbar-nav {
                gap: 0.3rem !important;
                margin-bottom: 0 !important;
                align-items: center !important;
            }

            /* Padding & Font Nav Links Wasbang di Desktop */
            body.wasbang-scoped .navbar-nav .nav-link {
                padding: 5px 7px !important;
                font-size: 0.81rem !important;
                white-space: nowrap !important;
                border-radius: 6px !important;
            }
            body.wasbang-scoped .navbar-nav .nav-link i {
                font-size: 0.83rem !important;
                margin-right: 3px !important;
            }

            /* Kontainer Tombol Aksi di Pojok Kanan Navbar Wasbang */
            body.wasbang-scoped .navbar-collapse > .d-flex {
                margin-left: auto !important;
                gap: 0.4rem !important;
                flex-direction: row !important;
                align-items: center !important;
                margin-top: 0 !important;
                padding-top: 0 !important;
                border-top: none !important;
                flex-shrink: 0 !important;
            }

            /* Tombol Rekap Arsip di Wasbang */
            body.wasbang-scoped .btn-warning.btn-sm,
            body.wasbang-scoped .btn-cetak-rekap {
                padding: 5px 9px !important;
                font-size: 0.78rem !important;
                white-space: nowrap !important;
                border-radius: 6px !important;
            }

            /* Tombol Login Wasbang di Paling Kanan */
            body.wasbang-scoped .btn-danger.btn-sm {
                padding: 5px 12px !important;
                font-size: 0.78rem !important;
                white-space: nowrap !important;
                border-radius: 6px !important;
                flex-shrink: 0 !important;
            }

            /* Tombol Profil Pengguna (Bapak Kaban / Ibu Kabid / Staf Wasbang) */
            body.wasbang-scoped .btn-user-portal {
                padding: 5px 9px !important;
                font-size: 0.78rem !important;
                max-width: 175px !important;
                white-space: nowrap !important;
                border-radius: 6px !important;
                flex-shrink: 0 !important;
            }
            body.wasbang-scoped .btn-user-portal .text-truncate {
                max-width: 125px !important;
            }

            /* Top Bar Wasbang */
            body.wasbang-scoped .top-bar .container-fluid {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }

        @media (min-width: 1400px) {
            body.wasbang-scoped .navbar-parpol .container-fluid {
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }
            body.wasbang-scoped .navbar-nav {
                gap: 0.65rem !important;
            }
            body.wasbang-scoped .navbar-nav .nav-link {
                padding: 6px 9px !important;
                font-size: 0.84rem !important;
            }
            body.wasbang-scoped .navbar-collapse > .d-flex {
                gap: 0.55rem !important;
                margin-left: 0.85rem !important;
            }
        }

        body.wasbang-scoped .top-bar {
            width: 100%;
        }

        body.wasbang-scoped .navbar {
            width: 100%;
        }

        @media print {
            html.wasbang-html {
                font-size: 100% !important;
            }
            body.wasbang-scoped {
                font-size: 10.5pt !important;
                width: auto !important;
            }
        }
        @endif

        /* Top Bar */
        .top-bar {
            background-color: var(--parpol-secondary);
            color: #94a3b8;
            font-size: 0.82rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .top-bar a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s;
        }

        .top-bar a:hover {
            color: var(--parpol-gold);
        }

        /* Navbar */
        .navbar-parpol {
            background: #ffffff;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.07);
            padding: 8px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand .logo-emblem {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #1e3a8a, #0284c7);
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.15rem;
            box-shadow: 0 3px 8px rgba(30, 58, 138, 0.2);
            flex-shrink: 0;
        }

        .navbar-brand .brand-title {
            font-weight: 800;
            font-size: clamp(0.9rem, 3.6vw, 1.15rem);
            color: var(--parpol-secondary);
            line-height: 1.25;
            letter-spacing: 0.8px;
            word-spacing: 3px;
            white-space: nowrap;
        }

        .navbar-brand .brand-sub {
            font-size: clamp(0.6rem, 2.5vw, 0.68rem);
            font-weight: 600;
            color: var(--parpol-accent);
            letter-spacing: 1.2px;
            word-spacing: 1.5px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .navbar-toggler {
            width: 44px;
            height: 44px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            border: 1.5px solid #cbd5e1 !important;
            background-color: #f8fafc;
            color: #1e3a8a;
            flex-shrink: 0;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.25) !important;
            outline: none;
        }

        @media (max-width: 1199.98px) {
            .navbar-collapse {
                background: #ffffff;
                border-radius: 14px;
                border: 1px solid #e2e8f0;
                box-shadow: 0 16px 32px rgba(15, 23, 42, 0.1);
                padding: 16px 14px;
                margin-top: 12px;
            }
            .nav-link {
                padding: 11px 14px !important;
                font-size: 0.94rem;
                border-radius: 8px;
                margin-bottom: 3px;
                min-height: 44px;
                display: flex;
                align-items: center;
            }
            .nav-link:hover, .nav-link:focus {
                background-color: #eff6ff;
            }
            .navbar-parpol .btn-parpol,
            .navbar-parpol .btn-login-portal,
            .navbar-parpol .btn-user-portal {
                width: 100% !important;
                justify-content: center;
                padding: 10px 16px !important;
                min-height: 44px;
                font-size: 0.92rem;
                border-radius: 8px;
            }
            .navbar-parpol .dropdown {
                width: 100%;
            }
            .navbar-parpol .dropdown-menu {
                width: 100%;
                border: 1px solid #cbd5e1;
            }
        }

        @media (max-width: 767.98px) {
            .form-control, .form-select, .input-group-text {
                min-height: 46px;
                font-size: 16px !important; /* Mencegah auto-zoom di browser iOS Safari */
            }
            textarea.form-control {
                min-height: 100px;
            }
            .btn {
                min-height: 44px;
            }
            .btn-sm {
                min-height: 38px;
            }
        }

        @media (min-width: 576px) {
            .w-sm-auto { width: auto !important; }
        }
        @media (min-width: 768px) {
            .w-md-auto { width: auto !important; }
        }
        @media (min-width: 992px) {
            .w-lg-auto { width: auto !important; }
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            color: #334155 !important;
            padding: 8px 12px !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-size: 0.88rem;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
        }

        .navbar-nav .nav-link:hover {
            color: var(--parpol-primary) !important;
            background-color: #eff6ff;
        }

        /* Padding Horizontal Nyaman Kontainer Navbar Desktop (px-6 s.d. px-8) */
        @media (min-width: 1200px) {
            .navbar-parpol .container-fluid {
                padding-left: 2.5rem !important;
                padding-right: 2.5rem !important;
            }
        }
        @media (min-width: 1400px) {
            .navbar-parpol .container-fluid {
                padding-left: 3.5rem !important;
                padding-right: 3.5rem !important;
            }
        }

        .navbar-nav .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.1), 0 8px 10px -6px rgba(15, 23, 42, 0.05);
            padding: 8px;
        }

        .navbar-nav .dropdown-item {
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.15s ease;
        }

        .navbar-nav .dropdown-item:hover,
        .navbar-nav .dropdown-item:focus {
            background-color: #eff6ff;
        }

        .btn-parpol {
            background-color: var(--parpol-primary);
            color: #ffffff;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid var(--parpol-primary);
            box-shadow: 0 2px 6px rgba(30, 58, 138, 0.2);
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 0.81rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            flex-shrink: 0;
        }

        .btn-parpol:hover {
            background-color: var(--parpol-primary-hover);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(30, 58, 138, 0.3);
        }

        .btn-login-portal {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #0f172a !important;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid #d97706;
            box-shadow: 0 2px 6px rgba(245, 158, 11, 0.25);
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 0.81rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .btn-login-portal:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            color: #ffffff !important;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(217, 119, 6, 0.35);
        }

        .btn-user-portal {
            background-color: #ffffff;
            color: #1e293b !important;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 6px;
            border: 1.5px solid #0f766e;
            box-shadow: 0 2px 5px rgba(15, 118, 110, 0.15);
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 0.81rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            flex-shrink: 0;
            max-width: 175px;
        }

        .btn-user-portal:hover {
            background-color: #f0fdfa;
            border-color: #0d9488;
        }

        /* Section Titles */
        .section-badge {
            display: inline-block;
            background: #dbeafe;
            color: var(--parpol-primary);
            font-weight: 700;
            font-size: 0.8rem;
            padding: 6px 16px;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .section-title {
            font-weight: 800;
            font-size: 2.2rem;
            color: var(--parpol-secondary);
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--parpol-gray);
            font-size: 1.02rem;
            max-width: 720px;
            margin: 0 auto;
        }

        /* Custom Cards */
        .custom-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .custom-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -4px rgba(15, 23, 42, 0.1);
            border-color: #cbd5e1;
        }

        /* Footer */
        .footer-parpol {
            background-color: #0b1120;
            color: #94a3b8;
            padding-top: 60px;
            padding-bottom: 30px;
            border-top: 4px solid var(--parpol-primary);
        }

        .footer-parpol h5 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.05rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .footer-links a:hover {
            color: var(--parpol-gold);
            padding-left: 5px;
        }

        /* Custom Styling Flatpickr Kalender Indonesia */
        .flatpickr-calendar {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            border-radius: 12px !important;
            box-shadow: 0 15px 30px -5px rgba(15, 23, 42, 0.2), 0 10px 15px -5px rgba(15, 23, 42, 0.1) !important;
            border: 1px solid #cbd5e1 !important;
            z-index: 99999 !important;
        }
        .flatpickr-months {
            background: #1e3a8a !important;
            border-top-left-radius: 11px;
            border-top-right-radius: 11px;
            color: #ffffff !important;
            padding: 8px 4px !important;
        }
        .flatpickr-current-month {
            color: #ffffff !important;
            font-weight: 700 !important;
            font-size: 105% !important;
            padding-top: 4px !important;
        }
        .flatpickr-current-month .flatpickr-monthDropdown-months {
            background: #1e3a8a !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            border-radius: 6px;
            padding: 2px 6px;
        }
        .flatpickr-current-month .flatpickr-monthDropdown-months option {
            background-color: #0f172a !important;
            color: #ffffff !important;
        }
        .flatpickr-current-month input.cur-year {
            color: #ffffff !important;
            font-weight: 700 !important;
        }
        .flatpickr-months .flatpickr-prev-month,
        .flatpickr-months .flatpickr-next-month {
            color: #ffffff !important;
            fill: #ffffff !important;
            padding: 8px !important;
        }
        .flatpickr-months .flatpickr-prev-month:hover svg,
        .flatpickr-months .flatpickr-next-month:hover svg {
            fill: #f59e0b !important;
        }
        .flatpickr-weekdays {
            background: #f1f5f9 !important;
            border-bottom: 1px solid #e2e8f0;
            padding: 4px 0 !important;
        }
        span.flatpickr-weekday {
            color: #1e3a8a !important;
            font-weight: 700 !important;
            font-size: 85% !important;
        }
        .flatpickr-day {
            border-radius: 8px !important;
            font-weight: 500 !important;
            color: #1e293b !important;
        }
        .flatpickr-day.selected,
        .flatpickr-day.selected:hover,
        .flatpickr-day.selected:focus {
            background: #1e3a8a !important;
            border-color: #1e3a8a !important;
            color: #ffffff !important;
            font-weight: 700 !important;
        }
        .flatpickr-day.today {
            border-color: #0f766e !important;
            background: #f0fdf4 !important;
            color: #0f766e !important;
            font-weight: 700 !important;
        }
        .flatpickr-day:hover {
            background: #e2e8f0 !important;
        }
        
        /* Integrasi Presisi Flatpickr di dalam Bootstrap Input-Group */
        .input-group > .flatpickr-wrapper {
            flex: 1 1 auto;
            width: 1% !important;
            min-width: 0;
            position: relative;
            display: flex !important;
        }
        .input-group > .flatpickr-wrapper > .flatpickr-input {
            width: 100% !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 0.375rem !important;
            border-bottom-right-radius: 0.375rem !important;
            background-color: #ffffff !important;
            cursor: pointer;
        }
        .flatpickr-calendar.static {
            top: calc(100% + 4px) !important;
            right: 0 !important;
            left: auto !important;
            z-index: 99999 !important;
            position: absolute !important;
        }
    </style>
    @stack('styles')
</head>
<body class="{{ request()->routeIs('wasbang.*') ? 'wasbang-scoped' : '' }}">

    <!-- Bar Informasi Wilayah -->
    <div class="top-bar d-none d-lg-block">
        <div class="container-fluid px-lg-5 px-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span><i class="bi bi-geo-alt-fill text-danger me-1"></i> Kabupaten Tanah Laut, Kalimantan Selatan</span>
                    <span class="mx-2 text-muted">|</span>
                    <a href="{{ route('portal.home') }}" class="text-white text-decoration-none small">
                        <i class="bi bi-house-door me-1"></i> Portal Utama Bakesbangpol
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('wasbang.index') }}" class="fw-semibold text-warning text-decoration-none">
                        <i class="bi bi-flag-fill me-1"></i> Layanan WASBANG
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Utama -->
    <nav class="navbar navbar-expand-xl navbar-parpol shadow-sm sticky-top">
        <div class="container-fluid {{ request()->routeIs('wasbang.*') ? 'px-2 px-xl-3' : 'px-3 px-md-4 px-xl-5 px-xxl-5' }}">
            <div class="d-flex align-items-center gap-2">
                @if(request()->routeIs('wasbang.*'))
                    <a class="navbar-brand d-flex align-items-center gap-2 me-1" href="{{ route('wasbang.index') }}">
                        <img src="{{ asset('images/tanahlaut.png') }}" alt="Logo Kab. Tanah Laut" style="width: 36px; height: auto; object-fit: contain;" class="flex-shrink-0">
                        <div>
                            <div class="brand-title text-danger">PENGARSIPAN WASBANG</div>
                            <div class="brand-sub">Bakesbangpol Kab. Tanah Laut</div>
                        </div>
                    </a>
                @else
                    <a class="navbar-brand d-flex align-items-center gap-2 me-1" href="{{ route('parpol.home') }}">
                        <img src="{{ asset('images/tanahlaut.png') }}" alt="Logo Kab. Tanah Laut" style="width: 36px; height: auto; object-fit: contain;" class="flex-shrink-0">
                        <div>
                            <div class="brand-title">SIPARPOL TANAH LAUT</div>
                            <div class="brand-sub">Kab. Tanah Laut 2026</div>
                        </div>
                    </a>
                @endif

                <!-- Dropdown Switcher Layanan Bidang -->
                <div class="dropdown d-none d-md-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle py-1 px-2 text-dark rounded-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.76rem; font-weight: 600; background: #f8fafc;">
                        <i class="bi bi-grid-fill text-primary me-1"></i> Pindah Bidang
                    </button>
                    <ul class="dropdown-menu shadow border-0 rounded-3 mt-1" style="min-width: 250px;">
                        <li class="px-3 py-2 border-bottom bg-light">
                            <small class="text-muted d-block" style="font-size: 0.72rem;">Portal Bakesbangpol Kab. Tanah Laut</small>
                            <strong class="text-dark small">Pindah Layanan Bidang:</strong>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 small d-flex align-items-center gap-2" href="{{ route('portal.home') }}">
                                <i class="bi bi-house-door-fill text-secondary"></i>
                                <span>Halaman Utama Portal</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 small d-flex align-items-center gap-2 {{ request()->routeIs('parpol.*') ? 'active bg-primary text-white' : '' }}" href="{{ route('parpol.home') }}">
                                <i class="bi bi-bank2 {{ request()->routeIs('parpol.*') ? 'text-white' : 'text-primary' }}"></i>
                                <div>
                                    <div class="fw-bold">SIPARPOL TANAH LAUT</div>
                                    <small class="{{ request()->routeIs('parpol.*') ? 'text-white-50' : 'text-muted' }}" style="font-size: 0.7rem;">Data 20 Parpol &amp; Realisasi Dikpol</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 small d-flex align-items-center gap-2 {{ request()->routeIs('wasbang.*') ? 'active bg-danger text-white' : '' }}" href="{{ route('wasbang.index') }}">
                                <i class="bi bi-flag-fill {{ request()->routeIs('wasbang.*') ? 'text-white' : 'text-danger' }}"></i>
                                <div>
                                    <div class="fw-bold">WASBANG TANAH LAUT</div>
                                    <small class="{{ request()->routeIs('wasbang.*') ? 'text-white-50' : 'text-muted' }}" style="font-size: 0.7rem;">Pengarsipan Dokumentasi Kegiatan</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <button class="navbar-toggler border-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-xl-0 align-items-xl-center {{ request()->routeIs('wasbang.*') ? 'gap-1 gap-xl-2' : 'gap-1 gap-xl-4 gap-xxl-5' }}">
                    @if(request()->routeIs('wasbang.*'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wasbang.index') }}#beranda-wasbang"><i class="bi bi-house-door me-1"></i> Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wasbang.index') }}#urgensi-sistem"><i class="bi bi-info-circle me-1"></i> Tentang Sistem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wasbang.index') }}#arsip-kegiatan"><i class="bi bi-images me-1"></i> Direktori Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('wasbang.index') }}#alur-pengarsipan"><i class="bi bi-diagram-3 me-1"></i> Alur Kerja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger fw-bold" href="{{ route('wasbang.index') }}#tambah-kegiatan"><i class="bi bi-cloud-arrow-up-fill me-1"></i> Unggah Dokumentasi</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('parpol.home') }}#beranda"><i class="bi bi-house-door me-1"></i> Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDataLayanan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-layers-fill me-1 text-primary"></i> Data &amp; Layanan
                            </a>
                            <ul class="dropdown-menu shadow-sm border-0 rounded-3 mt-1 py-2" aria-labelledby="navbarDropdownDataLayanan" style="min-width: 250px;">
                                <li>
                                    <a class="dropdown-item py-2 px-3 small d-flex align-items-center gap-2" href="{{ route('parpol.home') }}#tabel-data">
                                        <i class="bi bi-table text-primary fs-6"></i>
                                        <div>
                                            <span class="fw-semibold d-block text-dark">Tabel Resmi Parpol</span>
                                            <small class="text-muted" style="font-size: 0.72rem;">Rekapitulasi 20 Partai Politik</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2 px-3 small d-flex align-items-center gap-2" href="{{ route('parpol.home') }}#galeri-partai">
                                        <i class="bi bi-grid-3x3-gap text-primary fs-6"></i>
                                        <div>
                                            <span class="fw-semibold d-block text-dark">Direktori Kartu Profil</span>
                                            <small class="text-muted" style="font-size: 0.72rem;">Katalog &amp; Visi Misi Parpol</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2 px-3 small d-flex align-items-center gap-2" href="{{ route('parpol.home') }}#dikpol">
                                        <i class="bi bi-mortarboard-fill text-primary fs-6"></i>
                                        <div>
                                            <span class="fw-semibold d-block text-dark">Realisasi Dikpol</span>
                                            <small class="text-muted" style="font-size: 0.72rem;">Pendidikan Politik &amp; Banpol</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2 px-3 small d-flex align-items-center gap-2" href="{{ route('parpol.home') }}#sebaran">
                                        <i class="bi bi-geo text-primary fs-6"></i>
                                        <div>
                                            <span class="fw-semibold d-block text-dark">Sebaran Kantor DPC</span>
                                            <small class="text-muted" style="font-size: 0.72rem;">Titik Koordinat &amp; Peta Wilayah</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('parpol.home') }}#lapor"><i class="bi bi-pencil-square me-1"></i> Update Data</a>
                        </li>
                    @endif

                    <!-- Switcher Bidang Versi Mobile (Tampil Hanya di Layar HP) -->
                    <li class="nav-item d-md-none mt-2 pt-2 border-top">
                        <span class="text-muted small px-3 fw-bold d-block mb-1" style="font-size: 0.72rem;">PINDAH LAYANAN BAKESBANGPOL:</span>
                        <div class="d-flex flex-column gap-1 px-2">
                            <a href="{{ route('portal.home') }}" class="btn btn-sm btn-light text-start text-dark py-2 px-3 rounded-2 border d-flex align-items-center gap-2">
                                <i class="bi bi-house-door text-secondary"></i> Halaman Utama Portal
                            </a>
                            <a href="{{ route('parpol.home') }}" class="btn btn-sm {{ request()->routeIs('parpol.*') ? 'btn-primary' : 'btn-light text-dark' }} text-start py-2 px-3 rounded-2 border d-flex align-items-center gap-2">
                                <i class="bi bi-bank2"></i> SIPARPOL Kab. Tanah Laut
                            </a>
                            <a href="{{ route('wasbang.index') }}" class="btn btn-sm {{ request()->routeIs('wasbang.*') ? 'btn-danger' : 'btn-light text-dark' }} text-start py-2 px-3 rounded-2 border d-flex align-items-center gap-2">
                                <i class="bi bi-flag-fill"></i> Layanan WASBANG
                            </a>
                        </div>
                    </li>
                </ul>

                <!-- Tombol Aksi di Pojok Kanan Atas (1 Kolom Vertikal di HP, Sebaris di Desktop) -->
                <div class="d-flex flex-column flex-xl-row align-items-stretch align-items-xl-center {{ request()->routeIs('wasbang.*') ? 'gap-2 gap-xl-2 ms-xl-2 ms-xxl-3' : 'gap-2 gap-xl-3 ms-xl-4 ms-xxl-5' }} mt-3 mt-xl-0 pt-3 pt-xl-0 border-top border-xl-0 flex-shrink-0">
                    @if(request()->routeIs('wasbang.*'))
                        <a class="btn btn-warning text-dark fw-bold btn-sm rounded-3 shadow-sm text-decoration-none d-flex align-items-center justify-content-center" href="{{ route('wasbang.cetak') }}" target="_blank" title="Cetak Rekapitulasi Berkas Arsip">
                            <i class="bi bi-printer-fill me-1"></i> <span class="d-none d-xxl-inline">Rekap Arsip</span><span class="d-inline d-xxl-none">Arsip</span>
                        </a>
                    @else
                        <a class="btn-parpol text-decoration-none d-flex align-items-center justify-content-center" href="{{ route('parpol.cetak') }}" target="_blank" title="Cetak Dokumen Resmi">
                            <i class="bi bi-printer-fill me-1"></i> Cetak Dokumen
                        </a>
                    @endif
                    
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-user-portal dropdown-toggle d-inline-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="max-width: 220px;" title="{{ auth()->user()->parpol->nama_partai ?? auth()->user()->name }}">
                                @if(auth()->user()->isParpol() && auth()->user()->parpol)
                                    <span style="width: 20px; height: 20px; border-radius: 4px; background: #ffffff; display: inline-flex; align-items: center; justify-content: center; overflow: hidden; border: 1px solid #cbd5e1;" class="me-1 flex-shrink-0">
                                        <img src="{{ asset(auth()->user()->parpol->logo) }}" alt="{{ auth()->user()->parpol->akronim }}" style="width: 100%; height: 100%; object-fit: contain;">
                                    </span>
                                    <span class="text-truncate" style="max-width: 105px;">{{ str_replace('PARTAI ', '', auth()->user()->parpol->akronim ?? 'Partai') }}</span>
                                @elseif(auth()->user()->isKaban())
                                    <i class="bi bi-person-check-fill text-primary fs-6 me-1 flex-shrink-0"></i>
                                    <span class="text-truncate" style="max-width: 150px;">Bapak Kepala Badan</span>
                                @elseif(auth()->user()->isKabidWasbang())
                                    <i class="bi bi-person-check-fill text-danger fs-6 me-1 flex-shrink-0"></i>
                                    <span class="text-truncate" style="max-width: 150px;">Ibu Kabid Wasbang</span>
                                @elseif(auth()->user()->isStafWasbang())
                                    <i class="bi bi-person-badge-fill text-success fs-6 me-1 flex-shrink-0"></i>
                                    <span class="text-truncate" style="max-width: 150px;">Staf Wasbang</span>
                                @else
                                    <i class="bi bi-shield-check text-primary fs-6 me-1 flex-shrink-0"></i>
                                    <span class="text-truncate" style="max-width: 150px;">Admin Bakesbangpol</span>
                                @endif
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2" style="min-width: 260px;">
                                <li class="px-3 py-2 border-bottom bg-light">
                                    <small class="{{ auth()->user()->isKaban() ? 'text-primary' : (auth()->user()->isKabidWasbang() ? 'text-danger' : (auth()->user()->isStafWasbang() ? 'text-success' : 'text-danger')) }} fw-bold d-block" style="font-size: 0.72rem;">{{ auth()->user()->role_label }}</small>
                                    <strong class="text-dark small d-block">{{ auth()->user()->name }}</strong>
                                    @if(auth()->user()->nip)
                                        <small class="text-muted d-block" style="font-size: 0.72rem;">NIP. {{ auth()->user()->nip }}</small>
                                    @endif
                                </li>
                                @if(auth()->user()->isKaban())
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.index') }}">
                                            <i class="bi bi-shield-shaded text-primary me-2"></i> Ruang Kerja Eksekutif Kaban
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.cetak') }}" target="_blank">
                                            <i class="bi bi-printer-fill text-warning me-2"></i> Rekapitulasi Eksekutif (Cetak A4)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.index', ['view' => 'publik']) }}">
                                            <i class="bi bi-eye-fill text-info me-2"></i> Tampilan Galeri Publik Wasbang
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('dashboard') }}">
                                            <i class="bi bi-speedometer2 text-secondary me-2"></i> Panel Utama Bakesbangpol
                                        </a>
                                    </li>
                                @elseif(auth()->user()->isKabidWasbang())
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.index') }}">
                                            <i class="bi bi-speedometer2 text-danger me-2"></i> Dashboard Pelaporan Wasbang
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.cetak') }}" target="_blank">
                                            <i class="bi bi-printer-fill text-warning me-2"></i> Rekapitulasi Berkas (Cetak A4)
                                        </a>
                                    </li>
                                @elseif(auth()->user()->isStafWasbang())
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.index') }}">
                                            <i class="bi bi-speedometer2 text-success me-2"></i> Dashboard Pengarsipan Wasbang
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.index') }}#tambah-kegiatan">
                                            <i class="bi bi-cloud-arrow-up-fill text-danger me-2"></i> Unggah Dokumentasi Baru
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.cetak') }}" target="_blank">
                                            <i class="bi bi-printer-fill text-warning me-2"></i> Rekapitulasi Berkas (Cetak A4)
                                        </a>
                                    </li>
                                @elseif(auth()->user()->isAdmin())
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('dashboard') }}">
                                            <i class="bi bi-speedometer2 text-primary me-2"></i> Dashboard Bakesbangpol
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('wasbang.index') }}">
                                            <i class="bi bi-archive-fill text-danger me-2"></i> Pengarsipan Wasbang
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item py-2 small" href="{{ route('dashboard') }}">
                                            <i class="bi bi-speedometer2 text-primary me-2"></i> Dashboard Pelaporan Parpol
                                        </a>
                                    </li>
                                @endif
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    @if(auth()->user()->isKaban() || auth()->user()->isKabidWasbang() || auth()->user()->isStafWasbang())
                                        <form action="{{ route('wasbang.logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item py-2 small text-danger">
                                                <i class="bi bi-box-arrow-right me-2"></i> Keluar (Logout)
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item py-2 small text-danger">
                                                <i class="bi bi-box-arrow-right me-2"></i> Keluar (Logout)
                                            </button>
                                        </form>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    @else
                        @if(request()->routeIs('wasbang.*'))
                            <a class="btn btn-danger btn-sm fw-bold px-3 py-2 rounded-3 shadow-sm text-decoration-none d-flex align-items-center justify-content-center" href="{{ route('wasbang.login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login Wasbang
                            </a>
                        @else
                            <a class="btn-login-portal text-decoration-none d-flex align-items-center justify-content-center" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login Petugas
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-parpol">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-5 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="logo-emblem">
                            <i class="bi bi-bank2"></i>
                        </div>
                        <div>
                            <h5 class="text-white fw-bold m-0">SIPARPOL KABUPATEN TANAH LAUT</h5>
                            <span class="text-danger fw-semibold small text-uppercase">Portal Transparansi Partai Politik 2026</span>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3" style="line-height: 1.7;">
                        Sistem informasi publik yang menyajikan data otentik legalitas surat keputusan kepengurusan, jajaran pengurus (Ketua, Sekretaris, Bendahara), alamat sekretariat, kontak Liaison Officer (LO), serta status kelengkapan dokumen (SK3P3) 20 partai politik di Kabupaten Tanah Laut, Kalimantan Selatan.
                    </p>
                    <div class="small text-muted">
                        <i class="bi bi-shield-check text-success me-1"></i> Data Terdaftar Resmi Sesuai Rekapitulasi Parpol Tanah Laut 2026.
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Navigasi Direktori</h5>
                    <ul class="footer-links">
                        <li><a href="#tabel-data">Tabel Dokumen Resmi (20 Parpol)</a></li>
                        <li><a href="#galeri-partai">Galeri Logo & Profil DPC/DPD</a></li>
                        <li><a href="#dikpol">Matriks Pendidikan Politik (Banpol)</a></li>
                        <li><a href="#sebaran">Sebaran Kantor Kecamatan Pelaihari & Batu Ampar</a></li>
                        <li><a href="{{ route('parpol.cetak') }}" target="_blank">Unduh / Cetak Dokumen Lengkap (A4)</a></li>
                        <li><a href="#lapor">Layanan Pengkinian Data Pengurus Parpol</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5>Wilayah Administrasi</h5>
                    <p class="small text-secondary mb-2">
                        <strong class="text-white">Kabupaten Tanah Laut, Kalimantan Selatan</strong><br>
                        Pusat Pemerintahan: Kota Pelaihari 70814<br>
                        Cakupan Sekretariat: Kel. Angsau, Sarang Halang, Karang Taruna, Pabahanan, Pelaihari, Desa Atu Atu, Desa Panggung & Kec. Batu Ampar.
                    </p>
                    <p class="small text-secondary mb-1">
                        <i class="bi bi-info-circle text-primary me-2"></i> Sumber Data: Lembar Rekapitulasi Partai Politik Kab. Tanah Laut 2026
                    </p>
                    <p class="small text-secondary">
                        <i class="bi bi-check2-all text-success me-2"></i> Rekapitulasi Lengkap 20 Partai Politik
                    </p>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="row align-items-center small text-secondary">
                <div class="col-md-7 text-center text-md-start">
                    &copy; 2026 <strong>SIPARPOL Kabupaten Tanah Laut</strong>. Sistem Informasi Data Partai Politik.
                </div>
                <div class="col-md-5 text-center text-md-end mt-2 mt-md-0">
                    <span class="badge bg-secondary me-2">20 Partai Politik</span>
                    <span>Pelaihari &bull; Tanah Laut &bull; Kalsel</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Flatpickr JS & Bahasa Indonesia Localization -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <script>
        (function() {
            // Kamus Baku Bahasa Indonesia untuk Kalender Flatpickr
            const flatpickrIdLocale = {
                weekdays: {
                    shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                    longhand: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
                },
                months: {
                    shorthand: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    longhand: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
                },
                firstDayOfWeek: 1,
                ordinal: function() { return ""; },
                rangeSeparator: " s.d. "
            };

            function initIndonesianDatepickers() {
                if (typeof flatpickr === 'undefined') return;

                // Terapkan locale Indonesia
                const activeLocale = (flatpickr.l10ns && flatpickr.l10ns.id) 
                    ? flatpickr.l10ns.id 
                    : flatpickrIdLocale;

                flatpickr.localize(activeLocale);

                document.querySelectorAll('.datepicker-id:not([data-fp-initialized])').forEach(function(el) {
                    el.setAttribute('data-fp-initialized', 'true');
                    flatpickr(el, {
                        locale: activeLocale,
                        altInput: true,
                        altFormat: "j F Y",
                        dateFormat: "Y-m-d",
                        disableMobile: true,
                        allowInput: false,
                        static: true
                    });
                });
            }

            document.addEventListener('DOMContentLoaded', initIndonesianDatepickers);
            document.addEventListener('shown.bs.modal', function() {
                initIndonesianDatepickers();
            });
            document.addEventListener('hide.bs.modal', function() {
                document.querySelectorAll('.datepicker-id').forEach(function(el) {
                    if (el._flatpickr && el._flatpickr.isOpen) {
                        el._flatpickr.close();
                    }
                });
            });

            // Helper tombol ikon kalender
            window.openIndoDatePicker = function(btn) {
                const group = btn.closest('.input-group');
                if (!group) return;
                const picker = group.querySelector('.datepicker-id');
                if (picker && picker._flatpickr) {
                    if (picker._flatpickr.isOpen) {
                        picker._flatpickr.close();
                    } else {
                        picker._flatpickr.open();
                    }
                }
            };
        })();
    </script>
    @stack('scripts')
</body>
</html>
