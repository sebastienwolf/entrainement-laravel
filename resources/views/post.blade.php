<x-layout>
    <article>
        <h1> {{$post->title;}}</h1>
        <div>
        {!! $post->body; !!}
        </div>

    </article>
    <x-button>
        <a href="/"> go back</a>
    </x-button>

</x-layout>


{{-- @extends('layout')

@section('content')
<article>
    <h1> {{$post->title;}}</h1>
    <div>
    {!! $post->body; !!}
    </div>
    <a href="/"> go back</a>

@endsection --}}