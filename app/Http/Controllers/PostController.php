<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use DB;

use App\Http\Requests;

class PostController extends Controller
{

    public function index(Post $postModel)
    {

        $posts = $postModel->getPublishedPosts();
        return view('post.index', ['posts'=>$posts]);
    }



    public function publishedPosts(Post $postModel)
    {
        $posts = $postModel->getPublishedPosts();
        return $posts;


    }

    public function getUnpublished(Post $postModel)
    {
        $posts = $postModel->getUnpublishedPosts();
        return view('post.index', ['posts'=>$posts]);


    }

    public function viewAll(Post $postModel)
    {
        $posts = $postModel->getAll();
        return view('post.index', ['posts'=>$posts]);

    }

    public function show($id, Post $postModel)
    {

        $posts =  $postModel->where('id',$id)->first();
        return view('post.view', ['posts'=>$posts]);



    }

    public function edit($id, Post $postModel)
    {
        $this->authorize('admin', \Auth::user());

        $posts = $postModel->where('id',$id)->first();
        return view('post.edit', ['posts'=>$posts]);

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

    public function update(Post $postModel, Request $request)
    {
        $this->authorize('admin', \Auth::user());


        $new_data=$request->all();
        //$id = $new_data->id;
        //$post = $postModel->find($id);
        //$post->fill($new_data)->save();
        //$request->input('title');
        /*$postModel->title=$request->input('title');
        $postModel->save();*/
        //$input=$request->all();


    }

    public function test($test_unit)
    {
        return view ('post.test', ['input'=>$test_unit]);
    }


}
