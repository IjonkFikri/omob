@extends('layouts.app')
@section('title','Data Buku')
@section('content')
<h4>Data Buku</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <i class="fas fa-info-circle mr-2"></i>
    <a href="#" class="alert-link">JB</a> <small>Judul Buku</small>
    <a href="{{route('books.create')}}" class="card-link  float-right font-weight-bold"><i
            class="fas fa-plus-circle text-info"></i> Tambah Buku</a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th class="td1">#</th>
            <th style="width:9em;">Kelas</th>
            <th><i class="fas fa-bookmark "></i> Judul Buku</th>
            <th class="td1">JHB</th>
            <th class="td1">Status</th>
            <th style="width:6rem;"><i class="fas fa-tools "></i> Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td class="title">{{$book->level->nama_kelas}}</td>
            <td class="text-judul">{{$book->judul_buku}}</td>
            <td class="title">{{$book->jumlah_halaman}}</td>
            <td>
                @php $readings = App\Reading::where('books_id',$book->id)->get(); @endphp
                @if($readings->sum('total_baca') == $book->jumlah_halaman)
                <span class="badge badge-soft-success">Finish</span>
                @else
                <span class="badge badge-soft-danger">Unfinish</span>
                @endif
            </td>
            <td>
                {{-- <form action="{{route('books.destroy',$book->id)}}" method="post"
                onsubmit="return confirm('Do you want to delete this user?');"> --}}
                <a href="{{route('books.edit',$book->id)}}" class="btn-text"><i class="fas fa-pencil-alt text-info"></i>
                    Edit</a>
                {{-- @method('DELETE')
                    @csrf
                    <button type="submit" class=" btn btn-link btn-text"> <i class="fas fa-trash-alt text-danger"></i>
                        Delete</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection