@extends('layouts.app')

@section('title','matakuliah')

@section('content')

<form action="/matakuliah/{{ $matakuliah['id'] }}" method="POST">
@csrf
@method('PUT')

  <div class="form-group">
    <label for="exampleInputEmail1">Nama Matakuliah</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_matakuliah" aria-describedby="emailHelp" value="{{old('nama_matakuliah') ? old('nama_matakuliah') : $matakuliah['nama_matakuliah'] }}">
    @error('nama_matakuliah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">SKS</label>
    <input type="text" class="form-control" name="sks" id="exampleInputPassword1" value="{{old('sks') ? old('sks') : $matakuliah['sks'] }}">
    @error('sks')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

    
