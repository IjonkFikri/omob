@extends('layouts.app')
@section('title','Edit Buku')
@section('content')
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
<h4>Edit Buku</h4>
<form action="{{route('books.update',$books->id)}}" method="post">
        @method('PATCH')
        @csrf
        @include('inc/form/_formBookEdit')
        <input type="submit" value="Simpan" class="btn btn-info text-light float-right">
    </form>
    </div>  
</div>
    @endsection