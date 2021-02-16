@extends('layouts.app')

@section('title','Data Semester')

@section('content')
<div class="card">
<div class="cardbody">
<h3>id :{{ $semester['id'] }} </h3>
<h3>semester :{{ $semester['semesters'] }} </h3>
 </div>
</div>
@endsection

    
