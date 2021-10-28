@extends('template.layout')

@section('conteudo')
<a href="{{route('post.create')}}" class="btn btn-primary">
    Novo
</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Conteúdo</th>
            <th scope="col">Imagem</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection