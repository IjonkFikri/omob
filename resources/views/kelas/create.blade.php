@extends('layouts.app')
@section('title','Tambah Kelas')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Kelas</h4>
<form action="{{route('kelas.store')}}" method="post">
    @csrf
   @include('../inc/form/_formStudentClass')
   <input type="submit" value="Simpan" class="btn btn-info text-light">
</form>
        </div>
</div>
@endsection
