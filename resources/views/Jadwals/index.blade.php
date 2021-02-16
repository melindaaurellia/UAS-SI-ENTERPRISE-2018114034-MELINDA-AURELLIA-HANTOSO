@extends('layouts.app')

@section('title','jadwals')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah jadwals
            </button> 
          </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Jadwal</th>
      <th scope="col">Matakuliah</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($jadwals as $jadwal)
  <tr>
    <td>{{$jadwal->jadwal}}</td>
    <td>{{$jadwal->matakuliah_id}}</td>
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
      <form action="/jadwals" method="POST">

          @csrf

          <div class="modal-body">
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Jadwal</label>
            <div class="col-sm-9">
              <select class="form-control" id="jadwals"
                    name="jadwals">
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jumat</option>
          <option value="Sabtu">Sabtu</option>
          </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Semester</label>
            <div class="col-sm-9">
            <select class="form-control" id="semester_id"
                    name="semester_id">
          <option value="ERP Terapan i">ERP Terapan i</option>
          <option value="Rekayasa Perangkkat Lunak">Rekayasa Perangkkat Lunak</option>
          <option value="Integrasi Sistem Enterprise">Integrasi Sistem Enterprise</option>
          <option value="Student Exchange (fotografi)">Student Exchange (fotografi)</option>
          <option value="Manajemen Sistem Informasi">Manajemen Sistem Informasi</option>
          <option value="Student Exchange (Sinematografi)">Student Exchange (Sinematografi)</option>
          <option value="Pemrograman Internet Lanjut">Pemrograman Internet Lanjut</option>
          <option value="Jaringan Komputer">Jaringan Komputer</option>
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
    {{ $jadwals -> links() }}
    </div>
@endsection





    
