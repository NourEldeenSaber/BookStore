@extends('layout')
@section('title')
    Books create
@endsection

@section('content')

@include('inc.errors')

<form method="post" action="{{route('books.store')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <textarea type="text" name="description" class="form-control" placeholder="description" rows="3">{{old('description')}}</textarea>
    </div>
    <div class="form-group">
        <input type="file" class="form-control-file" name="image">
    </div>

    <h6>Select Categories:</h6>
   @foreach($categories as $category)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{$category->id}}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                {{$category->name}}
            </label>
        </div>
    @endforeach
<br>

    <div class="col-auto">
        <button type="submit"  class="btn btn-primary mb-3">Submit </button>
    </div>
</form>


@endsection
