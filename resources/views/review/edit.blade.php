@extends('layouts.app')
@section('title','Edit Review')
@section('content')
<form action="{{route('review.update',$books->books_id)}}" method="post">
@csrf 
@method('PATCH')
@include('inc/form/_formReviewEdit')
<input type="submit" value="Update Review" class="btn btn-primary float-right ">
</form>
@endsection