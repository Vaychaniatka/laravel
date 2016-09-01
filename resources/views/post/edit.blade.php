@extends('layouts.app')

@section('content')
    <h2>Editing:</h2>
    {!! Form::model($posts,['route'=>'post.update']) !!}
    <div class="input-group">
        {!! Form::label('topic_id', 'Topic#'.$posts->id) !!}
        {!! Form::text('id',$posts->id,['hidden'=>'hidden']) !!}
    </div>
    <div class="input-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', $posts->title, ['class'=>'form-control']) !!}
        </div>
    <br>
    <div class="input-group">
        {!! Form::label('slug','Slug:') !!}
        {!! Form::text('slug', $posts->slug, ['class'=>'form-control']) !!}
    </div>
    <br>
    <div class="input-group">
        {!! Form::label('excerpt','Excerpt:') !!}
        {!! Form::textarea('excerpt', $posts->excerpt, ['class'=>'form-control', 'rows'=>'5']) !!}
    </div>
    <br>
    <div class="input-group">
        {!! Form::label('content','Content:') !!}
        {!! Form::textarea('content', $posts->content, ['class'=>'form-control']) !!}
    </div>
    <br>
    <br>

    {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
    {!! Form::close() !!}
    {!! link_to(URL::previous(), 'Go Back', ['class' => 'btn btn-default']) !!}
    @if($posts->published)

    {!! link_to_action('PostController@publishing','Unpublish',$posts->id,['class' =>'btn btn-default']) !!}
    @else
    {!! link_to_action('PostController@publishing','Publish',$posts->id,['class' =>'btn btn-default']) !!}
    @endif
@endsection