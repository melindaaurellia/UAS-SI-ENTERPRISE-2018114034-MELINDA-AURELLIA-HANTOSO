@extends('layouts.app')

@section('title','Data Absen')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Waktu Absen :{{ $absen['waktu_absen'] }} </h3>
<h3>Mahasiswa :{{ $absen['mahasiswa_id'] }} </h3>
<h3>Matakuliah :{{ $absen['matakuliah_id'] }} </h3>
<h3>keterangan :{{ $absen['keterangan'] }} </h3>
 </div>
</div>
@endsection

    
