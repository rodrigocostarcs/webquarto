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
            <a class="nav-link" href="{{route('imovel.index')}}">Imóveis</a>
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

    <form action="{{route('imovel.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Digite o título para o ímovel.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o endereço</label>
        <input type="text" class="form-control" name="endereco" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite a cidade</label>
        <input type="text" class="form-control" name="cidade" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o estado</label>
        <input type="text" class="form-control" name="estado" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o CEP</label>
        <input type="text" class="form-control" name="cep" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o valor</label>
        <input type="text" class="form-control" name="valor" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição</label>
        <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <div class="custom-file">
    <label for="exampleFormControlTextarea1">Escolha uma foto</label>
    <input type="file" name="foto" class="custom-file-input" id="validatedCustomFile" required>
  </div>

    <button type="submit" class="btn btn-primary">cadastrar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
