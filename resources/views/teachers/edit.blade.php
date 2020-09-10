@extends('layouts.app')
@section('title','Edit Guru')
@section('content')
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
<h4>Edit Data</h4>
<form action="{{route('teachers.update',$teachers->id)}}" method="post">
    @csrf
    @method('PUT')
        @include('inc/form/_formTeacherEdit')
        <input type="submit" value="Update Guru" class="btn btn-primary">
</form>
    </div>
</div>
@endsection