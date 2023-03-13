<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create([
            'razao_social' => 'Unidade 1',
            'nome_fantasia' => 'Unidade 1',
            'cnpj' => '11.111.111/1111-11',
        ]);
        Unidade::create([
            'razao_social' => 'Unidade 2',
            'nome_fantasia' => 'Unidade 2',
            'cnpj' => '11.111.111/1111-11',
        ]);

        Unidade::create([
            'razao_social' => 'Unidade 3',
            'nome_fantasia' => 'Unidade 3',
            'cnpj' => '11.111.111/1111-11',
        ]);
    }
}
