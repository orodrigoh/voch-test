<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro Realizado com Sucesso</h1>
    <h2>Detalhes do Cadastro</h2>
    <p>Nome: {{ $funcionario->nome }}</p>
    <p>E-mail: {{ $funcionario->nome }}</p>
    <p>CPF: {{ $funcionario->documento }}</p>
    <p>Idade: {{ $funcionario->idade }}</p>
    <br>
    <h3>Endereço</h3>
    <p>CEP: {{ $endereco->cep }}</p>
    <p>Rua: {{ $endereco->rua }}</p>
    <p>Número: {{ $endereco->numero }}</p>
    <p>Bairro: {{ $endereco->bairro }}</p>
    <p>Cidade: {{ $endereco->cidade }}</p>
    <p>Estado: {{ $endereco->estado }}</p>


</body>
</html>
