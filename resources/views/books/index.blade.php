@extends('layout')
@section('title')
    All books
@endsection


@section('content')
    <h3>Your notes</h3>
    @auth
        @foreach(Auth::user()->notes as $note)
            <p> {{$note->content}} </p>
        @endforeach
        <a href="{{route('notes.create')}}" class="btn btn-info">Add new note</a>
    @endauth



<h1>All Books</h1>

<a class="btn btn-primary" href="{{route('books.create')}}">create</a>

@foreach($books as $book)
    <hr>
  <a href="{{route('books.show',$book->id)}}">
      <h3>{{$book->title}}</h3>
  </a>
    <p>{{$book->description}} </p>

    <a class="btn btn-primary" href="{{route('books.show',$book->id)}}">show</a>
    <a class="btn btn-primary" href="{{route('books.edit',$book->id)}}">edit</a>
    @auth
         @if(Auth::user()->is_admin ==1)
            <a class="btn btn-danger" href="{{route('books.delete',$book->id)}}">delete</a>
        @endif
    @endauth

@endforeach
{{$books->render()}}
@endsection
