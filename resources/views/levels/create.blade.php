@extends('layouts.app')
@section('title','Tambah Kelas')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Kelas</h4>
<form action="{{route('reports.export_excel')}}" method="post">
    @csrf
   
</form>
        </div>
</div>
@endsection
