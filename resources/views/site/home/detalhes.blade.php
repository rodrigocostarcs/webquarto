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
                <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('imovel.procurar')}}" tabindex="-1" aria-disabled="true">procure por mais lugares</a>
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
        <span style="display:none;"  id="latitude">{{$imovel->latitude}}</span><br/>
        <span style="display:none;" id="longitude">{{$imovel->longitude}}</span>

<p id="demo">Mostrar a localização.</p>

<button  class="btn btn-success" onclick="showPosition()">abrir mapa</button>

<div id="mapholder"></div>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
var x=document.getElementById("demo");

function showPosition(position)
  {

  lat= document.getElementById("latitude").innerHTML;
  lon= document.getElementById("longitude").innerHTML;
  latlon = new google.maps.LatLng(parseFloat(lat), parseFloat(lon))
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='250px';
  mapholder.style.width='500px';

  var myOptions={
  center:latlon,zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Você está Aqui!"});
  }

</script>


    </p>
    <hr class="my-4">
    <p>
        {{$imovel->descricao}}
    </p>
    <p class="lead">
    <div class="container">

        <div class="row">
            <div class="col-12">
            <h1>Outros próximos a este que você visualizou. No Raio de 20KM</h1>
            </div>
        </div>
        <div class="row">
        @foreach($imoveisProximos as $imovel)
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
    {{$imoveisProximos->appends($filtro)->links()}}
    @else
    {{$imoveisProximos->links()}}
    @endif
    </div>
    </p>
</div>
@endsection
