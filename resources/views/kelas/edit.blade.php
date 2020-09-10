@extends('layouts.app')
@section('title','Edit Kelas')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
         <h4>Edit Kelas</h4>
                <form action="{{route('kelas.update',$students->id)}}" method="post">
                @method('PATCH')
                @csrf
                @include('inc/form/_formStudentClassEdit')
                <input type="submit" value="Update" class="btn btn-info text-light">
                </form>
        </div>
</div>
@endsection