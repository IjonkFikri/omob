@extends('layouts.app')
@section('title','Tambah User')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<form action="{{route('users.store')}}" method="post">
    @csrf
    @include('inc/form/_formUserCreate')
    <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ __('Simpan') }}
                </button>
        </div>
</form>
        </div>
</div>  
@endsection
