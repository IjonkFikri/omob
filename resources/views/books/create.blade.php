@extends('layouts.app')
@section('title','Tambah Buku')
@section('content')
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
            <h4>Tambah Buku</h4>
            <form action="{{route('books.store')}}" method="post" class="mt-4">
                @csrf
                @include('inc/form/_formBookCreate')
                <input type="submit" value="Simpan" class="btn btn-primary float-right">
            </form>
    </div>
    
</div>
@endsection
