<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class ParpolController extends Controller
{
    /**
     * Tampilkan Beranda Portal PARPOL
     */
    public function index()
    {
        $totalKader = Anggota::count() + 125430; // Termasuk kader offline terdaftar
        $totalAspirasi = Aspirasi::count() + 8420;
        
        // Data Legalitas dan Identitas Resmi Partai (6 Poin Utama)
        $identitasPartai = [
            'nama_resmi' => 'Partai Pelopor Reformasi & Kedaulatan Rakyat',
            'singkatan' => 'PARPOL',
            'slogan' => 'Bersatu, Berdaulat, Berkeadilan',
            'nomor_urut' => 24,
            'status_peserta' => 'Peserta Pemilu Nasional Resmi',
            'tanggal_pendirian' => '17 Agustus 2023',
            'akta_notaris' => [
                'nomor' => 'Akta Notaris No. 45',
                'tanggal' => '28 Agustus 2023',
                'notaris' => 'Dr. Bambang Sudirman, S.H., M.Kn.',
                'kedudukan' => 'Jakarta Pusat'
            ],
            'sk_kemenkumham' => [
                'nomor' => 'M.HH-09.AH.11.01 TAHUN 2023',
                'tanggal' => '12 Oktober 2023',
                'tentang' => 'Pengesahan Badan Hukum Partai Pelopor Reformasi & Kedaulatan Rakyat (PARPOL)',
                'berita_negara' => 'BNRI No. 88 / Tambahan No. 12/2023'
            ],
            'visi' => 'Mewujudkan Negara Kesatuan Republik Indonesia yang berdaulat secara politik, mandiri secara ekonomi, berkeadilan sosial, dan bermartabat di mata dunia berdasarkan Pancasila dan UUD 1945.',
            'misi' => [
                'Menegakkan supremasi hukum, pemberantasan korupsi, serta birokrasi pemerintahan yang bersih, transparan, dan akuntabel.',
                'Membangun kedaulatan ekonomi kerakyatan berbasis agraris, maritim, perlindungan UMKM, dan industrialisasi hijau.',
                'Menjamin hak setiap warga negara atas pendidikan gratis berkualitas dan fasilitas kesehatan yang merata.',
                'Memperkokoh persatuan bangsa berlandaskan Bhinneka Tunggal Ika serta menjunjung tinggi hak asasi manusia.',
                'Mencetak kader kepemimpinan muda dan perempuan yang visioner, berkarakter luhur, dan adaptif terhadap kemajuan teknologi.',
            ],
            'filosofi_logo' => [
                [
                    'elemen' => 'Bintang Emas Bersudut Lima',
                    'makna' => 'Melambangkan Ketuhanan Yang Maha Esa dan cita-cita luhur menuju peradaban Indonesia Emas yang religius, berdaulat, dan makmur.'
                ],
                [
                    'elemen' => 'Perisai Merah Putih',
                    'makna' => 'Simbol keteguhan hati, keberanian moral, dan kesucian perjuangan dalam membela hak konstitusional rakyat serta kedaulatan NKRI.'
                ],
                [
                    'elemen' => 'Untaian Padi dan Kapas',
                    'makna' => 'Mewakili komitmen mutlak partai untuk mewujudkan kemakmuran sandang, pangan, dan keadilan sosial bagi seluruh rakyat tanpa kecuali.'
                ],
                [
                    'elemen' => 'Lingkaran Emas & Pita Persatuan',
                    'makna' => 'Ikatan solidaritas kebangsaan yang utuh dan tak terputus dari Sabang sampai Merauke, melintasi perbedaan suku, ras, dan golongan.'
                ],
            ]
        ];

        $pimpinan = [
            [
                'jabatan' => 'Ketua Umum DPP',
                'nama' => 'H. Arya Pratama, S.H., M.H.',
                'periode' => '2024 - 2029',
                'bio' => 'Tokoh pergerakan nasional, mantan aktivis reformasi, dan praktisi hukum tata negara.',
                'foto' => 'ketum.jpg'
            ],
            [
                'jabatan' => 'Sekretaris Jenderal',
                'nama' => 'Dr. Hj. Siti Nurhaliza, M.Si.',
                'periode' => '2024 - 2029',
                'bio' => 'Akademisi kebijakan publik dan perintis program pemberdayaan perempuan desa.',
                'foto' => 'sekjen.jpg'
            ],
            [
                'jabatan' => 'Bendahara Umum',
                'nama' => 'Ir. Hendra Kusuma, M.B.A.',
                'periode' => '2024 - 2029',
                'bio' => 'Pengusaha nasional dan pegiat ekosistem ekonomi digital & UMKM rakyat.',
                'foto' => 'bendum.jpg'
            ],
            [
                'jabatan' => 'Ketua Dewan Pembina',
                'nama' => 'Prof. Dr. Ir. Budi Santoso',
                'periode' => '2024 - 2029',
                'bio' => 'Guru besar ketahanan pangan, pakar kedaulatan maritim dan energi baru terbarukan.',
                'foto' => 'dewan_pembina.jpg'
            ],
        ];

        $programUnggulan = [
            [
                'icon' => 'bi-shield-check',
                'judul' => 'Integritas & Anti-Korupsi',
                'deskripsi' => 'Membangun birokrasi yang transparan, akuntabel, dan bebas gratifikasi melalui pakta integritas kader di seluruh tingkatan legislatif dan eksekutif.'
            ],
            [
                'icon' => 'bi-cash-coin',
                'judul' => 'Kedaulatan Ekonomi & UMKM',
                'deskripsi' => 'Penguatan permodalan tanpa bunga bagi pelaku usaha mikro, proteksi produk lokal, dan subsidi tepat sasaran untuk petani serta nelayan.'
            ],
            [
                'icon' => 'bi-mortarboard',
                'judul' => 'Pendidikan Gratis Berkualitas',
                'deskripsi' => 'Akses pendidikan vokasi modern, beasiswa penuh sarjana bagi keluarga pra-sejahtera, dan peningkatan kesejahteraan guru honorer.'
            ],
            [
                'icon' => 'bi-heart-pulse',
                'judul' => 'Layanan Kesehatan Merata',
                'deskripsi' => 'Pengadaan mobil ambulans siaga PARPOL di setiap kecamatan, klinik gratis, serta jaminan perlindungan ibu dan anak.'
            ],
            [
                'icon' => 'bi-tree',
                'judul' => 'Transisi Energi Hijau & Lingkungan',
                'deskripsi' => 'Menjaga kelestarian hutan adat, reboisasi nasional, dan percepatan adopsi energi surya dan terbarukan.'
            ],
            [
                'icon' => 'bi-laptop',
                'judul' => 'Akademi Kepemimpinan Muda',
                'deskripsi' => 'Sekolah kaderisasi politik modern untuk mencetak calon legislator muda yang kritis, adaptif, dan berjiwa nasionalis.'
            ],
        ];

        $beritaTerkini = [
            [
                'kategori' => 'Konsolidasi',
                'tanggal' => '18 Oktober 2026',
                'judul' => 'Rapimnas PARPOL 2026: Solidaritas Menuju Kemenangan Rakyat',
                'ringkasan' => 'Dewan Pimpinan Pusat mengumpulkan 38 Ketua DPD se-Indonesia untuk menyusun cetak biru pembangunan 5 tahun ke depan.'
            ],
            [
                'kategori' => 'Aksi Sosial',
                'tanggal' => '14 Oktober 2026',
                'judul' => 'Baksos Serentak: Gerakan Pangan Murah PARPOL Peduli Rakyat',
                'ringkasan' => 'Penyaluran 50.000 paket sembako bersubsidi dan pemeriksaan kesehatan gratis di berbagai pelosok daerah.'
            ],
            [
                'kategori' => 'Pendidikan Politik',
                'tanggal' => '10 Oktober 2026',
                'judul' => 'Sekolah Pemimpin Muda PARPOL Batch IV Resmi Dibuka',
                'ringkasan' => '500 pemuda dari seluruh penjuru nusantara terpilih mengikuti pelatihan intensif etika politik dan perancangan perundangan.'
            ],
        ];

        $aspirasiTerbaru = Aspirasi::latest()->take(5)->get();

        return view('parpol.index', compact(
            'identitasPartai',
            'totalKader',
            'totalAspirasi',
            'pimpinan',
            'programUnggulan',
            'beritaTerkini',
            'aspirasiTerbaru'
        ));
    }

    /**
     * Simpan pendaftaran kader baru
     */
    public function storeAnggota(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric|digits:16|unique:anggotas,nik',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:20',
            'provinsi' => 'required|string|max:100',
            'kota_kabupaten' => 'required|string|max:100',
            'motivasi' => 'nullable|string|max:1000',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nik.required' => 'Nomor Induk Kependudukan (NIK) wajib diisi.',
            'nik.digits' => 'NIK harus berjumlah 16 digit angka.',
            'nik.unique' => 'NIK ini sudah terdaftar sebagai kader.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_telepon.required' => 'Nomor telepon/WhatsApp wajib diisi.',
            'provinsi.required' => 'Provinsi domisili wajib dipilih.',
            'kota_kabupaten.required' => 'Kota/Kabupaten wajib diisi.',
        ]);

        Anggota::create($validated);

        return redirect()->to(url()->previous() . '#daftar-kader')
            ->with('kader_success', 'Selamat! Pendaftaran kader berhasil diajukan. Tim DPP/DPD PARPOL akan segera menghubungi Anda untuk proses verifikasi e-KTA.');
    }

    /**
     * Simpan aspirasi rakyat
     */
    public function storeAspirasi(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kategori' => 'required|string',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|max:2000',
        ], [
            'nama.required' => 'Nama pengirim wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'kategori.required' => 'Silakan pilih kategori aspirasi.',
            'subjek.required' => 'Subjek atau perihal wajib diisi.',
            'pesan.required' => 'Uraian aspirasi wajib diisi.',
        ]);

        Aspirasi::create($validated);

        return redirect()->to(url()->previous() . '#aspirasi')
            ->with('aspirasi_success', 'Terima kasih atas aspirasi Anda. Masukan Anda telah kami teruskan ke Badan Advokasi & Aspirasi Rakyat PARPOL.');
    }
}
