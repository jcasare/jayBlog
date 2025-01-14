<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\Sheets\Facades\Sheets;

Route::get('/', function () {
    $posts = Sheets::collection('posts')->all();
    return view('posts.index',[
        'posts'=>$posts
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
    $post = Sheets::collection('posts')->all()->where('slug', $slug)->first();
    abort_if(is_null($post), 404);
    return view('posts.show', ['post'=>$post]);
});

Route::get('/authors/{author}', function ($author) {
        $posts = Sheets::collection('posts')
        ->all()->filter(fn (Post $post)=> $post->author === $author);
    return view('authors.show', ['posts'=>$posts, 'authorName'=>$posts->first()->author_name]);
});

Route::get('/tags/{tag}', function ($tag) {
    $posts = Sheets::collection('posts')
    ->all()
    ->filter(fn (Post $post) => in_array($tag, $post->tags));
    return view('tags.show', ['posts'=> $posts, 'tag'=> $tag]);
});