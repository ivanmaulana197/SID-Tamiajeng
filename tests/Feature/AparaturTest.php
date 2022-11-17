<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AparaturTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   public function test_tambah_aparatur()
   {
    $this->login();
    $response = $this->from('/admin/info-desa/aparatur')->post('admin/info-desa/aparatur',[
        'nama'=>'sembarang',
        'jabatan'=>'tes',
        'gambar'=> asset('img/profile.png')
    ]);
    $response->assertStatus(302);
    $response->assertRedirect('/admin/info-desa/aparatur');
   }
}
