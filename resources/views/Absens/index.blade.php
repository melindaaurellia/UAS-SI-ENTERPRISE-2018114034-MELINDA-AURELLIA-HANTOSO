@extends('layouts.app')

@section('title','Absens')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Absen
            </button> 
          </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Waktu Absen</th>
      <th scope="col">Mahasiswa</th>
      <th scope="col">Matakuliah</th>
      <th scope="col">Keterangan</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach ($absens as $absen)
  <tr>
    <td>{{$absen->waktu_absen}}</td>
    <td>{{$absen->mahasiswa_id}}</td>
    <td>{{$absen->matakuliah_id}}</td>
    <td>{{$absen->keterangan}}</td>
    
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
      <form action="/absens" method="POST">

          @csrf

          <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Waktu Absen</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="waktu_absen" name="waktu_absen">
            </div>
          </div>

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Mahasiswa</label>
            <div class="col-sm-9">
              <select class="form-control" id="mahasiswa_id"
                    name="mahasiswa_id">
          <option value="Moch. Nurhidayat Sastra">Moch. Nurhidayat Sastra</option>
          <option value="Jody Ariel Permana">Jody Ariel Permana</option>
          <option value="Andy Setiawan">Andy Setiawan</option>
          <option value="Geofani Harvey Gunawan">Geofani Harvey Gunawan</option>
          <option value="Regia Marcelina">Regia Marcelina</option>
          <option value="Hany Dwi Agustanti">Hany Dwi Agustanti</option>
          <option value="Nurul Hikmah Muslimah">Nurul Hikmah Muslimah</option>
          <option value="Indah Nurulaeni">Indah Nurulaeni</option>
          <option value="Indah Ali">Indah Ali</option>
          <option value="Melinda Aurellia Hantoso">Melinda Aurellia Hantoso</option>
          <option value="Pinke Mitha Ekasari">Pinke Mitha Ekasari</option>
          <option value="Pricilya Christina D">Pricilya Christina D</option>
          <option value="Federico Nababan">Federico Nababan</option>
          <option value="Rizka Yulianti">Rizka Yulianti</option>
          <option value="Sandra Fahrina">Sandra Fahrina</option>
          <option value="Fransiska Fedelina C">Fransiska Fedelina C</option>
          <option value="Wulan Pratami A">Wulan Pratami A</option>
          <option value="Ricky Pardoman H">Ricky Pardoman H</option>
          <option value="Jessica Kristianti H">Jessica Kristianti H</option>
          </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Matakuliah</label>
            <div class="col-sm-9">
            <select class="form-control" id="matakuliah_id"
                    name="matakuliah_id">
          <option value="ERP Terapan I">ERP Terapan I</option>
          <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
          <option value="Integasi Sistem Enterprise">Integasi Sistem Enterprise</option>
          <option value="Student Exchange (Fotografi)">Student Exchange (Fotografi)</option>
          <option value="Manajemen Sistem Informasi">Manajemen Sistem Informasi</option>
          <option value="Student Exchange (Sinematografi)">Student Exchange (Sinematografi)</option>
          <option value="Pemrograman Internet Lanjut">Pemrograman Internet Lanjut</option>
          <option value="Jaringan Komputer">Jaringan Komputer</option>
          </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
            <select class="form-control" id="keterangan"
                    name="keterangan">
          <option value="HADIR">HADIR</option>
          <option value="TIDAK HADIR">TIDAK HADIR</option>
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
{{ $absens -> links() }}

    </div>
@endsection





    
