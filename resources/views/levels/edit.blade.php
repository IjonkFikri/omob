@extends('layouts.app')
@section('title','Tambah Kelas')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Kelas</h4>
<form action="{{route('levels.update',$levels->id)}}" method="post">
    @method('PATCH')
    @csrf
    @include('inc/form/_formLevelEdit')
    <input type="submit" value="Simpan" class="btn btn-success">
</form>
        </div>
</div>
@endsection