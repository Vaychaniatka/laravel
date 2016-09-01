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
            @if(isset($post->published_at))
                Published:{!! $post->published_at !!}
            @else
                Unpublished
            @endif
        </div>
    </div>
        @endforeach
    {!! $posts->render() !!}

@endsection