

@extends('layouts.app')

@section('content')
    <div class="container"> 
        <h3>Edit Category</h3><br>
        {!!Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Category Name'])}}
            </div>

            <div class="form-group">
                {{Form::label ('description', 'Description')}}
                {{Form::textarea('description', $category->description, ['placeholder' => 'Category Description', 'class' => 'form-control'])}}
            </div>

            {{Form::hidden('_method', 'PUT')}}

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}
    </div>
@endsection