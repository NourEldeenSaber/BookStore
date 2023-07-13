@extends('layout')
@section('title')
    book {{$category->id}}
@endsection
@section('content')
<h1>Category id : {{$category->id}}</h1>
<h3>{{$category->name}}</h3>
<hr>
<h3>Books:</h3>
<ul>
    @foreach($category->books as $book)
        <li>{{$book->title}}</li>
    @endforeach
</ul>
<a href="{{route('categories.index')}}">back</a>
@endsection
