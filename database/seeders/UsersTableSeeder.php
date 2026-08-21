<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Bento Fagundes', 'username' => 'bento', 'email' => 'bento@saborgauderio.test', 'is_admin' => true],
            ['name' => 'Clara Silveira', 'username' => 'clara', 'email' => 'clara@saborgauderio.test', 'is_admin' => false],
            ['name' => 'Miguel Dornelles', 'username' => 'miguel', 'email' => 'miguel@saborgauderio.test', 'is_admin' => false],
            ['name' => 'Laura Martins', 'username' => 'laura', 'email' => 'laura@saborgauderio.test', 'is_admin' => false],
        ];
        foreach ($users as $user) {
            User::withTrashed()->updateOrCreate(['email' => $user['email']], $user + [
                'password' => Hash::make('Aa123456'), 'email_verified_at' => now(),
                'active' => true, 'deleted_at' => null,
            ]);
        }
    }
}
