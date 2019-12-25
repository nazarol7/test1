@extends('layouts.app')

@section('content')
    <div class="container"> 
        <h3>Create Category</h3><br>
        {!!Form::open(['action' => 'CategoriesController@store', 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Category Name'])}}
            </div>

            <div class="form-group">
                {{Form::label ('description', 'Description')}}
                {{Form::textarea('description', '', ['placeholder' => 'Category Description', 'class' => 'form-control'])}}
            </div>

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}
    </div>
@endsection