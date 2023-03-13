<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Endereco;
use App\Models\Unidade;
use Carbon\Carbon;
use App\Mail\ConfirmacaoCadastro;
use Illuminate\Support\Facades\Mail;

class FuncionarioController extends Controller
{
    public function index() {
        $funcionarios = Funcionario::all();

        return view('list-employees',compact('funcionarios'));
    }

    public function create() {
        $unidades = Unidade::all();
        return view('create-employee', compact('unidades'));
    }

    public function store(Request $request) {

        $regras = [
            'nome'   => 'required|min:2|max:40',
            'email' => 'required|email|unique:funcionarios,email',
            'data'  => 'required',
            'documento' => 'required'
        ];

        $feedback = [
            'required'    => 'O campo :attribute deve ser preenchido',
            'nome.min'    => 'O campo nome deve ter no mínimo 2 caracteres',
            'nome.max'    => 'O campo nome deve ter no máximo 40 caracteres',
            'email.required' => 'O e-mail é obrigatório',
            'email.email' => 'O e-mail precisa ser um endereço de e-mail válido',
            'email.unique' => 'Este e-mail já está em uso',
            'data.required' => 'A data de nascimento é obrigatória',
            'documento.cpf' => 'CPF é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $funcionario = new Funcionario;
        $endereco = new Endereco;

        $funcionario->nome = $request->nome;
        $funcionario->email = $request->email;
        $funcionario->documento = $request->documento;
        $funcionario->unidade_id = $request->unidade_id;
        $funcionario->nascimento = $request->data;

        $idade = Carbon::parse($request->data)->diffInYears(Carbon::now());
        $funcionario->idade =  $idade;

        $endereco->cep = $request->cep;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;

        $funcionario -> save();
        $funcionario -> endereco()->save($endereco);

        Mail::to($funcionario->email)->send(new ConfirmacaoCadastro($funcionario, $endereco));

        return redirect()->back()->with('success', 'Funcionário '.$funcionario->nome. ' criado com sucesso');

    }

    public function edit($id) {
        $funcionario = Funcionario::find($id);
        $unidades = Unidade::all();
        $endereco = $funcionario->endereco;
        return view('employee', ['funcionario' => $funcionario, 'unidades'=>$unidades, 'endereco'=> $endereco]);
    }

    public function update(Request $request, $id) {
        $funcionario = Funcionario::find($id);

        $funcionario->nome = $request->nome;
        $funcionario->email = $request->email;
        $funcionario->documento = $request->documento;
        $funcionario->unidade_id = $request->unidade_id;
        $funcionario->nascimento = $request->data;

        $idade = Carbon::parse($request->data)->diffInYears(Carbon::now());
        $funcionario->idade =  $idade;

        $endereco = $funcionario->endereco;

        $endereco->cep = $request->cep;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;

        $funcionario->save();
        $endereco->save();

        return redirect('/funcionarios')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function delete($id) {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();

        return response()->json([
            'message' => 'Funcionário excluido com sucesso!'
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $funcionarios = Funcionario::where('nome', 'LIKE', '%' . $query . '%')->get();

        return view('list-employees', ['funcionarios' => $funcionarios]);
    }

    public function validarEmail($email) {
        $funcionario = Funcionario::where('email', $email)->first();

        if ($funcionario) {
            return response()->json(['email' => 'Este email já está em uso.'], 422);
        } else {
            return response()->json(['email' => ''], 200);
        }
    }
}
