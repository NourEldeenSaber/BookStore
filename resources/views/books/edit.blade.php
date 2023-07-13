@extends('layout')
@section('title')
    Edit Book {{$book->id}}
@endsection

@section('content')
    @include('inc.errors')

    <form method="post" action="{{route('books.update',$book->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="title" value="{{ old('title') ?? $book->title}}" >
        </div>
        <div class="form-group">
            <textarea type="text" name="description" class="form-control" placeholder="description" rows="3">{{ old('description') ??  $book->description}}</textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="col-auto">
            <button type="submit"  class="btn btn-primary mb-3">update </button>
        </div>
    </form>
@endsection
