<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Vicente Admin',
            'email'    => 'vicenten@smarthome.ao',
            'telefone' => '+244 912345678',
            'password' => Hash::make('admin123'), // muda para uma senha forte!
            'is_admin' => true,
        ]);

        // Ou atualiza um usuário existente
        // User::where('email', 'luis@exemplo.com')->update(['is_admin' => true]);
    }
}