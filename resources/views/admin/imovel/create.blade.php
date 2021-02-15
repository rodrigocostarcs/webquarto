<form action="{{route('imovel.store')}}" method="POST" enctype="multipart/form-data">
    @include('admin.imovel._igual.form')
    <button type="submit" class="btn btn-primary">cadastrar</button>
</form>
