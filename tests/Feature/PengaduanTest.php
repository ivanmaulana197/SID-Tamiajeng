<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PengaduanTest extends TestCase
{
    public function test_halaman_pengaduan()
    {
        $this->get('/pengaduan')->assertStatus(200);
    }

    public function test_halaman_pengaduan_admin()
    {
        $this->login();

        $this->get('admin/pengaduan')->assertStatus(200);
    }

    public function test_submit_form_pengaduan()
    {
        $response = $this->post('pengaduan',[
            'nama' => 'tes nama pengaduan',
            'pengaduan'=> 'isi pengaduan testing'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('pengaduan');
        $response->assertSessionHas('success');
    }

    public function test_gagal_submit_karena_nama_null()
    {
        $response = $this->post('pengaduan',[
            'nama' => '',
            'pengaduan'=> 'isi pengaduan testing'
        ]);
        $response->assertStatus(302);
        
        $response->assertSessionHasErrors(['nama']);

    }


}
