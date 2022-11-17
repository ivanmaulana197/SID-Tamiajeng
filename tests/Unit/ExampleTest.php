<?php

namespace Tests\Unit;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_route_admin_can_be_render()
    {
        $admin = User::where('username','admin')->first();

        $response = $this->actingAs($admin)->get('/admin')->assertStatus(200);
    }

    
}
