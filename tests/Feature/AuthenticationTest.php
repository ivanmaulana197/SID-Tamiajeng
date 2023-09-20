<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    // public function test_login_page_can_be_render()
    // {
    //     $this->get('/login')->assertStatus(200);
    // }
   
    public function test_user_can_be_authenticated_using_his_credentials()
    {
        $respons = $this->post('/login', [
            'username'=>'admin',
            'password'=>'12345'
        ]);
        $this->assertAuthenticated();
        $respons->assertRedirect('/admin');
        
    }

    public function test_user_may_not_loggedin_with_username_null_field()
    {
        $response = $this->from('/login')->post('/login', [
            'username'=>'',
            'password'=>'12345'
        ]);
        $response->assertSessionHasErrors(['username']);
    }
    public function test_user_may_not_loggedin_with_pass_null_field()
    {
        $response = $this->from('/login')->post('/login', [
            'username'=>'admin',
            'password'=>''
        ]);
        $response->assertSessionHasErrors(['password']);
    }
    public function test_user_may_not_loggedin_with_wrong_username()
    {
        $response = $this->from('/login')->post('/login', [
            'username'=>'salah username',
            'password'=>'12345'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHas('loginError', 'Login gagal, username salah!');

    }
    public function test_user_may_not_loggedin_with_wrong_password()
    {
        $response = $this->from('/login')->post('/login', [
            'username'=>'admin',
            'password'=>'pass salah'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHas('loginError', 'Login gagal, password salah!');

    }

    
}
