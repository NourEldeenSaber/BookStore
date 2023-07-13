@extends('layout')
@section('title')
    categories create
@endsection

@section('content')


<form method="post" action="{{route('categories.store')}}" >
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="name" value="{{old('name')}}">
    </div>
        <button type="submit"  class="btn btn-primary mb-3">Submit </button>
    </div>
</form>
@endsection
