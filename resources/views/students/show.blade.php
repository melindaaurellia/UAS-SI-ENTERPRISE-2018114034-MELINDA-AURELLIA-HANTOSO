@extends('layouts.app')

@section('title','Data Students')

@section('content')
<div class="card">
<div class="cardbody">
    
    <h3>nama_mahasiswa :{{ $student['nama_mahasiswa'] }} </h3>
    <h3>Alamat teman :{{ $student['alamat'] }} </h3>
    <h3>no_tlp:{{ $student['no_tlp'] }} </h3>
    <h3>email :{{ $student['email'] }} </h3>

 </div>
</div>

@endsection