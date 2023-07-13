@extends('layout')
@section('title')
    book {{$book->id}}
@endsection
@section('content')
<h1>Book id : {{$book->id}}</h1>
<h3>{{$book->title}}</h3>
<P>{{$book->description}}</P>


<h4>category</h4>
<ul>
    @foreach($book->categories as $category)
        <li>{{$category->name}}<li>
    @endforeach
</ul>


<hr>

<a href="{{route('books.index')}}">back</a>
@endsection
