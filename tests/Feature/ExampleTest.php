<?php

namespace Tests\Feature;

use App\Models\Anggota;
use App\Models\Aspirasi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test halaman utama PARPOL dapat diakses dengan sukses.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('PARPOL');
        $response->assertSee('Dewan Pimpinan Pusat (DPP)');
    }

    /**
     * Test pendaftaran kader baru berhasil disimpan.
     */
    public function test_can_register_new_anggota(): void
    {
        $data = [
            'nama_lengkap' => 'Ahmad Fauzi',
            'nik' => '3201234567890001',
            'email' => 'ahmad.fauzi@example.com',
            'no_telepon' => '081234567890',
            'provinsi' => 'Jawa Barat',
            'kota_kabupaten' => 'Kota Bandung',
            'motivasi' => 'Ingin berkontribusi memajukan pendidikan desa.',
        ];

        $response = $this->post(route('parpol.daftar'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('anggotas', [
            'nik' => '3201234567890001',
            'nama_lengkap' => 'Ahmad Fauzi',
        ]);
    }

    /**
     * Test pengiriman aspirasi publik berhasil disimpan.
     */
    public function test_can_submit_aspirasi(): void
    {
        $data = [
            'nama' => 'Dewi Lestari',
            'email' => 'dewi@example.com',
            'kategori' => 'Pendidikan',
            'subjek' => 'Perbaikan Gedung Sekolah Dasar',
            'pesan' => 'Mohon perhatian untuk SD di daerah pelosok yang atapnya bocor.',
        ];

        $response = $this->post(route('parpol.aspirasi'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('aspirasis', [
            'subjek' => 'Perbaikan Gedung Sekolah Dasar',
            'kategori' => 'Pendidikan',
        ]);
    }
}
