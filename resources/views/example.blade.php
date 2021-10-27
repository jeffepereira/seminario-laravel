{{-- if/foreach/for/empty/isset/switch/csrf/error/each>>view/stack --}}


@if(3 > 5)
<strong class="text-danger">Passou</strong>
@elseif(1 > 2)
<strong class="text-danger">Passou no else if</strong>
@else
<strong class="text-danger">Cai no else</strong>
@endif

@empty([])
<br>
<strong class="text-danger">Vetor vazio</strong>
@endempty
@php
$name = 'Nome qualquer'
@endphp

@isset($name)
<br>
<strong class="text-danger">Variavel existe {{$name}}</strong>
@endisset
<br>
@switch(7)
@case(1)
<strong class="text-danger">case 1</strong>

@break
@case(2)
<strong class="text-danger">case 2</strong>

@break
@default
<strong class="text-danger">Default</strong>

@endswitch

@foreach (['Abacaxi', 'Goiaba', 'Morango'] as $itemCorrente )

<p>
    @if($loop->first)
    <b> {{ $itemCorrente}} </b>
    @elseif ($loop->last)
    <i>{{ $itemCorrente}}</i>
    @else
    {{ $itemCorrente}}
    @endif
</p>
@endforeach

@for ($i = 0; $i < 10; $i++) <br>
    The current value is {{ $i }}
    <br>
    @endfor
