@extends('layout')
@section('title')
    All Categories
@endsection


@section('content')
    <h1>All Categories</h1>

    <a class="btn btn-primary" href="{{route('categories.create')}}">create</a>

    @foreach($categories as $category)
        <hr>
        <a href="{{route('categories.show',$category->id)}}">
            <h3>{{$category->name}}</h3>
        </a>


        <a class="btn btn-primary" href="{{route('categories.show',$category->id)}}">show</a>
        <a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}">edit</a>
        <a class="btn btn-danger" href="{{route('categories.delete',$category->id)}}">delete</a>

    @endforeach
    {{$categories->render()}}
@endsection
