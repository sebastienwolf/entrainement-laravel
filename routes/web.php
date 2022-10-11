<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = collect(File::files(resource_path("posts")))

    ->map(function($file){
        return YamlFrontMatter::parseFile($file);
    })
    ->map(function($document){
        return new Post(
            $document->title,
            $document->exerpt,
            $document->body(),
            $document->slug,
            $document->date

        );
    });

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function($slug){
    $post = Post::findOrFail($slug);

    return view('post', [
        'post' => $post
    ]);
});
