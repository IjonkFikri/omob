@extends('layouts.app')
@section('title','Edit Siswa')
@section('content')
<h4>Edit Siswa</h4>
<form action="{{route('students.update',$students->id)}}" method="post">
    @csrf
    @method('PUT')
        @include('inc/form/_formStudentEdit')
        <input type="submit" value="Update Siswa" class="btn btn-primary">
</form>
@endsection