<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $exerpt;

    public $body;

    public $slug;

    public $id;



    public function __construct(string $title,string $exerpt,string $body,string $slug, $date)
    {
        $this->title = $title;
        $this->exerpt = $exerpt;
        $this->body = $body;
        $this->slug = $slug;
        $this->date = $date;

    }


    public static function all()
    {
        return cache()->rememberForever('posts.all',function(){

            return collect(File::files(resource_path("posts")))
            ->map(function($file){
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function($document){
                return new Post(
                    $document->title,
                    $document->exerpt,
                    $document->body(),
                    $document->slug,
                    $document->id
                );
            })
            ->sortBy('date');
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
