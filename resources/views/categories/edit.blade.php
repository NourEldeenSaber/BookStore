@extends('layout')
@section('title')
    Edit categories {{$category->id}}
@endsection

@section('content')
    <form method="post" action="{{route('categories.update',$category->id)}}">
        @csrf
        @method('put')
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') ?? $category->name}}" >
        </div>
        <div class="col-auto">
            <button type="submit"  class="btn btn-primary mb-3">update </button>
        </div>
    </form>
@endsection
