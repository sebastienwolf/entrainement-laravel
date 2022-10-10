<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $exerpt;

    public $body;

    public $slug;


    public function __construct( $title, $exerpt, $body, $slug)
    {
        $this->title = $title;
        $this->exerpt = $exerpt;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function all()
    {
        return collect(File::files(resource_path("posts")))
        ->map(function($file){
            return YamlFrontMatter::parseFile($file);
        })
        ->map(function($document){
            return new Post(
                $document->title,
                $document->exerpt,
                $document->body(),
                $document->slug
            );
        });
    }

    public static function find($slug)
    {

        $posts = static::all();

        return $posts->firstWhere('slug',$slug);


//         if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
// throw new ModelNotFoundException();

//             return redirect('/');
//         }

//         return cache()->remember("posts.{slug}", 1200, fn () => file_get_contents($path));
    }
}
