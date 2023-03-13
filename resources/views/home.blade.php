@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="wrap-content">
        <h1>Escolha uma opção para iniciar</h1>
        <a href="/funcionarios/criar" class="btn-main">Novo Funcionário</a>
        <a href="/unidades/criar" class="btn-main">Nova Unidade</a>

    </div>
</div>

@endsection
