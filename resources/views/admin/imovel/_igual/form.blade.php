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
            <a class="nav-link" href="{{route('imovel.index')}}">Imóveis</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!--Retorno da validação-->
    @if($errors->any())
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Atenção!</div>
                <div class="card-body">
                    <h5 class="card-title">Corrija os campos abaixo!</h5>
                    @foreach($errors->all() as $error)
                        <p class="card-text">{{$error}}</p>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="exampleInputEmail1" aria-describedby="emailHelp"
        value="{{$imovel->titulo ?? old('titulo') }}">
        <div id="emailHelp" class="form-text">Digite o título para o ímovel.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o endereço</label>
        <input type="text" class="form-control" name="endereco" id="exampleInputPassword1"
        value="{{$imovel->endereco  ?? old('endereco')}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite a cidade</label>
        <input type="text" class="form-control" name="cidade" id="exampleInputPassword1"
        value="{{$imovel->cidade  ?? old('cidade')}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o estado</label>
        <input type="text" class="form-control" name="estado" id="exampleInputPassword1"
        value="{{$imovel->estado  ?? old('estado')}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o CEP</label>
        <input type="text" class="form-control" name="cep" id="exampleInputPassword1"
        value="{{$imovel->cep ?? old('cep')}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Digite o valor</label>
        <input type="text" class="form-control" name="valor" id="exampleInputPassword1"
        value="{{$imovel->valor  ?? old('valor')}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição</label>
        <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3">{{$imovel->descricao ?? old('descricao')}}</textarea>
    </div>

    <div class="custom-file">
    <label for="exampleFormControlTextarea1">Escolha uma foto</label>
    <input type="file" name="foto" class="custom-file-input" id="validatedCustomFile">
  </div>
@endsection
