@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            {!! $posts->title !!}
        </h3>
    </div>
    @can('admin')
            <div class="panel-body">
                {!! $posts->slug !!}

            </div>
        @endcan
        <div class="panel-body">
        {!! $posts->excerpt !!}

    </div>
        <div class="panel-body">
        {!! $posts->content !!}
        <br>
            @if(isset($posts->published_at))
                Published:{!! $posts->published_at !!}
            @else
                Unpublished
            @endif
    </div>
    </div>
    {!! link_to(URL::previous(), 'Go Back', ['class' => 'btn btn-default']) !!}

@can('admin')
        {!! link_to_action('PostController@edit','Edit',$posts->id,['class' =>'btn btn-default']) !!}
        {!! link_to_action('PostController@delete','Delete',$posts->id,['class' =>'btn btn-default']) !!}
        @if($posts->published)

            {!! link_to_action('PostController@publishing','Unpublish',$posts->id,['class' =>'btn btn-default']) !!}
        @else
            {!! link_to_action('PostController@publishing','Publish',$posts->id,['class' =>'btn btn-default']) !!}
        @endif
@endcan
@endsection