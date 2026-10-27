<?php

namespace Tests\Feature;

use App\Models\WasbangKegiatan;
use Database\Seeders\WasbangKegiatanSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class WasbangTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman utama Wasbang dapat diakses dengan sukses
     */
    public function test_wasbang_index_returns_successful_response(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);

        $response = $this->get(route('wasbang.index'));

        $response->assertStatus(200);
        $response->assertSee('WASBANG TANAH LAUT');
        $response->assertSee('Bidang Bina Ideologi, Wawasan Kebangsaan & Karakter Bangsa');
        $response->assertSee('Pengarsipan Dokumentasi');
        $response->assertSee('Sosialisasi Penguatan 4 Konsensus Dasar Kebangsaan');
        $response->assertSee('Pemusatan Diklat Lapangan Calon Pasukan Pengibar Bendera Pusaka');
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
     * Test halaman cetak rekapitulasi Wasbang
     */
    public function test_wasbang_cetak_returns_successful_response(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);

        $response = $this->get(route('wasbang.cetak'));

        $response->assertStatus(200);
        $response->assertSee('REKAPITULASI PENGARSIPAN DOKUMENTASI LAPORAN KEGIATAN LUAR LAPANGAN');
        $response->assertSee('PEMERINTAH KABUPATEN TANAH LAUT');
    }

    /**
     * Test halaman cetak detail berita acara tunggal
     */
    public function test_wasbang_cetak_detail_returns_successful_response(): void
    {
        $this->seed(WasbangKegiatanSeeder::class);
        $kegiatan = WasbangKegiatan::first();

        $response = $this->get(route('wasbang.cetak.detail', $kegiatan->id));

        $response->assertStatus(200);
        $response->assertSee('BERITA ACARA & LEMBAR LAPORAN DOKUMENTASI KEGIATAN LUAR');
        $response->assertSee($kegiatan->nama_kegiatan);
    }

    /**
     * Test tambah dokumentasi kegiatan luar baru
     */
    public function test_can_store_new_wasbang_activity(): void
    {
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

        $response = $this->post(route('wasbang.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('wasbang_kegiatans', [
            'nama_kegiatan' => 'Penyuluhan Wawasan Nusantara di Kecamatan Jorong',
            'hari' => 'Kamis',
        ]);
    }
}
