@extends('layouts.app')

@section('title', 'Login SIPARPOL - Bakesbangpol Kab. Tanah Laut')

@section('content')
<div class="py-5" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f766e 100%); min-height: 85vh;">
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-5">
                
                <!-- Card Utama Login -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    
                    <!-- Header Card -->
                    <div class="card-header bg-dark text-white p-4 text-center border-0" style="background: linear-gradient(135deg, #1e293b 0%, #0f766e 100%);">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-3 mb-3 shadow p-2" style="width: 68px; height: 68px;">
                            <img src="{{ asset('images/tanahlaut.png') }}" alt="Lambang Kabupaten Tanah Laut" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <h4 class="fw-bold mb-1">Masuk ke SIPARPOL</h4>
                        <p class="text-white-50 small mb-0">
                            Sistem Pelaporan Bantuan Keuangan &amp; Pendidikan Politik<br>
                            <strong>Bakesbangpol Kabupaten Tanah Laut</strong>
                        </p>
                    </div>

                    <!-- Body Card -->
                    <div class="card-body p-4 p-md-5 bg-white">

                        <!-- Pesan Kesalahan Validasi -->
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 py-2 px-3 small mb-4 d-flex align-items-center gap-2">
                                <i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0"></i>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success rounded-3 py-2 px-3 small mb-4 d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill fs-5 flex-shrink-0"></i>
                                <div>{{ session('success') }}</div>
                            </div>
                        @endif

                        <!-- Formulir Login -->
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

                            <!-- Email / Akun -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold small text-secondary">
                                    <i class="bi bi-envelope-at me-1 text-primary"></i> Alamat Email Akun Resmi
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted">
                                        <i class="bi bi-person-fill"></i>
                                    </span>
                                    <input type="email" 
                                           class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="nama@tanahlautkab.go.id" 
                                           required 
                                           autofocus>
                                </div>
                                <div class="form-text text-muted" style="font-size: 0.78rem;">
                                    Gunakan email resmi partai atau email administrator Bakesbangpol.
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label fw-semibold small text-secondary mb-0">
                                        <i class="bi bi-key-fill me-1 text-primary"></i> Kata Sandi
                                    </label>
                                    <a href="#quickDemo" class="text-decoration-none small text-primary" data-bs-toggle="collapse">
                                        <i class="bi bi-info-circle me-1"></i> Bantuan Sandi
                                    </a>
                                </div>
                                <div class="input-group mt-1">
                                    <span class="input-group-text bg-light border-end-0 text-muted">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input type="password" 
                                           class="form-control border-start-0 border-end-0 ps-0 @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="••••••••" 
                                           required>
                                    <button class="btn btn-light border border-start-0 text-muted" type="button" id="togglePassword">
                                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember Me & Info Keamanan -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label small text-secondary" for="remember">
                                        Ingat saya di perangkat ini
                                    </label>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-success w-100 py-2 fw-bold rounded-3 shadow-sm d-flex align-items-center justify-content-center gap-2 mb-3">
                                <i class="bi bi-box-arrow-in-right fs-5"></i> Masuk Sekarang
                            </button>

                            <div class="text-center">
                                <a href="{{ route('parpol.home') }}" class="text-decoration-none small text-muted">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda Publik
                                </a>
                            </div>
                        </form>

                        <!-- Accordion Pintasan Pengujian Demo (Sangat Ramah Penguji PKL) -->
                        <div class="mt-4 pt-3 border-top">
                            <button class="btn btn-outline-secondary btn-sm w-100 rounded-pill text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#quickDemo" aria-expanded="false" aria-controls="quickDemo">
                                <span><i class="bi bi-lightning-charge-fill text-warning me-1"></i> <strong>Pintasan Uji Akun (Demo PKL)</strong></span>
                                <i class="bi bi-chevron-down small"></i>
                            </button>

                            <div class="collapse mt-3" id="quickDemo">
                                <div class="p-3 bg-light rounded-3 border small">
                                    <p class="text-muted mb-2">Klik tombol di bawah untuk mengisi form login secara otomatis:</p>
                                    
                                    <div class="d-flex flex-column gap-2 mb-2">
                                        <button type="button" class="btn btn-dark btn-sm text-start" onclick="fillLogin('bakesbangpol@tanahlautkab.go.id', 'password123')">
                                            <i class="bi bi-shield-check text-warning me-1"></i> <strong>Admin Bakesbangpol</strong> (Superadmin)
                                        </button>
                                        <button type="button" class="btn btn-outline-primary btn-sm text-start" onclick="fillLogin('pks@tanahlautkab.go.id', 'password123')">
                                            <i class="bi bi-person-badge me-1"></i> <strong>DPD PKS</strong> (Telah Terisi 6 Dikpol)
                                        </button>
                                        <button type="button" class="btn btn-outline-success btn-sm text-start" onclick="fillLogin('golkar@tanahlautkab.go.id', 'password123')">
                                            <i class="bi bi-person-badge me-1"></i> <strong>DPD Partai Golkar</strong>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm text-start" onclick="fillLogin('gerindra@tanahlautkab.go.id', 'password123')">
                                            <i class="bi bi-person-badge me-1"></i> <strong>DPC Partai Gerindra</strong>
                                        </button>
                                        <button type="button" class="btn btn-outline-dark btn-sm text-start" onclick="fillLogin('pdiperjuangan@tanahlautkab.go.id', 'password123')">
                                            <i class="bi bi-person-badge me-1"></i> <strong>DPC PDI Perjuangan</strong>
                                        </button>
                                    </div>

                                    <!-- Dropdown 20 Partai Lainnya -->
                                    <div class="mt-2">
                                        <label class="form-label text-muted small mb-1">Pilih Partai Lainnya (20 Parpol):</label>
                                        <select class="form-select form-select-sm" onchange="if(this.value) fillLogin(this.value, 'password123')">
                                            <option value="">-- Pilih Partai Politik --</option>
                                            @foreach ($parpols as $p)
                                                @php
                                                    $shortMap = [
                                                        1 => 'pkb', 2 => 'gerindra', 3 => 'pdiperjuangan', 4 => 'golkar',
                                                        5 => 'nasdem', 6 => 'gelora', 7 => 'pks', 8 => 'hanura',
                                                        9 => 'pan', 10 => 'pbb', 11 => 'demokrat', 12 => 'psi',
                                                        13 => 'perindo', 14 => 'ppp', 15 => 'gerakanrakyat',
                                                        16 => 'gemabangsa', 17 => 'garuda', 18 => 'pkn',
                                                        19 => 'ummat', 20 => 'buruh'
                                                    ];
                                                    $mail = ($shortMap[$p->nomor_urut] ?? 'parpol') . '@tanahlautkab.go.id';
                                                @endphp
                                                <option value="{{ $mail }}">No. {{ sprintf('%02d', $p->nomor_urut) }} - {{ $p->akronim }} ({{ $p->nama_partai }})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="text-muted mt-2" style="font-size: 0.75rem;">
                                        <i class="bi bi-key me-1"></i> Password semua akun pengujian: <code>password123</code>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Footer Card -->
                    <div class="card-footer bg-light p-3 text-center border-0 text-muted small">
                        Badan Kesatuan Bangsa dan Politik &bull; Kab. Tanah Laut T.A. 2026
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // Fitur toggle show/hide password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const toggleIcon = document.querySelector('#toggleIcon');

    if (togglePassword) {
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            toggleIcon.classList.toggle('bi-eye');
            toggleIcon.classList.toggle('bi-eye-slash');
        });
    }

    // Fungsi pengisian otomatis untuk demonstrasi
    function fillLogin(email, pass) {
        document.getElementById('email').value = email;
        document.getElementById('password').value = pass;
    }
</script>
@endsection
