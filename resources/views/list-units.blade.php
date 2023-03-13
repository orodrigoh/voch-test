@extends('layouts.main')

@section('title', 'Unidades')

@section('content')

<div class="list-employees">
    <div class="wrap-content">

        <h1>Unidades</h1>
        @if(session('success'))
            <div class="success-msg">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="search-container">
            <form action="">
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar unidade">
            </form>
        </div>

        <div class="list-container">
            <table>
                <thead>
                    <tr>
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>CNPJ</th>
                        <th>Deletar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidades as $unidade)
                        <tr>
                            <td>{{ $unidade->razao_social }}</td>
                            <td>{{ $unidade->nome_fantasia }}</td>
                            <td>{{ $unidade->cnpj }}</td>

                            <td>
                                <button class="delete-button-unit" data-id="{{ $unidade->id }}" data-bs-toggle="modal" data-bs-target="#deleteUnitModal"><img width="30" height="30" src="{{ asset('images/deletar.svg') }}" alt=""></button>
                            </td>
                            <td><a href="{{ route('unidades.edit', ['id' => $unidade->id]) }}"><img width="25" height="25" src="{{ asset('images/editar.svg') }}" alt=""></a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </div>
</div>


@endsection

  <!-- Modal -->
  <div class="modal fade" id="deleteUnitModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModalLabel">Excluir unidade</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Tem certeza que deseja excluir a unidade?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" id="confirm-delete-button">Excluir</button>
        </div>
      </div>
    </div>
  </div>
