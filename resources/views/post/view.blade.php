@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            {!! $posts->title !!}
        </h3>
    </div>
    <div class="panel-body">
        {!! $posts->excerpt !!}

    </div>
        <div class="panel-body">
        {!! $posts->content !!}
        <br>
            @if(isset($post->published_at))
                Published:{!! $post->published_at !!}
            @else
                Unpublished
            @endif
    </div>
    </div>
    {!! link_to(URL::previous(), 'Go Back', ['class' => 'btn btn-default']) !!}

@can('admin')
        {!! link_to_action('PostController@edit','Edit',$posts->id,['class' =>'btn btn-default']) !!}
@endcan
@endsection