@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <h1>{{$category->name}}</h1>
            <p>{{$category->description}}</p>
            <a href="/" class="button secondary">Go Back</a>
        <a href="/posts/create/{{$category->id}}" class="button">Upload Post To Category</a>
        </div>

        <div class="col-lg-4 col-md-4">
        </div>

        <div class="col-lg-4 col-md-4">
        
        {!!Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::SUBMIT('Delete category', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
            <br>
        <a href="/categories/{{$category->id}}/edit" class="btn btn-secondary">Edit category</a>
        </div>
    </div>
</div>

<hr>

@if(count($category->posts) > 0)
        @foreach($category->posts as $post)
        <ul>
        <li> <a href="/posts/{{$post->id}}">{{$post->name}}</a></li>
        </ul>
        @endforeach
    @else 
        <p>No posts to display</p>
    @endif

 
@endsection