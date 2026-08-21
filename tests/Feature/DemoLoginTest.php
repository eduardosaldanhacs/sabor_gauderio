<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_login_is_prefilled_and_authenticates_named_admin(): void
    {
        $this->seed(UsersTableSeeder::class);

        $this->get('/login')
            ->assertOk()
            ->assertSee('value="bento"', false)
            ->assertSee('value="Aa123456"', false);

        $this->post(route('authenticate'), [
            'username' => 'bento',
            'password' => 'Aa123456',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticatedAs(User::where('username', 'bento')->first());
        $this->assertSame('Bento Fagundes', auth()->user()->display_name);
        $this->assertTrue(auth()->user()->is_admin);
    }
}
