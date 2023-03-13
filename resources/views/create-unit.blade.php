@extends('layouts.main')

@section('title', 'Registrar funcionário')

@section('content')

<div class="create-unit">
    <div class="wrap-content">
        <form action="/unidades" method="post" class="needs-validation" novalidate>
            <h1>Registrar Unidade</h1>
            @csrf
            <label for="razao_social">
                <p>Razão Social<span>*</span></p>
                <input class="form-control" type="text" name="razao_social" placeholder="Digite a Razão Social" required value="{{ old('razao_social') }}">
                @error('razao_social')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
            </label>

            <label for="nome_fantasia">
                <p>Nome fantasia<span>*</span></p>
                <input class="form-control" type="text" name="nome_fantasia" placeholder="Digite o Nome fantasia" required value="{{ old('nome_fantasia') }}">
                @error('nome_fantasia')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
            </label>


            <label for="cnpj">
                <p>CNPJ<span>*</span></p>
                <input class="form-control cpf" type="text" name="cnpj" placeholder="00.000.000/0000-00" required value="{{ old('cnpj') }}">
                @error('cnpj')
                    <div class="invalid-field">{{ $message }}</div>
                @enderror
            </label>


            <button type="submit" class="btn-main">
                Registrar
            </button>
        </form>

    </div>

</div>
@endsection
