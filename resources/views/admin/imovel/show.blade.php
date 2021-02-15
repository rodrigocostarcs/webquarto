<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('imovel.index')}}">visualizar imóveis</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="pesquisar..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">pesquisar</button>
        </form>
        </div>
    </div>
    </nav>

    <div class="jumbotron">
        <h1 class="display-4">{{$imovel->titulo}}</h1>
        <p class="lead">
            Endereço: {{$imovel->endereco}} <br/>
            Cidade: {{$imovel->cidade}} <br/>
            Estado: {{$imovel->estado}} <br/>
            CEP: {{$imovel->cep}}<br/>
            Valor do Aluguel: {{$imovel->valor}}<br/>
            Status: {{ ($imovel->status == 'd') ? 'disponível' : 'Alugado'}}
        </p>
        <hr class="my-4">
        <p>
            {{$imovel->descricao}}
        </p>
        <p class="lead">
            <div class="container">
                <div class="row">
                <div class="col-6">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Editar</a>
                </div>
                    <div class="col-6">
                        <form action="{{route('imovel.destroy',$imovel->id)}}" method="post" >

                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-lg" value="Excluir">
                        </form>
                    </div>
                </div>
            </div>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
