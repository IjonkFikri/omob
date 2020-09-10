@extends('layouts.app')
@section('title','Tambah Guru')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
                <h4>Tambah Guru</h4>
                <form action="{{route('teachers.store')}}" method="post">
                    @csrf
                    @include('inc/form/_formTeacherCreate')
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
        </div>
</div>

@endsection
