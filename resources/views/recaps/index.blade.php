@extends('layouts.app')
@section('title','Data User Recap')
@section('content')

<div class="alert alert-info top-border mt-4" role="alert">
    <label class="t-md mt-2">@yield('title')</label><a href="{{route('recaps.create')}}"
        class="float-right font-weight-bold mt-2"><i class="fas fa-plus-circle text-info"></i> Tambah</a>
</div>
<table class="table table-striped my-2 " id="data">
    <thead class="thead-light">
        <tr>
            <th style="width:5%;">#</th>
            <th style="width:15%;">Nis Siswa</th>
            <th style="width:60%;">Nama</th>
            <th>Unit</th>
            <th style="width:30%;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recaps as $recap)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$recap->user->nis}}</td>
            <td>{{$recap->user->name}}</td>
            <td>{{$recap->unit->nama_unit}}</td>
            <td style="width:12%;">
                <form action="{{route('recaps.destroy',$recap->id)}}" method="post"
                    onsubmit="return confirm('Do you want to delete this user?');">
                    <a href="{{route('recaps.edit',$recap->id)}}" class="btn btn-info"><i
                            class="fas fa-edit text-light"></i></a>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-light"></i></button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
{{$recaps->links()}}
@endsection