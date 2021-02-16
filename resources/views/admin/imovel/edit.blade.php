<form action="{{ route('imovel.update', $imovel->id) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('admin.imovel._igual.form')
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
    <button type="submit" class="btn btn-primary">atualizar dados</button>
</form>
