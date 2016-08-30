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
        <br>
        Published:{!! $posts->published_at !!}
    </div>
        <div class="panel-body">
        {!! $posts->content !!}
        <br>
    </div>
    </div>
    {!! link_to(URL::previous(), 'Go Back', ['class' => 'btn btn-default']) !!}


        {!! link_to_action('PostController@edit','Edit',$posts->id,['class' =>'btn btn-default']) !!}

@endsection