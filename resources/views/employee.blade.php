@extends('layouts.main')

@section('title', 'Funcionario')

@section('content')

<div class="create-employee">
    <div class="wrap-content">

        <form action="/funcionarios/{{ $funcionario->id }}" method="post" class="needs-validation" novalidate id="form-funcionario">
            @csrf
            @method('PUT')

            <h1>Editar Funcionário</h1>
            @csrf
            <label for="nome">
            <p>Primeiro Nome<span>*</span></p>
            <input class="form-control" type="text" name="nome" placeholder="Digite o nome" required value="{{$funcionario->nome}}">
            @error('nome')
                <div class="invalid-field">{{ $message }}</div>
            @enderror
            </label>

            <label for="email">
                <p>E-mail<span>*</span></p>
                <input class="form-control" id="email" type="email" name="email" placeholder="seuemail@seuemail.com" required novalidate value="{{$funcionario->email}}" readonly>
                <div class="invalid-feedback">Este e-mail já está em uso.</div>
                @error('email')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
            </label>

            <div class="wrap-fields">
                <label for="documento">
                    <p>CPF<span>*</span></p>
                    <input class="form-control cpf" type="text" name="documento" placeholder="000.000.000-00" required maxlength="14" value="{{$funcionario->documento}}">
                    @error('cpf')
                        <div class="invalid-field">{{ $message }}</div>
                    @enderror
                </label>

                <label for="data">
                    <p>Data de nascimento<span>*</span></p>
                    <input class="form-control" type="date" name="data" placeholder="00/00/000" required value="{{$funcionario->nascimento}}">
                    @error('data')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
                </label>
            </div>

            <p class="title-label">Endereço<span>*</span></p>

            <div class="wrap-address">
                <input class="form-control input-adress cep" type="text" name="cep" placeholder="CEP" required value="{{$endereco->cep}}">
                <input class="form-control input-adress" id="rua" type="text" name="rua" placeholder="Rua" required value="{{$endereco->rua}}" readonly>

                <input class="form-control input-adress" type="text" name="numero" placeholder="Nº" required value="{{$endereco->numero}}">
                <input class="form-control input-adress" type="text" name="complemento" placeholder="Complemento" value="{{$endereco->complemento}}">
                <input class="form-control input-adress" id="cidade" type="text" name="cidade" placeholder="Cidade" required value="{{$endereco->cidade}}" readonly>
                <input class="form-control input-adress" id="bairro" type="text" name="bairro" placeholder="Bairro" required value="{{$endereco->bairro}}" readonly>
                <input class="form-control input-adress" id="estado" type="text" name="estado" placeholder="UF" required value="{{$endereco->estado}}" readonly>
            </div>

            <label for="unidade_id">
                <p>Unidade<span>*</span></p>

                <select class="form-control form-select" name="unidade_id" required>
                    <option value="" disabled selected>Escolha uma unidade</option>

                    @foreach ($unidades as $unidade)
                        <option @if($funcionario->unidade_id == $unidade->id ) selected @endif value="{{ $unidade->id }}">{{ $unidade->nome_fantasia }}</option>
                    @endforeach
                </select>


            </label>

            <button type="submit" class="btn-main">
                Salvar
            </button>
            </form>

    </div>

</div>
@endsection
