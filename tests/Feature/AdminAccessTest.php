<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_regular_customer_cannot_access_administration(): void
    {
        $user = User::create(['username' => 'cliente', 'email' => 'cliente@example.com', 'password' => bcrypt('secret'), 'active' => true]);

        $this->actingAs($user)->get('/admin')->assertForbidden();
    }

    public function test_administrator_can_open_dashboard(): void
    {
        $admin = User::create(['username' => 'gestor', 'email' => 'gestor@example.com', 'password' => bcrypt('secret'), 'active' => true]);
        $admin->forceFill(['is_admin' => true])->save();

        $this->actingAs($admin)->get('/admin')->assertOk()->assertSee('Visão geral');
    }
}
