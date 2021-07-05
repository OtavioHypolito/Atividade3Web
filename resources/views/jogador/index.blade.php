@extends ("template.default")

@section("cadastro")
<h1>Cadastro de jogadores</h1>
<form class="row col-12" action="/jogador" method="POST" enctype="multipart/form-data">
    <div class="form-group col-4">
        <label for="nome_jogador">Nome do Jogador </label>
        <input type="text" id="nome_jogador" name="nome_jogador" class="form-control" value="{{ $jogador->nome_jogador }}" />
    </div>

    <div class="form-group col-4">
        <label for="data_nascimento">Data de Nascimento </label>
        <input type="text" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ $jogador->data_nascimento }}" />
    </div>

    <div class="form-group col-4">
        <label for="clube_jogador">Clube do Jogador </label>
        <input type="text" id="clube_jogador" name="clube_jogador" class="form-control" value="{{ $jogador->clube_jogador }}" />
    </div>

    <div class="form-group col-4">
        <label for="posicao_jogador">Posição do Jogador </label>
        <input type="text" id="posicao_jogador" name="posicao_jogador" class="form-control" value="{{ $jogador->posicao_jogador }}" />
    </div>

    <div class="form-check col-4">
        <input type="checkbox" class="form-check-input" id="check_figurinha" value="1"/>
        <label class="form-check-label" for="check_figurinha">Possui Figurinha</label>
    </div>

    <div class="form-group col-4">

        @csrf

        <input type="hidden" id="id" name="id" value="{{ $jogador->id }}" />
        <a href="/jogador" class="btn btn-primary">Novo</a>
        <button type="submit" class="btn btn-sucess">Salvar</button>

    </div>
</form>
@endsection


@section("listagem")
<!-- TABELA  -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome do Clube</th>
            <th>Data de nascimento</th>
            <th>Clube do Jogador</th>
            <th>Posição do Jogador</th>
            <th>figurinha</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($jogadores as $jogador)
        <tr>
            <td>{{ $jogador->nome_jogador }}</td>
            <td>{{ $jogador->data_nascimento }}</td>
            <td>{{ $jogador->clube_jogador }}</td>
            <td>{{ $jogador->posicao_jogador }}</td>
            <td>
                {{ $jogador->check_figurinha }} 
            </td>


        </tr>
        @endforeach
    </tbody>
</table>

@endsection