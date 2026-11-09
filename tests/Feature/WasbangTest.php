<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WasbangKegiatan;
use Database\Seeders\UserSeeder;
use Database\Seeders\WasbangKegiatanSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class WasbangTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman utama Wasbang dapat diakses secara publik (Free User / Peserta tanpa login)
     */
    public function test_wasbang_index_returns_successful_response(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);

        $response = $this->get(route('wasbang.index'));

        $response->assertStatus(200);
        $response->assertSee('WASBANG TANAH LAUT');
        $response->assertSee('Bidang Bina Ideologi, Wawasan Kebangsaan');
        $response->assertSee('Pengarsipan Dokumentasi');
        $response->assertSee('Sosialisasi Penguatan 4 Konsensus Dasar Kebangsaan');
        $response->assertSee('Pemusatan Diklat Lapangan Calon Pasukan Pengibar Bendera Pusaka');
        // Mode Publik / Peserta Kegiatan (Free User)
        $response->assertSee('Portal Galeri Dokumentasi Terbuka Wasbang');
        $response->assertSee('Mode Tamu &amp; Peserta Kegiatan', false);
        // Pastikan ada switcher dropdown ke SIPARPOL
        $response->assertSee('SIPARPOL TANAH LAUT');
    }

    /**
     * Test halaman utama Parpol tetap berjalan utuh dan memiliki dropdown switcher ke Wasbang
     */
    public function test_parpol_home_has_switcher_to_wasbang(): void
    {
        $response = $this->get(route('parpol.home'));

        $response->assertStatus(200);
        $response->assertSee('SIPARPOL TANAH LAUT');
        $response->assertSee('WASBANG TANAH LAUT');
        $response->assertSee(route('wasbang.index'));
    }

    /**
     * Test halaman cetak rekapitulasi Wasbang memuat tanda tangan resmi Kaban dan Kabid
     */
    public function test_wasbang_cetak_returns_successful_response(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);

        $response = $this->get(route('wasbang.cetak'));

        $response->assertStatus(200);
        $response->assertSee('REKAPITULASI PENGARSIPAN DOKUMENTASI LAPORAN KEGIATAN LUAR LAPANGAN');
        $response->assertSee('PEMERINTAH KABUPATEN TANAH LAUT');
        $response->assertSee('H. Bambang Kusdariman, S.I.P., M.Si.');
        $response->assertSee('19680818 199010 1 003');
        $response->assertSee('Auranti Muraya Purihaningrum, S.STP.');
        $response->assertSee('198605022004122001');
    }

    /**
     * Test halaman cetak detail berita acara tunggal memuat pengesahan Ibu Kabid
     */
    public function test_wasbang_cetak_detail_returns_successful_response(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);
        $kegiatan = WasbangKegiatan::first();

        $response = $this->get(route('wasbang.cetak.detail', $kegiatan->id));

        $response->assertStatus(200);
        $response->assertSee('BERITA ACARA & LEMBAR LAPORAN DOKUMENTASI KEGIATAN LUAR');
        $response->assertSee($kegiatan->nama_kegiatan);
        $response->assertSee('Auranti Muraya Purihaningrum, S.STP.');
        $response->assertSee('198605022004122001');
    }

    /**
     * Test Staf Wasbang dapat mengarsipkan dokumentasi kegiatan baru
     */
    public function test_staf_wasbang_can_store_new_activity(): void
    {
        $staf = User::create([
            'name' => 'Staf Pelaksana Bidang Wasbang',
            'email' => 'wasbang@tanahlautkab.go.id',
            'nip' => '19951015 202203 1 002',
            'jabatan' => 'Staf Pelaksana Pengarsipan',
            'password' => bcrypt('password123'),
            'role' => 'staf_wasbang',
        ]);

        $data = [
            'nama_kegiatan' => 'Penyuluhan Wawasan Nusantara di Kecamatan Jorong',
            'kategori' => 'Wawasan Kebangsaan',
            'tanggal' => '2026-11-05',
            'waktu' => '08:30 - 12:00 WITA',
            'lokasi' => 'Aula Terbuka Kantor Camat Jorong',
            'sasaran_peserta' => '80 Tokoh Masyarakat dan Pemuda',
            'pelaksana' => 'Subbidang Bina Ideologi Bakesbangpol',
            'rincian' => 'Sosialisasi penguatan nilai persatuan dan kesatuan bangsa di wilayah selatan Kabupaten Tanah Laut.',
            'status' => 'Selesai Dilaksanakan',
        ];

        $response = $this->actingAs($staf)->post(route('wasbang.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('wasbang_kegiatans', [
            'nama_kegiatan' => 'Penyuluhan Wawasan Nusantara di Kecamatan Jorong',
            'hari' => 'Kamis',
        ]);
    }

    /**
     * Test tamu / Free User tidak dapat menambah arsip kegiatan (harus login sebagai staf)
     */
    public function test_guest_cannot_store_activity(): void
    {
        $data = [
            'nama_kegiatan' => 'Kegiatan Ilegal Tanpa Login',
            'kategori' => 'Wawasan Kebangsaan',
            'tanggal' => '2026-11-05',
            'lokasi' => 'Pelaihari',
            'rincian' => 'Testing unauthorized store',
            'status' => 'Selesai Dilaksanakan',
        ];

        $response = $this->post(route('wasbang.store'), $data);

        $response->assertRedirect(route('wasbang.login'));
        $this->assertDatabaseMissing('wasbang_kegiatans', [
            'nama_kegiatan' => 'Kegiatan Ilegal Tanpa Login',
        ]);
    }

    /**
     * Test Staf Wasbang dapat menghapus arsip kegiatan
     */
    public function test_staf_wasbang_can_delete_activity(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);
        $kegiatan = WasbangKegiatan::first();

        $staf = User::create([
            'name' => 'Staf Pelaksana Bidang Wasbang',
            'email' => 'wasbang@tanahlautkab.go.id',
            'nip' => '19951015 202203 1 002',
            'password' => bcrypt('password123'),
            'role' => 'staf_wasbang',
        ]);

        $response = $this->actingAs($staf)->delete(route('wasbang.destroy', $kegiatan->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('wasbang_kegiatans', [
            'id' => $kegiatan->id,
        ]);
    }

    /**
     * Test tamu / Free User tidak dapat menghapus arsip kegiatan
     */
    public function test_guest_cannot_delete_activity(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);
        $kegiatan = WasbangKegiatan::first();

        $response = $this->delete(route('wasbang.destroy', $kegiatan->id));

        $response->assertRedirect(route('wasbang.login'));
        $this->assertDatabaseHas('wasbang_kegiatans', [
            'id' => $kegiatan->id,
        ]);
    }

    /**
     * Test halaman login Wasbang dapat diakses secara mandiri dan tidak memuat partai politik
     */
    public function test_wasbang_login_page_renders_cleanly_without_parpol(): void
    {
        $response = $this->get(route('wasbang.login'));

        $response->assertStatus(200);
        $response->assertSee('Masuk ke Sistem WASBANG');
        $response->assertSee('Auranti Muraya Purihaningrum, S.STP.');
        $response->assertSee('H. Bambang Kusdariman, S.I.P., M.Si.');
        // Memastikan tidak ada dropdown 20 partai politik di halaman login Wasbang
        $response->assertDontSee('Pilih Partai Lainnya (20 Parpol)');
    }

    /**
     * Test login sebagai Ibu Kabid Wasbang (Auranti Muraya Purihaningrum, S.STP.)
     */
    public function test_kabid_wasbang_can_login_successfully(): void
    {
        $this->seed(UserSeeder::class);

        $response = $this->post(route('wasbang.login.post'), [
            'email' => 'kabid.wasbang@tanahlautkab.go.id',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('wasbang.index'));
        $this->assertAuthenticated();
    }

    /**
     * Test login sebagai Kepala Badan Kesbangpol (H. Bambang Kusdariman, S.I.P., M.Si.)
     */
    public function test_kaban_can_login_successfully(): void
    {
        $this->seed(UserSeeder::class);

        $response = $this->post(route('wasbang.login.post'), [
            'email' => 'kaban@tanahlautkab.go.id',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('wasbang.index'));
        $this->assertAuthenticated();
    }

    /**
     * Test login sebagai Staf Wasbang
     */
    public function test_staf_wasbang_can_login_successfully(): void
    {
        $this->seed(UserSeeder::class);

        $response = $this->post(route('wasbang.login.post'), [
            'email' => 'wasbang@tanahlautkab.go.id',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('wasbang.index'));
        $this->assertAuthenticated();
    }

    /**
     * Test jika Ibu Kabid mengakses rute /dashboard, dialihkan dengan aman ke wasbang.index tanpa error null property
     */
    public function test_kabid_wasbang_accessing_dashboard_redirects_safely(): void
    {
        $this->seed(UserSeeder::class);
        $kabid = User::where('email', 'kabid.wasbang@tanahlautkab.go.id')->first();

        $response = $this->actingAs($kabid)->get(route('dashboard'));

        $response->assertRedirect(route('wasbang.index'));
        $response->assertSessionHas('wasbang_success');
    }

    /**
     * Test jika Staf Wasbang mengakses rute /dashboard, dialihkan dengan aman ke wasbang.index
     */
    public function test_staf_wasbang_accessing_dashboard_redirects_safely(): void
    {
        $this->seed(UserSeeder::class);
        $staf = User::where('email', 'wasbang@tanahlautkab.go.id')->first();

        $response = $this->actingAs($staf)->get(route('dashboard'));

        $response->assertRedirect(route('wasbang.index'));
        $response->assertSessionHas('wasbang_success');
    }

    /**
     * Test Ibu Kabid melihat Ruang Kerja Khusus Kabid saat membuka /wasbang
     */
    public function test_kabid_sees_dedicated_workspace(): void
    {
        $this->seed([UserSeeder::class, WasbangKegiatanSeeder::class]);
        $kabid = User::where('email', 'kabid.wasbang@tanahlautkab.go.id')->first();

        $response = $this->actingAs($kabid)->get(route('wasbang.index'));

        $response->assertStatus(200);
        $response->assertSee('PANEL KERJA KEPALA BIDANG', false);
        $response->assertSee('Auranti Muraya Purihaningrum, S.STP.');
        $response->assertSee('Daftar Dokumentasi Kegiatan yang Memerlukan Pengesahan');
    }

    /**
     * Test Kepala Badan melihat Ruang Kerja Eksekutif saat membuka /wasbang
     */
    public function test_kaban_sees_executive_workspace(): void
    {
        $this->seed([UserSeeder::class, WasbangKegiatanSeeder::class]);
        $kaban = User::where('email', 'kaban@tanahlautkab.go.id')->first();

        $response = $this->actingAs($kaban)->get(route('wasbang.index'));

        $response->assertStatus(200);
        $response->assertSee('RUANG KERJA EKSEKUTIF', false);
        $response->assertSee('H. Bambang Kusdariman, S.I.P., M.Si.');
        $response->assertSee('Matriks Capaian Pelaksanaan Kegiatan Bidang Wasbang');
    }

    /**
     * Test Staf Wasbang melihat Panel Kerja Operator Lapangan saat membuka /wasbang
     */
    public function test_staf_sees_operator_workspace(): void
    {
        $this->seed([UserSeeder::class, WasbangKegiatanSeeder::class]);
        $staf = User::where('email', 'wasbang@tanahlautkab.go.id')->first();

        $response = $this->actingAs($staf)->get(route('wasbang.index'));

        $response->assertStatus(200);
        $response->assertSee('PANEL OPERATOR LAPANGAN', false);
        $response->assertSee('Formulir Pengarsipan Dokumentasi Kegiatan Lapangan');
        $response->assertSee('Daftar Dokumentasi yang Telah Tersimpan di Server');
    }
}
