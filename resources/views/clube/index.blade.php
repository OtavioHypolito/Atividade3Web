@extends ("template.default")

@section("cadastro")
<h1>Cadastro de clubes</h1>
<form class="row col-12" action="/clube" method="POST" enctype="multipart/form-data">

    <div class="form-group col-4">
        <label for="nome_clube">Nome do clube: </label>
        <input type="text" id="nome_clube" name="nome_clube" class="form-control" value="{{ $clube->nome_clube }}" />
    </div>
    <div class="form-group col-10 ">
        <div clas="custom-file">
            <label for="imagem_clube" class="custom-file-label"> Foto </label>
            <input type="file" id="imagem_clube" name="imagem_clube" class="custom-file-input" />
        </div>
    </div>

    <div class="form-group col-4">

        @csrf

        <input type="hidden" id="id" name="id" value="{{ $clube->id }}" />
        <a href="/clube" class="btn btn-primary">Novo</a>
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
            <th>Escudo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clubes as $clube)
        <tr>
            <td>{{ $clube->nome_clube }}</td>
            <td>
                <img src="{{ asset('storage' . $clube->imagem_clube) }}" width="100"/>
            </td>

            <td>
                <a href="/clube/{{ $clube->id }}/edit" class="btn btn-warning">Edit</a>
            </td>

            <td>
                <form method="POST" action="/clube/{{ $clube->id }}">
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