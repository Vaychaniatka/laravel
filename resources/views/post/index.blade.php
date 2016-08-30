@extends('layouts.app')

@section('content')

    @foreach ($posts as $post)
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                {!! link_to_action('PostController@show',$post->title,['id'=>$post->id]) !!}
            </h3>
        </div>
        <div class="panel-body">
            {!! $post->excerpt !!}
            <br>
            Published:{!! $post->published_at !!}
        </div>
    </div>
        @endforeach
    {!! $posts->render() !!}

@endsection