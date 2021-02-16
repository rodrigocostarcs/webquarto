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
                <a class="nav-link" href="{{route('home')}}">site</a>
                </li>
            </ul>
            <form action="{{route('localizar.search')}}" class="d-flex" method="post">
                @csrf
                <input class="form-control me-2" type="search" name="search" placeholder="pesquise por cidades" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">pesquisar</button>
            </form>
        </div>
    </div>
</nav>

<h1>Procure seu imóvel agora mesmo!</h1>

@if(session('message'))
<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
    <div class="card-header">Sucesso!</div>
    <div class="card-body">
        <h5 class="card-title">Lista de imóveis atualizada.</h5>
        <p class="card-text">{{session('message')}}</p>
    </div>
</div>
</div>
@endif

<div class="container">
    <div class="row">
        @foreach($imoveis as $imovel)
        <div class="card col-4" style="width: 18rem;">
            <img src="{{url("storage/{$imovel->foto}")}}" class="card-img-top" alt="{{$imovel->titulo}}"
            style="max-width: 300px;">
            <div class="card-body">
                <h5 class="card-title">{{$imovel->titulo}}</h5>
                <p class="card-text">
                    {{substr($imovel->descricao, 0, 120)}} (...)
                </p>
                <a href="{{route('imovel.detalhes',['id'=> $imovel->id])}}" class="btn btn-primary">Saiba mais</a>
            </div>

        </div>
        @endforeach
    </div>

    <hr>
    @if(isset($filtro))
    {{$imoveis->appends($filtro)->links()}}
    @else
    {{$imoveis->links()}}
    @endif
</div>
@endsection
