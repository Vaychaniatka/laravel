<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

use App\Http\Requests;

class PostController extends Controller
{
    public function index(Post $postModel)
    {

        $posts = $postModel->getPublishedPosts();
        //$posts=$query->paginate(4);
        return view('post.index', ['posts'=>$posts]);
    }

    public function publishedPosts(Post $postModel)
    {
        $posts = $postModel->getPublishedPosts();
        return $posts;


    }

    public function unpublishedPosts(Post $postModel)
    {
        $posts = $postModel->getUnpublishedPosts();
        return $posts;

    }

    public function show($id, Post $postModel)
    {
        //dd($id);
        $posts =  $postModel->where('id',$id)->first();
        //dd($posts);
        return view('post.view', ['posts'=>$posts]);


    }

    public function edit($id)
    {
        echo 'Hello';

    }

    public function store(Post $postModel, Request $request )
    {
        $postModel->create($request->all());
        return redirect()->route('post.index');
    }

    public function delete($id)
    {

    }

    public function create()
    {
        return view('post.add');

    }


}
