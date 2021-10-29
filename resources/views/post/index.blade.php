@extends('layouts.app')

@section('content')
<a href="{{route('post.create')}}" class="btn btn-primary p-2">
    Novo
</a>
<p class="text-danger fw-bold p-3">
    @if(session('error'))
    {{ session('error') }}
    @endif
</p>
<p class="text-success fw-bold p-3">
    @if(session('success'))
    {{ session('success') }}
    @endif
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Conteúdo</th>
            <th scope="col">Imagem</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>
                <img src="{{$post->wayImage()}}" height="50" alt="">
            </td>
            <td>
                <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-success">
                    Editar
                </a>
                <form action="{{ route('post.destroy') }}" method="Post">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" value="{{$post->id}}" name="id">
                    <button type="submit" class="btn btn-danger mt-2">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
