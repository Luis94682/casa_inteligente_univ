<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dispositivo; // Certifica-te que o model existe
use App\Models\User;
use Faker\Factory as Faker;

class DispositivoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('pt_AO'); // Faker com localização angolana (opcional)

        // Pega o primeiro usuário (ou todos se quiseres dispositivos para vários)
        $user = User::first(); // ou User::find(1);

        if (!$user) {
            $this->command->info('Nenhum usuário encontrado. Crie um usuário primeiro.');
            return;
        }

        // Lista de dispositivos comuns em uma casa
        $dispositivos = [
            // Iluminação
            ['nome' => 'Lâmpada Sala',           'tipo' => 'Iluminação',     'consumo_base' => 12,  'ativo' => true],
            ['nome' => 'Lâmpada Quarto Principal', 'tipo' => 'Iluminação',     'consumo_base' => 15,  'ativo' => true],
            ['nome' => 'Lâmpada Quarto 2',       'tipo' => 'Iluminação',     'consumo_base' => 12,  'ativo' => false],
            ['nome' => 'Lâmpada Cozinha',        'tipo' => 'Iluminação',     'consumo_base' => 18,  'ativo' => true],
            ['nome' => 'Lâmpada Corredor',       'tipo' => 'Iluminação',     'consumo_base' => 8,   'ativo' => false],

            // Eletrodomésticos
            ['nome' => 'Televisão Sala',         'tipo' => 'Eletrodoméstico','consumo_base' => 120, 'ativo' => true],
            ['nome' => 'Frigorífico',            'tipo' => 'Eletrodoméstico','consumo_base' => 150, 'ativo' => true],
            ['nome' => 'Máquina de Lavar',       'tipo' => 'Eletrodoméstico','consumo_base' => 500, 'ativo' => false],
            ['nome' => 'Micro-ondas',            'tipo' => 'Eletrodoméstico','consumo_base' => 1200,'ativo' => false],
            ['nome' => 'Ferro de Engomar',       'tipo' => 'Eletrodoméstico','consumo_base' => 1500,'ativo' => false],

            // Climatização
            ['nome' => 'Ar Condicionado Sala',   'tipo' => 'Climatização',   'consumo_base' => 1500,'ativo' => true],
            ['nome' => 'Ventoinha Quarto',       'tipo' => 'Climatização',   'consumo_base' => 75,  'ativo' => false],

            // Outros
            ['nome' => 'Carregador Telemóvel',   'tipo' => 'Outros',          'consumo_base' => 10,  'ativo' => true],
            ['nome' => 'Computador Escritório',  'tipo' => 'Informática',    'consumo_base' => 300, 'ativo' => false],
        ];

        foreach ($dispositivos as $disp) {
            Dispositivo::create([
                'user_id'       => $user->id,
                'nome'          => $disp['nome'],
                'tipo'          => $disp['tipo'],
                'consumo_base'  => $disp['consumo_base'],
                'ativo'         => $disp['ativo'],
            ]);
        }

        $this->command->info('14 dispositivos criados com sucesso para o usuário ID ' . $user->id . '!');
    }
}