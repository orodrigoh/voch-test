<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;

class UnidadeController extends Controller
{
    public function index() {
        $unidades = Unidade::all();
        return view('list-units', compact('unidades'));
    }

    public function edit($id) {
        $unidade = Unidade::find($id);

        return view('unit', ['unidade'=>$unidade]);
    }

    public function update(Request $request, $id) {
        $unidade = Unidade::find($id);

        $unidade->razao_social = $request->razao_social;
        $unidade->nome_fantasia = $request->nome_fantasia;
        $unidade->cnpj = $request->cnpj;

        $unidade->save();

        return redirect('/unidades')->with('success', 'Unidade atualizada com sucesso!');
    }

    public function create() {
        return view('create-unit');
    }

    public function delete($id) {
        $unidade = Unidade::find($id);
        $unidade->delete();

        return response()->json([
            'message' => 'Unidade excluida com sucesso!'
        ]);
    }

    public function store(Request $request) {
        $regras = [
            'razao_social'   => 'required|min:2|max:40|unique:unidades',
            'nome_fantasia' => 'required|min:2|max:40',
            'cnpj' => 'required'
        ];

        $feedback = [
            'required'    => 'O campo :attribute deve ser preenchido',
            'razao_social.min'    => 'O campo nome deve ter no mínimo 2 caracteres',
            'razao_social.max'    => 'O campo nome deve ter no máximo 40 caracteres',
            'razao_social.unique' => 'Unidade já existe',
            'nome_fantasia.min'    => 'O campo nome deve ter no mínimo 2 caracteres',
            'nome_fantasia.max'    => 'O campo nome deve ter no máximo 40 caracteres',

            'documento.cnpj' => 'CNPJ é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $unidade = new Unidade;

        $unidade->razao_social = $request->razao_social;
        $unidade->nome_fantasia = $request->nome_fantasia;
        $unidade->cnpj = $request->cnpj;

        $unidade -> save();
        return redirect()->back()->with('success', 'Funcionário criado com sucesso.');

    }
}
