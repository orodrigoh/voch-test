@extends('layouts.main')

@section('title', 'Unidade')

@section('content')

<div class="create-unit">
    <div class="wrap-content">
        <form action="/unidades/{{ $unidade->id }}" method="post" class="needs-validation" novalidate>
            <h1>Editar Unidade</h1>
            @csrf
            @method('PUT')

            <label for="razao_social">
                <p>Razão Social<span>*</span></p>
                <input class="form-control" type="text" name="razao_social" placeholder="Digite a Razão Social" required value="{{$unidade->razao_social}}">
                @error('razao_social')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
            </label>

            <label for="nome_fantasia">
                <p>Nome fantasia<span>*</span></p>
                <input class="form-control" type="text" name="nome_fantasia" placeholder="Digite o Nome fantasia" required value="{{$unidade->nome_fantasia}}">
                @error('nome_fantasia')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
            </label>


            <label for="cnpj">
                <p>CNPJ<span>*</span></p>
                <input class="form-control cpf" type="text" name="cnpj" placeholder="00.000.000/0000-00" required value="{{$unidade->cnpj}}">
                @error('cnpj')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
            </label>


            <button type="submit" class="btn-main">
                Salvar
            </button>
        </form>

    </div>

</div>
@endsection
