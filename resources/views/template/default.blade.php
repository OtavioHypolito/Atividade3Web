<!--DOCTYPE html-->
<html>
    <head>
        <title>Atividade3</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"/>
        <script src="{{ asset('js/jquery.js') }} "></script>
        <script src="{{ asset('js/bootstrap.js') }} "></script>
        <script src="{{ asset('js/script.js') }} "></script>
         
        
    </head>
    <body>
    <!--barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-link" href="/posicao">Posição</a>
                <a class="nav-link" href="/clube">Clube</a>
                <a class="nav-link" href="/jogador">Jogador</a>
            </div>
        </div>
    </nav>
    <!-- alerta de salvar é referenciado no store do posicaoController (3.1) -->
    @if (Session::get("status") == "salvo")
        <div class="alert alert-success" role="alert">
            Salvo com sucesso!
        </div>
    @endif

    <!-- alerta de excluir é referenciado no destroy do posicaoController (4.1) -->
    @if (Session::get("status") == "excluido")
        <div class="alert alert-danger" role="alert">
            Excluido com sucesso!
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- esta buscando os elementos criados no index.blade (2.1) -->
        <div clas="container">
            @yield("cadastro") 

            @yield("listagem")
        </div>  
    </body>
</html>