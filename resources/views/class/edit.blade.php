@extends('layouts.app')
@section('title','Create Class')
@section('content')
    <h4>Edit Class</h4>
<form action="{{route('class.update',$class->id)}}" method="post">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="my-input">Full Name</label>
        <input id="my-input" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}{{$class->name}}">
            @error('name')
        <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="my-input">Classes</label>
            <input id="my-input" class="form-control @error('kelas') is-invalid @enderror" type="text" name="kelas" value="{{old('kelas') ??  $class->kelas}}">
            @error('kelas')
        <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <input type="submit" value="Update" class="btn btn-info">
    </form>
@endsection