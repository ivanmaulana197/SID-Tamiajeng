<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Support\Str;

class BeritaTest extends TestCase
{

    public function test_route_berita_dapat_diakses()
    {
        $this->get('/berita')->assertStatus(200);
    }

    public function test_route_berita_admin_dapat_diakses()
    {
        $this->login();
        $response = $this->get('/admin/berita')->assertStatus(200);
    }

    public function test_tambah_category_berita()
    {
        $this->login();
        
        $nama_category = 'bebas';
        $response = $this->post('/admin/berita/category',[
            'nama_category'=> $nama_category,
            'slug' =>Str::slug($nama_category,'-')
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/admin/berita');
        $this->assertEquals(session('success'), 'Category Berita Desa berhasil ditambahkan');
    }

    public function test_tambah_berita()
    {
        $admin = User::where('is_admin',true)->first();
        // $title = $this->faker->sentence();
        $response = $this->actingAs($admin)
                    ->post('/admin/berita/add',[
                        'category_id'=>Category::all()->last()->id,
                        'user_id'=>$admin->id,
                        'title' => 'testing',
                        'body' => 'contoh body',
                        'status' => 'Public',
                    ]);
        // dd($response);
        $response->assertStatus(302);
        $response->assertRedirect('/admin/berita');
        $this->assertEquals(session('success'), 'Berita Desa berhasil ditambahkan');       
    }

}
