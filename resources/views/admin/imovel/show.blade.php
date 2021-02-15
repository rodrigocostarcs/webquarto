@extends('admin.layouts.app')

@section('content')

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
        </div>
    </div>
</nav>

<div class="jumbotron">
    <h1 class="display-4">{{$imovel->titulo}}</h1>
    <p class="lead">
        Endereço: {{$imovel->endereco}} <br />
        Cidade: {{$imovel->cidade}} <br />
        Estado: {{$imovel->estado}} <br />
        CEP: {{$imovel->cep}}<br />
        Valor do Aluguel: {{$imovel->valor}}<br />
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
                <a class="btn btn-primary btn-lg" href="{{route('imovel.edit',$imovel->id)}}" role="button">Editar</a>
            </div>
            <div class="col-6">
                <form action="{{route('imovel.destroy',$imovel->id)}}" method="post">

                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-lg" value="Excluir">
                </form>
            </div>
        </div>
    </div>
    </p>
</div>
@endsection
