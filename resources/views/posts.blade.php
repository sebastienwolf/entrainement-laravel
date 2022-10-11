<x-layout>
    @foreach ($posts as $post)
    <article>
        <a href="/posts/{{$post->slug;}}">   
        {{ $post->title;}} 
    </a>
<p>
    <a href="#">{{ $post->category->name }}</a>
</p>

    <div>
    {{$post->exerpt;}}
    </div>
        

    </article>
    @endforeach
</x-layout>


{{-- 

@extends('layout')

@section('banner')
<h1> My banner</h1>
@endsection

@section('content')
@foreach ($posts as $post)
    <article>
        <a href="/posts/{{$post->slug;}}">   
        {{ $post->title;}} 
    </a>

    <div>
    {{$post->exerpt;}}
    </div>
        

    </article>
    @endforeach

@endsection --}}
