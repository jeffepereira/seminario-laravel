@component('mail::message')
<h1>Este é um envio de teste</h1>
@component('mail::panel')
This is the panel content.
@endcomponent
@component('mail::table')
| Laravel | Table | Example |
| ------------- |:-------------:| --------:|
| Col 2 is | Centered | $10 |
| Col 3 is | Right-Aligned | $20 |
@endcomponent
<p>
    Um exemplo muito básico de uso de e-mails no Laravel 6 <br>
    <a href="google.com">Link para o google</a> <br>
    O nome usado foi {{ $name }}... <br>

    @component('mail::button', ['url' => "https://google.com"])
    @endcomponent
</p>
<p>
    <strong>Título: </strong> {{$post->title}}
</p>
<p>
    <strong>Conteúdo: </strong> {{$post->content}}
</p>
<img src="{{$post->image}}" alt="">

@foreach ($post->comments as $comment )
<p>
    <strong>Número do comentári:</strong> {{$comment->id}} <br>
    {{$comment->message}}
</p>
@endforeach
@endcomponent
