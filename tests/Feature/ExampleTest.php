<?php

namespace Tests\Feature;

use App\Models\Aspirasi;
use App\Models\Parpol;
use Database\Seeders\ParpolSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman utama Portal Smart Kesbangpol (Daftar Modul).
     */
    public function test_portal_home_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pilih Layanan Bidang');
        $response->assertSee('SIPARPOL');
        $response->assertSee('WASBANG');
    }

    /**
     * Test modul SIPARPOL Tanah Laut dapat diakses di /parpol dan menampilkan data partai politik.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed(ParpolSeeder::class);

        $response = $this->get('/parpol');

        $response->assertStatus(200);
        $response->assertSee('Data Partai Politik');
        $response->assertSee('Kabupaten Tanah Laut');
        $response->assertSee('PKB');
        $response->assertSee('GERINDRA');
        $response->assertSee('PDI PERJUANGAN');
        $response->assertSee('GOLKAR');
        $response->assertSee('PKS');
        $response->assertSee('Partai Gerakan Rakyat');
    }

    /**
     * Test halaman cetak dokumen resmi format A4 landscape.
     */
    public function test_cetak_page_returns_successful_response(): void
    {
        $this->seed(ParpolSeeder::class);

        $response = $this->get('/cetak-data');

        $response->assertStatus(200);
        $response->assertSee('DATA PARTAI POLITIK KAB. TANAH LAUT TAHUN 2026');
        $response->assertSee('SK3P3');
    }

    /**
     * Test pengiriman aspirasi / pengaduan masyarakat.
     */
    public function test_can_submit_aspirasi(): void
    {
        $data = [
            'nama' => 'Dewi Lestari',
            'email' => 'dewi@example.com',
            'kategori' => 'Informasi Kepemiluan',
            'subjek' => 'Alamat DPC di Pelaihari',
            'pesan' => 'Mohon informasi jam pelayanan sekretariat partai di Angsau.',
        ];

        $response = $this->post(route('parpol.aspirasi'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('aspirasis', [
            'subjek' => 'Alamat DPC di Pelaihari',
            'nama' => 'Dewi Lestari',
        ]);
    }

    /**
     * Test pengajuan permohonan pembaruan data pengurus parpol.
     */
    public function test_can_submit_perubahan_data(): void
    {
        $data = [
            'nama_partai' => 'PKB',
            'nama_pemohon' => 'Supian Hadi',
            'jabatan' => 'Liaison Officer',
            'no_hp' => '085249727776',
            'rincian_perubahan' => 'Pembaruan nomor SK Kepengurusan terbaru tahun 2026.',
        ];

        $response = $this->post(route('parpol.lapor'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('aspirasis', [
            'kategori' => 'Pembaruan Data Pengurus',
        ]);
    }
}
