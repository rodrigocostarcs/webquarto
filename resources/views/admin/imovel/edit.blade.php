<form action="{{ route('imovel.update', $imovel->id) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('admin.imovel._igual.form')
    <button type="submit" class="btn btn-primary">atualizar dados</button>
</form>
