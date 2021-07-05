@extends ("template.default")

<!-- mandando labels cadastro para o default blade (2.1) -->
@section("cadastro")
<h1>Cadastro de Posições</h1>
<!--Labels de cadastro -->
<form class="row col-12" action="/posicao" method="POST">

    <div class="form-group col-4">
        <label for="goleiro">Goleiro: </label>
        <input type="text" id="goleiro" name="goleiro" class="form-control" value="{{ $posicao->goleiro }}" />
    </div>

    <div class="form-group col-4">
        <label for="defensor">Defensor: </label>
        <input type="text" id="defensor" name="defensor" class="form-control" value="{{ $posicao->defensor }}" />
    </div>

    <div class="form-group col-4">
        <label for="lateral">Lateral: </label>
        <input type="text" id="lateral" name="lateral" class="form-control" value="{{ $posicao->lateral }}" />
    </div>

    <div class="form-group col-4">
        <label for="volante">Volante: </label>
        <input type="text" id="volante" name="volante" class="form-control" value="{{ $posicao->volante }}" />
    </div>

    <div class="form-group col-4">
        <label for="meia">Meia: </label>
        <input type="text" id="meia" name="meia" class="form-control" value="{{ $posicao->meia}}" />
    </div>

    <div class="form-group col-4">
        <label for="atacante">Atacante: </label>
        <input type="text" id="atacante" name="atacante" class="form-control" value="{{ $posicao->atacante }}" />
    </div>

    <div class="form-group col-8">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="4" value="{{ $posicao->descricao }}"></textarea>
    </div>

    <div class="form-group col-4">

        @csrf

        <input type="hidden" id="id" name="id" value="{{ $posicao->id }}" />
        <a href="/posicao" class="btn btn-primary">Novo</a>
        <button type="submit" class="btn btn-sucess">Salvar</button>

    </div>

</form>
@endsection

<!-- mandando tabela para o default blade (2.1) -->
@section("listagem")
<!-- TABELA  -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>Goleiro</th>
            <th>Defensor</th>
            <th>Lateral</th>
            <th>Volante</th>
            <th>Meia</th>
            <th>Atacante</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posicoes as $posicao)
        <tr>
            <td>{{ $posicao->goleiro }}</td>
            <td>{{ $posicao->defensor }}</td>
            <td>{{ $posicao->lateral }}</td>
            <td>{{ $posicao->volante }}</td>
            <td>{{ $posicao->meia }}</td>
            <td>{{ $posicao->atacante }}</td>
            <td>{{ $posicao->descricao }}</td>

            <!--botao editar referenciado em posicaoController-->
            <td>
                <a href="/posicao/{{ $posicao->id }}/edit" class="btn btn-warning">Edit</a>
            </td>
            <!--botao deletar referenciado em posicaoController-->
            <td>
                <form method="POST" action="/posicao/{{ $posicao->id }}">
                    <input type="hidden" name="_method" value="DELETE" />
                    @csrf
                    <button type="submit" class="btn btn-danger">Del</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection