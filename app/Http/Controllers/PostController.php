<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use Carbon\Carbon;

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
        //$user=\Auth::user();
        $posts=$postModel->find($id);
        //if($this->authorize('admin',$user))
       //{
            $data['viewed']=true;
            $posts->fill($data)->save();
            //return view('post.view', ['posts'=>$posts]);
       // }


        //$posts =  $postModel->where('id',$id)->first();
        //$posts = $postModel->find($id);
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

    public function delete(Post $postModel, $id)
    {
        $this->authorize('admin', \Auth::user());

        $postModel->where('id',$id)->delete();
        return redirect('/post');
    }

    public function create()
    {
        return view('post.add');

    }

    public function update(Post $postModel, Request $request)
    {
        $this->authorize('admin', \Auth::user());


        $new_data=$request->all();
        $id = $new_data['id'];
        $post = $postModel->find($id);
        $post->fill($new_data)->save();
        return redirect('/post');

    }

    public function publishing($id, Post $postModel)
    {
        $post=$postModel->find($id);
        $state=$post->published;
        if ($state)
       {
           $data['published']=false;
           $data['published_at']=NULL;
           $post->fill($data)->save();
       }else
        {
            $data['published']=true;
            $data['published_at']=Carbon::now();
            $post->fill($data)->save();
        }
        return redirect('/post');
    }

    public function setViewed()
    {

    }


}
