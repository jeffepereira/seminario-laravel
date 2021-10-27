@extends('template.layout')


@section('conteudo')

@component('alert', ['type' => "Info!!!"])
<p class="my-0"> Esta é a página de criação do Post</p>
@endcomponent

<div class="py-3 px-3">
    <form method="post" action="{{url('/posts/store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Título</label>
            <input type="text" name='title' class="form-control" id="inputTitle">
        </div>
        <div class="mb-3">
            <label for="inputContent" class="form-label">Conteúdo</label>
            <textarea name="content" class="form-control" id="inputContent" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Imagem de destaque</label>
            <input name="image" class="form-control" type="file" id="formFile">
        </div>
        <button class="btn btn-primary" type="submit">
            Salvar
        </button>
    </form>
</div>

@endsection

@section('rodape')
@endsection
