@extends('layouts.app')

@section('title','semesters')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Semester
            </button> 
          </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Semester</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($semesters as $semester)
  <tr>
    <td>{{$semester->id}}</td>
    <td>{{$semester->semester}}</td>
    <td><a href="/semesters/{{$semester->id}}/edit"><button type="button" class="btn btn-outline-primary">Edit</a></button></td>
    <form action="/semesters/{{ $semester->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-danger">Delete</button></td>
    </form>
    @endforeach
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/matakuliahs" method="POST">

          @csrf

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">ID</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Semester</label>
            <div class="col-sm-9">
            <select class="form-control" id="semester"
                    name="semester">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          </select>
            </div>
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Input</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div>
    {{ $semesters -> links() }}
    </div>
@endsection





    
