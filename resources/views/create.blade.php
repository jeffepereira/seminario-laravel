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
            <input type="text" name='title' class="form-control" id="inputTitle" value="{{ old('title')}}">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputContent" class="form-label">Conteúdo</label>
            <textarea name="content" class="form-control" id="inputContent" rows="3">{{old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Imagem de destaque</label>
            <input name="image" class="form-control" type="file" id="formFile">
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <p class="text-success">
            @if(session('success'))
            {{ session('success') }}
            @endif
        </p>
        <button class="btn btn-primary" type="submit">
            Salvar
        </button>
    </form>
</div>

@endsection

@section('rodape')
@endsection