@extends('layouts.app')

@section('content')
    <div class="container"> 
        <h3>Edit Post</h3><br>
        {!!Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('name', $post->name, ['class' => 'form-control', 'placeholder' => 'Post Name'])}}
            </div>

            <div class="form-group">
                {{Form::label ('content', 'Content')}}
                {{Form::textarea('content', $post->content, ['placeholder' => 'Post Content', 'class' => 'form-control'])}}
            </div>

            {{Form::hidden('category_id', $post->category_id)}}

            {{Form::file('file')}}  <br><br>

            {{Form::hidden('_method', 'PUT')}}

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}
    </div>
@endsection






            

 

    








