@extends('layouts.app')

@section('title','semesters')

@section('content')

<form action="/semesters/{{ $semesters['id'] }}" method="POST">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="exampleInputPassword1">Semester</label>
    <input type="text" class="form-control" name="semesters" id="exampleInputPassword1" value="{{old('semesters') ? old('semesters') : $matakuliah['semesters'] }}">
    @error('semesters')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

    
