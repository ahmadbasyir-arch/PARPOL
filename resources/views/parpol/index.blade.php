@extends('layouts.app')

@section('title', 'PARPOL - Partai Politik Republik Indonesia')

@push('styles')
<style>
    /* Hero Section */
    .hero-section {
        background: radial-gradient(circle at 80% 20%, rgba(220, 38, 38, 0.15), transparent 40%),
                    linear-gradient(135deg, #090e1a 0%, #172554 50%, #1e1b4b 100%);
        color: #ffffff;
        padding: 95px 0 110px;
        position: relative;
        overflow: hidden;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(239, 68, 68, 0.18);
        border: 1px solid rgba(239, 68, 68, 0.4);
        color: #fca5a5;
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.8px;
        margin-bottom: 24px;
        backdrop-filter: blur(8px);
    }

    .hero-title {
        font-size: 3.4rem;
        font-weight: 800;
        line-height: 1.18;
        letter-spacing: -1px;
        margin-bottom: 24px;
    }

    .hero-title .highlight {
        background: linear-gradient(120deg, #f87171, #fbbf24);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-lead {
        font-size: 1.2rem;
        color: #cbd5e1;
        line-height: 1.7;
        margin-bottom: 35px;
        max-width: 620px;
    }

    /* Stats Banner */
    .stats-bar {
        background: #ffffff;
        border-radius: 20px;
        margin-top: -55px;
        box-shadow: 0 15px 35px -5px rgba(15, 23, 42, 0.12);
        padding: 30px 25px;
        position: relative;
        z-index: 20;
        border: 1px solid #e2e8f0;
    }

    .stat-number {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--parpol-primary);
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Visi Misi */
    .pilar-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 32px 26px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        height: 100%;
    }

    .pilar-card:hover {
        border-color: #f87171;
        box-shadow: 0 12px 28px rgba(185, 28, 28, 0.08);
        transform: translateY(-4px);
    }

    .pilar-icon-wrap {
        width: 58px;
        height: 58px;
        border-radius: 14px;
        background: #fee2e2;
        color: var(--parpol-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 20px;
    }

    /* Pimpinan */
    .leader-card {
        border-radius: 16px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .leader-card:hover {
        box-shadow: 0 16px 30px rgba(0,0,0,0.08);
        transform: translateY(-4px);
    }

    .leader-avatar {
        height: 200px;
        background: linear-gradient(135deg, #1e293b, #334155);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 4rem;
        position: relative;
    }

    .leader-badge {
        position: absolute;
        bottom: 12px;
        right: 12px;
        background: rgba(15, 23, 42, 0.85);
        color: var(--parpol-accent);
        font-size: 0.75rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 30px;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }

    /* Program Section */
    .program-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 28px 24px;
        border: 1px solid #e2e8f0;
        transition: all 0.25s;
    }

    .program-card:hover {
        background: #fffafa;
        border-color: #fca5a5;
    }

    /* Form Card */
    .form-wrapper {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        padding: 40px;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 16px;
        border: 1px solid #cbd5e1;
        font-size: 0.95rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--parpol-primary);
        box-shadow: 0 0 0 4px rgba(185, 28, 28, 0.15);
    }

    .form-label {
        font-weight: 600;
        font-size: 0.9rem;
        color: #334155;
        margin-bottom: 6px;
    }

    /* Aspirasi Item */
    .aspirasi-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 14px;
    }
</style>
@endpush

@section('content')

    <!-- ================= HERO SECTION ================= -->
    <section class="hero-section" id="beranda">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="hero-badge">
                        <i class="bi bi-star-fill text-warning"></i> PARTAI POLITIK REPUBLIK INDONESIA
                    </div>
                    <h1 class="hero-title">
                        Satu Suara, Satu Barisan Demi <span class="highlight">Kedaulatan & Kejayaan Rakyat</span>
                    </h1>
                    <p class="hero-lead">
                        PARPOL adalah gerakan politik kebangsaan yang bertekad menghadirkan keadilan sosial, kemandirian ekonomi, dan birokrasi berintegritas untuk seluruh rakyat Indonesia dari Sabang sampai Merauke.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#daftar-kader" class="btn btn-parpol btn-lg">
                            <i class="bi bi-person-plus-fill me-2"></i> Gabung Jadi Kader
                        </a>
                        <a href="#aspirasi" class="btn btn-parpol-outline btn-lg">
                            <i class="bi bi-chat-quote-fill me-2"></i> Sampaikan Aspirasi
                        </a>
                        <a href="#tentang" class="btn btn-link text-white text-decoration-none d-flex align-items-center px-3">
                            Pelajari Visi <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 d-none d-lg-block text-center">
                    <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(12px);">
                        <div class="mb-4">
                            <div class="d-inline-flex p-3 rounded-circle bg-danger bg-opacity-25 border border-danger text-white mb-3">
                                <i class="bi bi-shield-shaded fs-1 text-danger"></i>
                            </div>
                            <h3 class="fw-bold text-white mb-2">Manifesto Kebangsaan</h3>
                            <p class="text-light opacity-75 small">
                                "Politik adalah ibadah perjuangan membela kaum yang lemah, menegakkan kebenaran konstitusi, dan memajukan peradaban nusantara."
                            </p>
                        </div>
                        
                        <div class="border-top border-secondary pt-3 text-start small text-light opacity-75">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check-circle-fill text-warning me-2"></i> Terdaftar Resmi di Kemenkumham RI
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-check-circle-fill text-warning me-2"></i> Memenuhi Syarat KPU RI 100%
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-warning me-2"></i> Keterbukaan Informasi Publik Terverifikasi
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= STATS BAR ================= -->
    <div class="container">
        <div class="stats-bar">
            <div class="row text-center g-4">
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-number">38</div>
                    <div class="stat-label">Provinsi (DPD Lengkap)</div>
                </div>
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-number">514</div>
                    <div class="stat-label">Kabupaten / Kota (DPC)</div>
                </div>
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-number">{{ number_format($totalKader, 0, ',', '.') }}+</div>
                    <div class="stat-label">Kader Aktif Ber-KTA</div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="stat-number text-warning">{{ number_format($totalAspirasi, 0, ',', '.') }}+</div>
                    <div class="stat-label">Aspirasi Rakyat Terhimpun</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= IDENTITAS & LEGALITAS RESMI PARTAI ================= -->
    <section class="py-5 mt-4" id="legalitas">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-shield-check me-1"></i> Data Resmi & Badan Hukum</span>
                <h2 class="section-title">Identitas Resmi, Lambang & Legalitas Partai</h2>
                <p class="section-subtitle">
                    Keterbukaan informasi publik mengenai legalitas pendirian, SK Kementerian Hukum & HAM, penetapan KPU RI, serta filosofi lambang resmi.
                </p>
            </div>

            <!-- Kartu Identitas & Nomor Urut Pemilu -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5" style="background: linear-gradient(135deg, #0f172a, #1e293b); color: #ffffff;">
                <div class="p-4 p-lg-5">
                    <div class="row align-items-center g-4">
                        <!-- Nomor Urut Kotak Suara KPU -->
                        <div class="col-lg-3 text-center">
                            <div class="p-3 rounded-4 mx-auto" style="max-width: 200px; background: #ffffff; border: 4px solid var(--parpol-primary); box-shadow: 0 10px 25px rgba(0,0,0,0.3);">
                                <span class="d-block text-secondary small fw-bold text-uppercase" style="letter-spacing: 1px;">Nomor Urut Resmi</span>
                                <div class="display-1 fw-bold text-danger my-1" style="line-height: 1;">{{ $identitasPartai['nomor_urut'] }}</div>
                                <span class="badge bg-danger text-uppercase px-2 py-1">KPU RI Terverifikasi</span>
                            </div>
                        </div>

                        <!-- Nama Resmi & Slogan -->
                        <div class="col-lg-5">
                            <span class="text-warning text-uppercase fw-bold small letter-spacing-1">
                                <i class="bi bi-check-circle-fill me-1"></i> {{ $identitasPartai['status_peserta'] }}
                            </span>
                            <h2 class="fw-bold text-white mt-1 mb-2">{{ $identitasPartai['nama_resmi'] }}</h2>
                            <p class="text-light opacity-75 mb-3 fs-5">
                                Nama Singkatan / Akronim: <strong class="text-warning">{{ $identitasPartai['singkatan'] }}</strong>
                            </p>
                            <div class="d-inline-flex align-items-center px-3 py-2 rounded-3" style="background: rgba(255, 255, 255, 0.08); border-left: 4px solid var(--parpol-accent);">
                                <i class="bi bi-quote fs-4 text-warning me-2"></i>
                                <span class="fst-italic text-white fw-semibold">"{{ $identitasPartai['slogan'] }}"</span>
                            </div>
                        </div>

                        <!-- Dokumen Legalitas Kemenkumham & Notaris -->
                        <div class="col-lg-4">
                            <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);">
                                <h6 class="text-warning fw-bold text-uppercase small mb-3">
                                    <i class="bi bi-patch-check-fill me-1"></i> Dokumen Legalitas Hukum
                                </h6>
                                <div class="mb-3 small">
                                    <strong class="text-white d-block">SK Kemenkumham RI:</strong>
                                    <span class="text-light opacity-75">{{ $identitasPartai['sk_kemenkumham']['nomor'] }}</span><br>
                                    <span class="badge bg-success bg-opacity-25 text-success-emphasis border border-success mt-1">Disahkan {{ $identitasPartai['sk_kemenkumham']['tanggal'] }}</span>
                                </div>
                                <div class="mb-3 small">
                                    <strong class="text-white d-block">Akta Notaris Pendirian:</strong>
                                    <span class="text-light opacity-75">{{ $identitasPartai['akta_notaris']['nomor'] }}</span><br>
                                    <span class="text-light opacity-75">Notaris: {{ $identitasPartai['akta_notaris']['notaris'] }}</span>
                                </div>
                                <div class="small">
                                    <strong class="text-white d-block">Tanggal Deklarasi / Pendirian:</strong>
                                    <span class="text-light opacity-75">{{ $identitasPartai['tanggal_pendirian'] }} (Jakarta)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo & Filosofi Lambang Partai -->
            <div class="row g-4 align-items-center mb-5">
                <div class="col-lg-4 text-center">
                    <div class="p-4 rounded-4 bg-white border shadow-sm text-center">
                        <img src="{{ asset('images/logo-parpol.svg') }}" alt="Lambang Resmi PARPOL" class="img-fluid mb-3" style="max-height: 230px;">
                        <h5 class="fw-bold text-dark mb-1">Lambang Resmi PARPOL</h5>
                        <p class="text-secondary small mb-3">Format Vektor SVG Kualitas Tinggi (Resmi DPP)</p>
                        <a href="{{ asset('images/logo-parpol.svg') }}" download="logo-parpol-resmi.svg" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                            <i class="bi bi-download me-1"></i> Unduh File Vektor (SVG)
                        </a>
                    </div>
                </div>

                <div class="col-lg-8">
                    <h4 class="fw-bold text-dark mb-3">
                        <i class="bi bi-palette2 text-danger me-2"></i> Arti & Filosofi Lambang Partai
                    </h4>
                    <p class="text-secondary small mb-4">
                        Setiap garis, warna, dan lambang pada bendera PARPOL mengandung makna luhur yang mencerminkan cita-cita pendiri bangsa dan jati diri perjuangan rakyat:
                    </p>

                    <div class="row g-3">
                        @foreach ($identitasPartai['filosofi_logo'] as $item)
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 border bg-white h-100 shadow-none">
                                    <h6 class="fw-bold text-danger mb-1 d-flex align-items-center gap-2">
                                        <i class="bi bi-check-circle-fill text-warning"></i> {{ $item['elemen'] }}
                                    </h6>
                                    <p class="text-secondary small mb-0" style="line-height: 1.5;">
                                        {{ $item['makna'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Visi & 5 Butir Misi Resmi (Panca Krida) -->
            <div class="p-4 p-md-5 rounded-4 bg-white border shadow-sm mb-4">
                <div class="row g-4">
                    <div class="col-lg-5 border-end-lg">
                        <span class="badge bg-danger px-3 py-2 text-uppercase mb-2">Visi Resmi Partai</span>
                        <h4 class="fw-bold text-dark mb-3">Arah Haluan Kebangsaan</h4>
                        <div class="p-3 rounded-3 bg-light border-start border-4 border-danger">
                            <p class="text-dark fw-medium mb-0" style="font-size: 1.05rem; line-height: 1.7;">
                                "{{ $identitasPartai['visi'] }}"
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-7 ps-lg-4">
                        <span class="badge bg-dark px-3 py-2 text-uppercase mb-2">Misi Resmi (Panca Krida)</span>
                        <h4 class="fw-bold text-dark mb-3">Lima Agenda Perjuangan</h4>
                        <div class="d-flex flex-column gap-3">
                            @foreach ($identitasPartai['misi'] as $idx => $misiItem)
                                <div class="d-flex align-items-start gap-3">
                                    <span class="badge rounded-circle bg-danger text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem; flex-shrink: 0;">
                                        {{ $idx + 1 }}
                                    </span>
                                    <p class="text-secondary mb-0 small" style="line-height: 1.6;">
                                        {{ $misiItem }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= TENTANG / VISI & MISI ================= -->
    <section class="py-5" id="tentang">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-compass me-1"></i> Haluan Perjuangan</span>
                <h2 class="section-title">Visi & Nilai Dasar PARPOL</h2>
                <p class="section-subtitle">
                    Landasan filosofis dan garis perjuangan kami demi tegaknya martabat bangsa dan kesejahteraan seluruh tumpah darah Indonesia.
                </p>
            </div>

            <!-- Kartu Visi Utama -->
            <div class="card border-0 shadow-sm p-4 p-md-5 mb-5 rounded-4" style="background: linear-gradient(135deg, #1e293b, #0f172a); color: #ffffff;">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-4 mb-md-0">
                        <span class="badge bg-danger fs-6 px-3 py-2 text-uppercase mb-2">Visi Utama</span>
                        <h1 class="display-3 fw-bold text-warning mb-0"><i class="bi bi-eye"></i></h1>
                    </div>
                    <div class="col-md-9 border-start-md ps-md-4">
                        <h4 class="fw-bold mb-3 text-white">Mewujudkan Indonesia yang Berdaulat, Adil Makmur, dan Bermartabat di Mata Dunia</h4>
                        <p class="text-light opacity-75 mb-0 leading-relaxed">
                            Mewujudkan tata pemerintahan yang bersih, berpihak sepenuhnya pada kepentingan rakyat jelata, memperkuat ketahanan pangan dan ekonomi kerakyatan, serta menjaga persatuan Bhinneka Tunggal Ika dengan integritas moral tanpa kompromi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- 4 Pilar Gerakan -->
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="pilar-card">
                        <div class="pilar-icon-wrap">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Kedaulatan Rakyat</h5>
                        <p class="text-secondary small mb-0">
                            Menempatkan rakyat sebagai pemegang mandat tertinggi kekuasaan dan menolak oligarki yang merugikan publik.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="pilar-card">
                        <div class="pilar-icon-wrap">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Ekonomi Berdikari</h5>
                        <p class="text-secondary small mb-0">
                            Penguatan koperasi, UMKM, petani, dan nelayan agar mandiri secara ekonomi dan berdaya saing global.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="pilar-card">
                        <div class="pilar-icon-wrap">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Keadilan Hukum</h5>
                        <p class="text-secondary small mb-0">
                            Pemberantasan korupsi tanpa tebang pilih, penegakan HAM, serta kepastian hukum yang adil bagi setiap warga negara.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="pilar-card">
                        <div class="pilar-icon-wrap">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">SDM Unggul & Berkarakter</h5>
                        <p class="text-secondary small mb-0">
                            Pendidikan bermutu, sains modern, dan teknologi yang berakar kuat pada nilai-nilai Pancasila dan kearifan lokal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= PIMPINAN NASIONAL ================= -->
    <section class="py-5 bg-white border-top border-bottom" id="pimpinan">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-award me-1"></i> Kepengurusan</span>
                <h2 class="section-title">Dewan Pimpinan Pusat (DPP)</h2>
                <p class="section-subtitle">
                    Kombinasi para tokoh berintegritas, cendekiawan, praktisi, dan aktivis pemuda yang memimpin arah perjuangan partai.
                </p>
            </div>

            <div class="row g-4">
                @foreach ($pimpinan as $leader)
                    <div class="col-md-6 col-lg-3">
                        <div class="leader-card h-100">
                            <div class="leader-avatar">
                                <i class="bi bi-person-bounding-box"></i>
                                <span class="leader-badge">{{ $leader['periode'] }}</span>
                            </div>
                            <div class="p-4">
                                <span class="text-danger fw-bold small text-uppercase">{{ $leader['jabatan'] }}</span>
                                <h5 class="fw-bold text-dark mt-1 mb-2">{{ $leader['nama'] }}</h5>
                                <p class="text-secondary small mb-0">
                                    {{ $leader['bio'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= PROGRAM AKSI UNGGULAN ================= -->
    <section class="py-5" id="program">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-list-check me-1"></i> Aksi Nyata</span>
                <h2 class="section-title">Program Unggulan PARPOL</h2>
                <p class="section-subtitle">
                    Bukan sekadar janji kampanye, program konkret yang langsung menyentuh sendi-sendi kehidupan masyarakat.
                </p>
            </div>

            <div class="row g-4">
                @foreach ($programUnggulan as $prog)
                    <div class="col-md-6 col-lg-4">
                        <div class="program-card h-100">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="pilar-icon-wrap mb-0" style="width: 48px; height: 48px; font-size: 1.3rem;">
                                    <i class="bi {{ $prog['icon'] }}"></i>
                                </div>
                                <h5 class="fw-bold mb-0 text-dark">{{ $prog['judul'] }}</h5>
                            </div>
                            <p class="text-secondary small mb-0" style="line-height: 1.6;">
                                {{ $prog['deskripsi'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= BERITA & KEGIATAN TERKINI ================= -->
    <section class="py-5 bg-white border-top border-bottom" id="berita">
        <div class="container py-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
                <div>
                    <span class="section-badge"><i class="bi bi-newspaper me-1"></i> Warta Terkini</span>
                    <h2 class="section-title mb-0">Kabar & Publikasi Resmi</h2>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="#berita" class="btn btn-outline-danger fw-semibold px-4 rounded-3">
                        Lihat Semua Berita <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($beritaTerkini as $berita)
                    <div class="col-lg-4 col-md-6">
                        <div class="custom-card h-100">
                            <div style="height: 190px; background: linear-gradient(135deg, #334155, #1e293b); display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 3rem;">
                                <i class="bi bi-image"></i>
                            </div>
                            <div class="p-4 d-flex flex-column justify-content-between" style="min-height: 220px;">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold px-2 py-1 rounded">
                                            {{ $berita['kategori'] }}
                                        </span>
                                        <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i> {{ $berita['tanggal'] }}</span>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">{{ $berita['judul'] }}</h5>
                                    <p class="text-secondary small mb-3">
                                        {{ $berita['ringkasan'] }}
                                    </p>
                                </div>
                                <a href="#berita" class="text-danger fw-bold small text-decoration-none">
                                    Baca Selengkapnya <i class="bi bi-chevron-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= DAFTAR JADI KADER (REGISTRASI) ================= -->
    <section class="py-5" id="daftar-kader">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="section-badge"><i class="bi bi-person-badge me-1"></i> Rekrutmen Terbuka</span>
                    <h2 class="section-title mb-3">Jadilah Bagian dari Gerakan Perubahan</h2>
                    <p class="text-secondary mb-4">
                        Pintu PARPOL terbuka lebar bagi siapapun yang ingin berkontribusi nyata bagi bangsa. Dapatkan Kartu Tanda Anggota Elektronik (e-KTA) dan akses ke Akademi Kepemimpinan Politik.
                    </p>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex gap-3">
                            <div class="text-danger fs-4"><i class="bi bi-check2-circle"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Tanpa Mahar Politik</h6>
                                <p class="text-secondary small mb-0">Prinsip meritokrasi: kaderisasi didasarkan pada kompetensi dan loyalitas rakyat.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="text-danger fs-4"><i class="bi bi-check2-circle"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Hak Suara Kongres</h6>
                                <p class="text-secondary small mb-0">Setiap kader memiliki hak berpendapat dan menentukan arah kebijakan partai.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="text-danger fs-4"><i class="bi bi-check2-circle"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Pelatihan & Advokasi</h6>
                                <p class="text-secondary small mb-0">Akses jaringan bantuan hukum dan peningkatan kapasitas kepemimpinan publik.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="form-wrapper">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                            <div>
                                <h4 class="fw-bold text-dark mb-1">Formulir Pendaftaran Kader</h4>
                                <span class="text-muted small">Registrasi e-KTA Nasional PARPOL</span>
                            </div>
                            <span class="badge bg-danger px-3 py-2">Gratis 100%</span>
                        </div>

                        @if (session('kader_success'))
                            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                                <div>
                                    <strong>Berhasil!</strong> {{ session('kader_success') }}
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4" role="alert">
                                <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Mohon periksa kembali input Anda:</div>
                                <ul class="mb-0 small ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('parpol.daftar') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="nama_lengkap">Nama Lengkap (Sesuai KTP) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Contoh: Budi Gunawan" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="nik">NIK (16 Digit) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" placeholder="3201xxxxxxxxxxxx" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="email">Alamat Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="no_telepon">No. WhatsApp / HP <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="0812xxxxxxxx" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="provinsi">Provinsi <span class="text-danger">*</span></label>
                                    <select class="form-select @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" required>
                                        <option value="">-- Pilih Provinsi --</option>
                                        <option value="DKI Jakarta" {{ old('provinsi') == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                                        <option value="Jawa Barat" {{ old('provinsi') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                                        <option value="Jawa Tengah" {{ old('provinsi') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                                        <option value="Jawa Timur" {{ old('provinsi') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                                        <option value="Banten" {{ old('provinsi') == 'Banten' ? 'selected' : '' }}>Banten</option>
                                        <option value="D.I. Yogyakarta" {{ old('provinsi') == 'D.I. Yogyakarta' ? 'selected' : '' }}>D.I. Yogyakarta</option>
                                        <option value="Sumatera Utara" {{ old('provinsi') == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                                        <option value="Sumatera Barat" {{ old('provinsi') == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                                        <option value="Sumatera Selatan" {{ old('provinsi') == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                                        <option value="Riau" {{ old('provinsi') == 'Riau' ? 'selected' : '' }}>Riau</option>
                                        <option value="Kalimantan Timur" {{ old('provinsi') == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                                        <option value="Kalimantan Barat" {{ old('provinsi') == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                                        <option value="Sulawesi Selatan" {{ old('provinsi') == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                                        <option value="Bali" {{ old('provinsi') == 'Bali' ? 'selected' : '' }}>Bali</option>
                                        <option value="Papua" {{ old('provinsi') == 'Papua' ? 'selected' : '' }}>Papua</option>
                                        <option value="Lainnya" {{ old('provinsi') == 'Lainnya' ? 'selected' : '' }}>Provinsi Lainnya</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="kota_kabupaten">Kota / Kabupaten <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('kota_kabupaten') is-invalid @enderror" id="kota_kabupaten" name="kota_kabupaten" value="{{ old('kota_kabupaten') }}" placeholder="Contoh: Jakarta Selatan" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="motivasi">Motivasi Bergabung (Opsional)</label>
                                    <textarea class="form-control @error('motivasi') is-invalid @enderror" id="motivasi" name="motivasi" rows="3" placeholder="Sampaikan apa yang memotivasi Anda untuk memperjuangkan aspirasi bersama PARPOL...">{{ old('motivasi') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="setuju" required>
                                        <label class="form-check-label small text-secondary" for="setuju">
                                            Saya menyatakan setia kepada Pancasila dan UUD 1945, serta siap mematuhi AD/ART dan Pakta Integritas PARPOL.
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-parpol w-100 py-3 fw-bold fs-6">
                                        <i class="bi bi-send-fill me-2"></i> Kirim Pendaftaran Kader
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= KANAL ASPIRASI PUBLIK ================= -->
    <section class="py-5 bg-white border-top" id="aspirasi">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="bi bi-megaphone me-1"></i> Kanal Publik</span>
                <h2 class="section-title">Kanal Aspirasi & Suara Rakyat</h2>
                <p class="section-subtitle">
                    Kritik, saran, masukan perundang-undangan, dan keluhan layanan publik Anda langsung dibaca oleh Fraksi PARPOL.
                </p>
            </div>

            <div class="row g-5">
                <!-- Form Aspirasi -->
                <div class="col-lg-6">
                    <div class="p-4 rounded-4 border bg-light">
                        <h4 class="fw-bold mb-3 text-dark">Sampaikan Masukan Anda</h4>

                        @if (session('aspirasi_success'))
                            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                                <div>
                                    <strong>Aspirasi Diterima!</strong> {{ session('aspirasi_success') }}
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('parpol.aspirasi') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="aspirasi_nama">Nama Anda <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="aspirasi_nama" name="nama" placeholder="Nama lengkap atau anonim" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="aspirasi_email">Email / Kontak <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="aspirasi_email" name="email" placeholder="email@domain.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="kategori">Kategori Isu <span class="text-danger">*</span></label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Hukum & Korupsi">Hukum & Penegakan Korupsi</option>
                                    <option value="Ekonomi & UMKM">Ekonomi, Lapangan Kerja & UMKM</option>
                                    <option value="Pendidikan">Pendidikan & Sekolah Gratis</option>
                                    <option value="Kesehatan">Kesehatan & Jaminan Sosial</option>
                                    <option value="Pertanian & Pangan">Pertanian, Nelayan & Pangan</option>
                                    <option value="Infrastruktur">Infrastruktur & Transportasi</option>
                                    <option value="Lainnya">Isu Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="subjek">Pokok Aspirasi / Subjek <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subjek" name="subjek" placeholder="Ringkasan inti aspirasi" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="pesan">Uraian Aspirasi <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Jelaskan aspirasi, keluhan di daerah, atau masukan undang-undang secara detail..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">
                                <i class="bi bi-chat-left-dots-fill me-2 text-danger"></i> Salurkan Aspirasi Sekarang
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Feed Aspirasi Terkini -->
                <div class="col-lg-6">
                    <h4 class="fw-bold mb-3 text-dark">Aspirasi Masuk Terbaru</h4>
                    <p class="text-secondary small mb-4">
                        Bukti transparansi PARPOL dalam mendengar keluh kesah dan harapan masyarakat nusantara secara terbuka.
                    </p>

                    @forelse ($aspirasiTerbaru as $item)
                        <div class="aspirasi-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-secondary">{{ $item->kategori }}</span>
                                <span class="small text-muted">{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                            <h6 class="fw-bold mb-1 text-dark">{{ $item->subjek }}</h6>
                            <p class="small text-secondary mb-2">{{ Str::limit($item->pesan, 140) }}</p>
                            <div class="small text-muted d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-person-circle me-1"></i> {{ $item->nama }}</span>
                                <span class="text-success"><i class="bi bi-check2-all me-1"></i> Status: {{ ucfirst($item->status) }}</span>
                            </div>
                        </div>
                    @empty
                        <!-- Default sample aspirasi ketika database baru pertama kali -->
                        <div class="aspirasi-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary">Pertanian & Pangan</span>
                                <span class="small text-muted">2 jam yang lalu</span>
                            </div>
                            <h6 class="fw-bold mb-1 text-dark">Subsidi Pupuk Organik untuk Petani Padi</h6>
                            <p class="small text-secondary mb-2">Mohon Fraksi PARPOL mendorong distribusi pupuk bersubsidi langsung ke kelompok tani tanpa perantara yang berbelit-belit.</p>
                            <div class="small text-muted d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-person-circle me-1"></i> Pak Mulyono (Jawa Tengah)</span>
                                <span class="text-success"><i class="bi bi-check2-all me-1"></i> Status: Diproses Fraksi</span>
                            </div>
                        </div>

                        <div class="aspirasi-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-warning text-dark">Ekonomi & UMKM</span>
                                <span class="small text-muted">Kemarin</span>
                            </div>
                            <h6 class="fw-bold mb-1 text-dark">Akses Permodalan Tanpa Agunan untuk Pemuda Desa</h6>
                            <p class="small text-secondary mb-2">Kami pemuda karang taruna ingin mengembangkan produk olahan kopi lokal, mohon difasilitasi program kemitraan usaha.</p>
                            <div class="small text-muted d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-person-circle me-1"></i> Rian Saputra (Sumatera Selatan)</span>
                                <span class="text-success"><i class="bi bi-check2-all me-1"></i> Status: Diteruskan ke Badan UMKM</span>
                            </div>
                        </div>

                        <div class="aspirasi-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-info text-dark">Pendidikan</span>
                                <span class="small text-muted">3 hari yang lalu</span>
                            </div>
                            <h6 class="fw-bold mb-1 text-dark">Penyetaraan Gaji Guru Honorer Daerah Terpencil</h6>
                            <p class="small text-secondary mb-2">Mohon kepastian pengangkatan PPPK untuk guru honorer yang sudah mengabdi lebih dari 10 tahun di pelosok nusantara.</p>
                            <div class="small text-muted d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-person-circle me-1"></i> Ibu Siti Marwah (Kalimantan Barat)</span>
                                <span class="text-success"><i class="bi bi-check2-all me-1"></i> Status: Disuarakan di Komisi X</span>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
