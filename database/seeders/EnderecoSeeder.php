<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionario1 = Funcionario::where('nome', 'Rodrigo Henrique 1')->first();
        $funcionario2 = Funcionario::where('nome', 'Rodrigo Henrique 2')->first();

        Endereco::create([
            'cep' => '12220-490',
            'rua' => 'Angelo Ottoboni',
            'numero' => '27',
            'complemento' => '',
            'bairro' => 'Vila Industrial',
            'cidade' => 'São Jose dos Campos',
            'estado' => 'São Paulo',
            'funcionario_id' => $funcionario1->id
        ]);

        Endereco::create([
            'cep' => '12220-490',
            'rua' => 'Angelo Ottoboni',
            'numero' => '32',
            'complemento' => '',
            'bairro' => 'Vila Industrial',
            'cidade' => 'São Jose dos Campos',
            'estado' => 'São Paulo',
            'funcionario_id' => $funcionario2->id
        ]);

    }
}
