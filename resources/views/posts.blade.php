<!DOCTYPE html>

<title>my blog</title>
<link rel="stylesheet" href="/css/app.css">

<body>
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
</body>