@extends('layouts.app')

@section('title','Data Jadwal')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Jadwal :{{ $jadwal['jadwal'] }} </h3>
<h3>Matakuliah :{{ $jadwal['matakuliah_id'] }} </h3>
 </div>
</div>
@endsection

    
