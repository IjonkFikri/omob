@extends('layouts.app')
@section('title','Edit Recaps User')
@section('content')
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
        <h4>Edit User Recap</h4>
        <form action="{{route('recaps.update',$recaps->id)}}" method="post">
            @method('PATCH')
            @csrf
            @include('inc/form/_formRecapEdit')
            <input type="submit" value="Simpan" class="btn btn-info text-light float-right">
        </form>
    </div>
</div>
@endsection
