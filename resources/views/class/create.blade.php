@extends('layouts.app')
@section('title','Create Class')
@section('content')
    <h4>Create New Class</h4>
<form action="{{route('class.store')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="my-input">Full Name</label>
            <input id="my-input" class="form-control @error('name') is-invalid @enderror" type="text" name="name">
            @error('name')
        <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="my-input">Classes</label>
            <input id="my-input" class="form-control @error('kelas') is-invalid @enderror" type="text" name="kelas">
            @error('kelas')
        <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <input type="submit" value="Save" class="btn btn-info">
    </form>
@endsection