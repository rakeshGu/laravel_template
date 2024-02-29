<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class adminLoginTest extends TestCase
{
    use RefreshDatabase;
    protected static ?string $password;
    /**
     * A basic feature test example.
     */
    public function test_admin_login_view_load(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    public function test_admin_login_with_user_pass(): void
    {
        $this->setUpUser();
    }

}
