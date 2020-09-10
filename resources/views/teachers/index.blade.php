@extends('layouts.app')
@section('title','Data Guru')
@section('content')
<div class="alert alert-info top-border mt-4" role="alert">
    <label class="t-md mt-2">@yield('title')</label><a href="{{route('teachers.create')}}"
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
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$teacher->user->nis}}</td>
            <td>{{$teacher->user->name}}</td>
            <td>{{$teacher->level->unit->nama_unit}}</td>
            <td>{{$teacher->level->nama_kelas}}</td>
            <td style="width:12%;">
                <form action="{{route('teachers.destroy',$teacher->id)}}" method="post"
                    onsubmit="return confirm('Do you want to delete this user?');">
                    <a href="{{route('teachers.edit',$teacher->id)}}" class="btn btn-info"><i class="fas fa-edit text-light"></i></a>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-light"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$teachers->links()}}
@endsection
