@extends('layout')
@section('title')
  Register
@endsection

@section('content')

    @include('inc.errors')

    <form method="post" action="{{route('auth.handleDoctorRegister')}}" >
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password" value="{{old('password')}}">
        </div>

        <div class="col-auto">
            <button type="submit"  class="btn btn-primary mb-3">Submit </button>
        </div>
    </form>


@endsection
