@extends('layouts.app')

@section('title', 'Login Sistem Pengarsipan Dokumentasi WASBANG - Bakesbangpol Kab. Tanah Laut')

@section('content')
<div class="py-5" style="background: radial-gradient(circle at 85% 15%, rgba(185, 28, 28, 0.4), transparent 50%), linear-gradient(135deg, #0f172a 0%, #1e1b4b 45%, #450a0a 100%); min-height: 88vh;">
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-5">
                
                <!-- Card Utama Login Wasbang -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    
                    <!-- Header Card Wasbang -->
                    <div class="card-header text-white p-4 text-center border-0" style="background: linear-gradient(135deg, #0f172a 0%, #450a0a 100%); border-bottom: 3px solid #b91c1c !important;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-3 mb-3 shadow p-2" style="width: 72px; height: 72px;">
                            <img src="{{ asset('images/tanahlaut.png') }}" alt="Lambang Kabupaten Tanah Laut" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div class="badge bg-danger bg-opacity-75 px-3 py-1 rounded-pill mb-2 text-uppercase fw-bold letter-spacing-1" style="font-size: 0.72rem;">
                            <i class="bi bi-shield-lock-fill me-1"></i> Autentikasi Pengarsipan
                        </div>
                        <h4 class="fw-bold mb-1">Masuk ke Sistem WASBANG</h4>
                        <p class="text-white-50 small mb-0">
                            Bidang Bina Ideologi, Wawasan Kebangsaan &amp; Karakter Bangsa<br>
                            <strong>Badan Kesatuan Bangsa dan Politik Kab. Tanah Laut</strong>
                        </p>
                    </div>

                    <!-- Body Card -->
                    <div class="card-body p-4 p-md-5 bg-white">

                        <!-- Pesan Kesalahan Validasi -->
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 py-2 px-3 small mb-4 d-flex align-items-center gap-2">
                                <i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0 text-danger"></i>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (session('wasbang_success'))
                            <div class="alert alert-success rounded-3 py-2 px-3 small mb-4 d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill fs-5 flex-shrink-0 text-success"></i>
                                <div>{{ session('wasbang_success') }}</div>
                            </div>
                        @endif

                        <!-- Formulir Login Khusus Wasbang -->
                        <form action="{{ route('wasbang.login.post') }}" method="POST">
                            @csrf

                            <!-- Email / Akun Wasbang -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold small text-secondary">
                                    <i class="bi bi-envelope-at me-1 text-danger"></i> Alamat Email Akun Resmi Wasbang
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
                                    Gunakan email resmi Staf / Kepala Bidang Wasbang Bakesbangpol.
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label fw-semibold small text-secondary mb-0">
                                        <i class="bi bi-key-fill me-1 text-danger"></i> Kata Sandi
                                    </label>
                                    <a href="#quickDemoWasbang" class="text-decoration-none small text-danger fw-semibold" data-bs-toggle="collapse">
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

                            <!-- Remember Me -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label small text-secondary" for="remember">
                                        Ingat saya di perangkat ini
                                    </label>
                                </div>
                            </div>

                            <!-- Tombol Submit Wasbang -->
                            <button type="submit" class="btn btn-danger w-100 py-2 fw-bold rounded-3 shadow-sm d-flex align-items-center justify-content-center gap-2 mb-3">
                                <i class="bi bi-box-arrow-in-right fs-5"></i> Masuk ke Sistem Wasbang
                            </button>

                            <div class="text-center">
                                <a href="{{ route('wasbang.index') }}" class="text-decoration-none small text-muted">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda WASBANG
                                </a>
                            </div>
                        </form>

                        <!-- Accordion Pintasan Pengujian Demo Khusus Bidang WASBANG (Khusus Ujian/Demo PKL) -->
                        <div class="mt-4 pt-3 border-top">
                            <button class="btn btn-outline-danger btn-sm w-100 rounded-pill text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#quickDemoWasbang" aria-expanded="true" aria-controls="quickDemoWasbang">
                                <span><i class="bi bi-lightning-charge-fill text-warning me-1"></i> <strong>Pintasan Uji Akun WASBANG (Demo PKL)</strong></span>
                                <i class="bi bi-chevron-down small"></i>
                            </button>

                            <div class="collapse show mt-3" id="quickDemoWasbang">
                                <div class="p-3 bg-light rounded-3 border small">
                                    <p class="text-muted mb-2">Klik tombol di bawah untuk mengisi formulir login secara otomatis:</p>
                                    
                                    <div class="d-flex flex-column gap-2 mb-2">
                                        <!-- Akun Ibu Kabid Wasbang -->
                                        <button type="button" class="btn btn-danger btn-sm text-start shadow-sm" onclick="fillLoginWasbang('kabid.wasbang@tanahlautkab.go.id', 'password123')">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span><i class="bi bi-person-check-fill me-1"></i> <strong>Ibu Kabid Wasbang</strong></span>
                                                <span class="badge bg-white text-danger small">Pejabat Pengesah</span>
                                            </div>
                                            <small class="d-block text-white-50 mt-1" style="font-size: 0.73rem;">Auranti Muraya Purihaningrum, S.STP. (NIP. 198605022004122001)</small>
                                        </button>

                                        <!-- Akun Staf Pelaksana Wasbang -->
                                        <button type="button" class="btn btn-outline-success btn-sm text-start" onclick="fillLoginWasbang('wasbang@tanahlautkab.go.id', 'password123')">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span><i class="bi bi-person-badge-fill me-1"></i> <strong>Staf Pelaksana Wasbang</strong></span>
                                                <span class="badge bg-success text-white small">Operator Pengarsipan</span>
                                            </div>
                                            <small class="d-block text-muted mt-1" style="font-size: 0.73rem;">Petugas Input &amp; Pengarsip Foto Kegiatan Lapangan</small>
                                        </button>

                                        <!-- Akun Kepala Badan Kesbangpol -->
                                        <button type="button" class="btn btn-outline-primary btn-sm text-start" onclick="fillLoginWasbang('kaban@tanahlautkab.go.id', 'password123')">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span><i class="bi bi-shield-check me-1"></i> <strong>Kepala Badan (Kaban)</strong></span>
                                                <span class="badge bg-primary text-white small">Pimpinan Instansi</span>
                                            </div>
                                            <small class="d-block text-muted mt-1" style="font-size: 0.73rem;">H. Bambang Kusdariman, S.I.P., M.Si. (NIP. 19680818 199010 1 003)</small>
                                        </button>
                                    </div>

                                    <div class="text-muted mt-2 pt-2 border-top" style="font-size: 0.75rem;">
                                        <i class="bi bi-key me-1 text-danger"></i> Password semua akun: <code>password123</code>
                                    </div>

                                    <!-- Switcher ke SIPARPOL jika salah kamar -->
                                    <div class="mt-2 pt-2 border-top text-muted" style="font-size: 0.75rem;">
                                        Petugas Partai Politik / Poldagri? <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold">Buka Login SIPARPOL &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Footer Card -->
                    <div class="card-footer bg-light p-3 text-center border-0 text-muted small">
                        Bidang Bina Ideologi, Wasbang &amp; Karakter Bangsa &bull; Bakesbangpol Kab. Tanah Laut
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

    // Fungsi pengisian otomatis untuk demonstrasi Wasbang
    function fillLoginWasbang(email, pass) {
        document.getElementById('email').value = email;
        document.getElementById('password').value = pass;
    }
</script>
@endsection

