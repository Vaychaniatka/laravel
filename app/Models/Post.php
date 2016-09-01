<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Post extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'title', 'content', 'slug', 'excerpt', 'viewed', 'published', 'published_at'];


    public function getPublishedPosts()
    {
        $posts = Post::latest('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->where('published', '=', true)->paginate(4);//get();
        return $posts;

    }

    public function getUnpublishedPosts()
    {

        $posts = Post::latest('created_at')
            ->where('published_at', '=>', Carbon::now())
            ->orWhere('published', '=', false)->paginate(4);
        return $posts;

    }

    public function getAll()
    {
        $posts = Post::latest('id')->paginate(4);
        return $posts;
    }
}
