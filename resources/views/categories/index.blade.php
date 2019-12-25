@extends('layouts.app')

@section('content')
    <p>Categories</p> 

    @foreach($categories as $category)
        <ul>
            <li><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
        </ul>
        @endforeach
        
@endsection