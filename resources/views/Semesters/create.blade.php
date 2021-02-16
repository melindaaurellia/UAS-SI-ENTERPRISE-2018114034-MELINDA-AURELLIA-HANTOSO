@extends('layouts.app')

@section('title','semesters')

@section('content')

<form action="/semesters" method="POST">
@csrf
    <label for="exampleInputEmail1">Semester</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="semesters" aria-describedby="emailHelp" value="{{old('semesters')}}">
    @error('semesters')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection

    
