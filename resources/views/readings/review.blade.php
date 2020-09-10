@extends('layouts.app')
@section('content')
    <h1></h1>
    <form action="savereview" method="post">
        @csrf
        @method('PUT')
        @include('inc/form/_formReview')
        <input type="submit" value="Save Review" class="btn btn-primary">
    </form>
@endsection