<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use App\Models\Unidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidade = Unidade::where('razao_social', 'Unidade 1')->first();

        Funcionario::create([
            'nome' => 'Rodrigo Henrique 1',
            'email' => 'rodrigo.teste@outlook.com',
            'idade' => 31,
            'documento' => '111.111.111-22',
            'nascimento' => '26/01/1992',
            'unidade_id' => $unidade->id
        ]);

        Funcionario::create([
            'nome' => 'Rodrigo Henrique 2',
            'email' => 'rodrigo.teste2@outlook.com',
            'idade' => 33,
            'documento' => '111.111.111-33',
            'nascimento' => '26/01/1990',
            'unidade_id' => $unidade->id
        ]);
    }
}
