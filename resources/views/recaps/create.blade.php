@extends('layouts.app')
@section('title','Tambah Siswa')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
        <h4>Tambah Recap User</h4>
        <form action="{{route('recaps.store')}}" method="post">
            @csrf
            @include('inc/form/_formRecapCreate')
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-info text-light float-right">
            </div>
        </form>
        </div>
</div>
@endsection
