<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    public function test_login_page_can_be_render()
    {
        $this->get('/login')->assertStatus(200);
    }
   
    public function test_user_can_be_authenticated_using_his_credentials()
    {
        $respons = $this->post('/login', [
            'username'=>'admin',
            'password'=>'12345'
        ]);
        $this->assertAuthenticated();
        $respons->assertRedirect('/admin');
    }

    public function test_user_may_not_loggedin_with_wrong_credentials()
    {
        $response = $this->from('/login')->post('/login', [
            'username'=>'admin',
            'password'=>'pass salah'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHas('loginError');

    }

    
}
