@extends('layouts.main')

@section('title', 'Funcionários')

@section('content')

<div class="list-employees">
    <div class="wrap-content">

        <h1>Funcionários</h1>
        @if(session('success'))
            <div class="success-msg">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="search-container">
            <form action="/funcionarios/search" method="GET">
                <input name="query" type="text" id="search" class="form-control" placeholder="Procurar funcionário">
            </form>
        </div>

        <div class="list-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Idade</th>
                        <th>Documento</th>
                        <th>Deletar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->email }}</td>
                            <td>{{ $funcionario->idade }}</td>
                            <td>{{ $funcionario->documento }}</td>
                            <td>
                                <button class="delete-button" data-id="{{ $funcionario->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal"><img width="30" height="30" src="{{ asset('images/deletar.svg') }}" alt=""></button>
                            </td>
                            <td><a href="{{ route('funcionarios.edit', ['id' => $funcionario->id]) }}"><img width="25" height="25" src="{{ asset('images/editar.svg') }}" alt=""></a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </div>
</div>


@endsection

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModalLabel">Excluir funcionário</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Tem certeza que deseja excluir o funcionário?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="confirm-delete-button">Excluir</button>
        </div>
      </div>
    </div>
  </div>
