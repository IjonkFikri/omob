@extends('layouts.app')
@section('title','Tambah Siswa')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
        <h4>Tambah Siswa</h4>
        <form action="{{route('students.store')}}" method="post">
            @csrf
            @include('inc/form/_formStudentCreate')
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-success">
            </div>
        </form>
        </div>
</div>
@endsection
