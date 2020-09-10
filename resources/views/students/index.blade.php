@extends('layouts.app')
@section('title','Data Siswa')
@section('content')

<div class="alert alert-info top-border mt-4" role="alert">
    <label class="t-md mt-2">@yield('title')</label><a href="{{route('students.create')}}"
        class="float-right font-weight-bold mt-2"><i class="fas fa-plus-circle text-info"></i> Tambah</a>
</div>
<table class="table table-bordered my-2" id="data">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Unit</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$student->user->nis}}</td>
            <td>{{$student->user->name}}</td>
            <td>{{$student->level->unit->nama_unit}}</td>
            <td>{{$student->level->nama_kelas}}</td>
            <td style="width:12%;">
                <form action="{{route('students.destroy',$student->id)}}" method="post"
                    onsubmit="return confirm('Do you want to delete this user?');">
                    <a href="{{route('students.edit',$student->id)}}" class="btn btn-info"><i class="fas fa-edit text-light"></i></a>
                    @method('DELETE')
                    @csrf
                     <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-light"></i></button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {{$students->links()}} --}}
@endsection
