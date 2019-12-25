@extends('layouts.app')

@section('content')
    <div class="container"> 
        <h3>Upload Post</h3><br>
        {!!Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Post Name'])}}
            </div>

            <div class="form-group">
                {{Form::label ('content', 'Content')}}
                {{Form::textarea('content', '', ['placeholder' => 'Post Content', 'class' => 'form-control'])}}
            </div>

            {{Form::hidden('category_id', $category_id)}}

            {{Form::file('file')}}  <br><br>

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}
    </div>
@endsection