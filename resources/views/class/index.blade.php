@extends('layouts.app')
@section('title','Class Data')
@section('content')

<div class="alert alert-light shadow-sm" role="alert">
    <h4>Class Data <a href="{{route('class.create')}}" class="float-right btn btn-info text-decoration-none shadow-sm">Add</a></h4>
  </div>


<div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endif

  @if ($message = Session::get('error'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Class</td>
            <td>Action</td>
        </tr>
    </tr>
    </thead>
    <tbody>
        {{-- data class  --}}
        @foreach ($class as $clas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$clas->name}}</td>
            <td>{{$clas->kelas}}</td>
            <td>
            <form action="{{route('class.destroy',$clas->id)}}" method="post" onSubmit="return confirm('yakin !');">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('class.edit',$clas->id)}}" class="btn btn-info">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
        {{-- --  --}}
    </tbody>
</table>
@endsection