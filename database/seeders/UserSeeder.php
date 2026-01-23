<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Teste',
            'email' => 'admin@smarthome.ao',
            'password' => Hash::make('password123'),
            'is_admin' => true, // se tiveres campo admin
        ]);

        User::create([
            'name' => 'Usuário Teste',
            'email' => 'teste@smarthome.ao',
            'password' => Hash::make('password123'),
        ]);

        $this->command->info('Usuários criados com sucesso!');
    }
}