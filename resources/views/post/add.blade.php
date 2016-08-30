@extends('layouts.app')

@section('content')
    <h2>Add new post:</h2>
    {!! Form::open(['route'=>'post.store']) !!}
    <div class="input-group">
        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title']) !!}
    </div>
    <br>
    <br>
    <div class="input-group">
        {!! Form::textarea('excerpt', null, ['class'=>'form-control', 'placeholder'=>'Excerpt', 'rows'=>'5']) !!}
    </div>
    <br>
    <br>
    <div class="input-group">
        {!! Form::textarea('content', null, ['class'=>'form-control', 'placeholder'=>'Content']) !!}
    </div>
    <br>
    <br>
    {!! Form::submit('Create',['class'=>'btn btn-default']) !!}
    {!! Form::close() !!}
@endsection