@extends('layouts.app')

@section('title','Kontraks')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Kontraks
            </button> 
          </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Mahasiswa</th>
      <th scope="col">Semester</th>
    
    </tr>
  </thead>
  <tbody>
  @foreach ($kontraks as $kontrak)
  <tr>
    <td>{{$kontrak->mahasiswa_id}}</td>
    <td>{{$kontrak->semester_id}}</td>
    
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
      <form action="/kontraks" method="POST">

          @csrf

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
            <label for="inputPassword3" class="col-sm-3 col-form-label">Semester</label>
            <div class="col-sm-9">
            <select class="form-control" id="semester_id"
                    name="semester_id">
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
    {{ $kontraks -> links() }}
    </div>
@endsection





    
