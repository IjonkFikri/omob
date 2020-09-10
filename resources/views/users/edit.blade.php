@extends('layouts.app')
@section('title','Edit User')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Edit User</h4>
<form action="{{route('users.update',$users->id)}}" method="post">
        @method('PATCH')
        @csrf
        @include('inc/form/_formUserEdit')
        <input type="submit" value="Simpan" class="btn btn-info text-light float-right">
    </form>
        </div>
</div>
    @endsection