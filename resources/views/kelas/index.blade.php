@extends('layouts.app')
@section('title','Data Kelas')
@section('content')
<div class="alert alert-info top-border mt-4" role="alert">
        <label class="t-md mt-2">@yield('title')</label><a href="{{route('kelas.create')}}"
            class="float-right font-weight-bold mt-2"><i class="fas fa-plus-circle text-info"></i> Tambah</a>
    </div>
   <table class="table table-bordered " id="data">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Unit Sekolah</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($students as $kelasSiswa)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kelasSiswa->nama_unit}}</td>
                <td>{{$kelasSiswa->nama_kelas}}</td>
                <td style="width:12%;">
                <form action="{{route('kelas.destroy',$kelasSiswa->id)}}" method="post" onsubmit="return confirm('Do you want to delete this user?');">
                <a href="{{route('kelas.edit',$kelasSiswa->id)}}" class="btn btn-info"><i class="fas fa-edit text-light"></i></a>
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-light"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$students->links()}}
@endsection