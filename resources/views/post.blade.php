<x-layout>
    <article>
        <h1> {{$post->title;}}</h1>
        <p>
            <a href="/category/{{$post->category->slug}}">{{ $post->category->name }}</a>
        </p>
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