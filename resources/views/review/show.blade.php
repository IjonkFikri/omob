@extends('layouts.app')
@section('title','Resensi Buku')
@section('content')
<div class="container">
    <div class="card p-4">
    <h4>Review Buku {{$users->name}}</h4>
    @foreach ($books as $data)
        <div class="form-group mt-2">
            <h5 class="text-black-50">Data Buku</h5>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tempat Terbit</th>
                        <th style="width: 5%;">Halaman</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{$data->judul_buku}}</td>
                    <td>{{$data->penulis}}</td>
                        <td >{{$data->penerbit}}</td>
                        <td>{{$data->tempat_terbit}}</td>
                        <td>{{$data->jumlah_halaman}}</td>
                    <td>
                       
                        @if ($reviews->count('books_id') > 0)
                        <span class="badge badge-pill badge-success">Sudah</span>
                        @else 
                        <span class="badge badge-pill badge-danger">Belum</span>
                        @endif

                    </td>
                    </tr>
                </tbody>
            </table>
            @foreach ($reviews->where('books_id',$data->id) as $review)
            <label for="">Sinopsis</label>
             <p>{{$review->sinopsis}}</p>
            <label for="">Kelebihan</label>
             <p>{{$review->kelebihan}}</p>
            <label for="">Kekurangan</label>
             <p>{{$review->kekurangan}}</p>
             <label for="">Kesimpulan</label>
             <p>{{$review->kesimpulan}}</p>
             @endforeach
        <a href="{{route('review.print',$data->id)}}" class="btn btn-link btn-txt float-right text-decoration-none"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
       <hr>
    @endforeach
    </div>
    {{ $books->links() }}
</div>
@endsection