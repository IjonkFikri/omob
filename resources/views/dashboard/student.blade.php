@extends('layouts.app')
@section('title','Dashboard Siswa')
@section('content')
{{-- apabila belum input data isStudent --}}
@if ($students->count() == 0)
<div class="mt-5">

    <div class="card m-auto" style="width:20rem;">
        <form action="/tambahkelas" method="post" class="my-4 mx-4">
            <h6 class="my-3 title">Tingkatan Kelas</h6>
            @method('POST')
            @csrf
            @include('inc/form/_formStudentCreateLevel')
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </div>
        </form>
    </div>
</div>
@else
<div class="mt-5">
    <div class="my-4 mx-3">
        <strong style="text-transform: capitalize; letter-spacing:1px; color:#535c68; font-size:16px;"> <i
                class="fas fa-tachometer-alt" style="color:#f9ca24;"></i>&nbsp;Dashboard Siswa</strong>
    </div>
    <div class="row mt-4 text-center m-auto">
        <div class="container">
            <div class="row d-flex">
                {{-- action view jumlah buku --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book my-4" style="color:#70a1ff; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2> {{$books->count()}} <h2>
                    </div>
                    <p class="title mt-4">Total Buku</p>

                </div>

                {{-- action view total halaman buku --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book-reader mt-4" style="color:#f9ca24; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <div class="input-group">
                            <div class="alert alert-info top-border mr-2 ml-4">
                                <label>Sudah</label>
                                <h4>{{$readings->sum('total_baca')}}</h4>
                            </div>

                            <div class="alert alert-info top-border">
                                <label for="">Belum</label>
                                <h4> {{$books->sum('jumlah_halaman') - $readings->sum('total_baca')}} </h4>
                            </div>
                        </div>
                    </div>
                    <p class="title" style="margin-top:-6%;">Total Halaman</p>

                </div>

                {{-- action view total finish --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-smile-wink my-4" style="color:#2ed573; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            {{-- @if(($books->sum('status',1) < 1) && ($review->where('books_id',$books->id)->count()== 0)) 0 --}}
                            @if($review->isEmpty())
                            0
                            @else
                            {{-- {{$books->sum('status',1)}} --}}
                            {{$review->whereIn('books_id',$books->pluck('id'))->count()}}
                            @endif
                        </h2>
                    </div>
                    <p class="title mt-4">Total Finish</p>

                </div>
                {{-- total unfinish --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-sad-cry my-4" style="color:#ff4757; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            {{($books->count('jumlah_buku') )- ($review->whereIn('books_id',$books->pluck('id'))->count())}}
                        </h2>
                    </div>
                    <p class="title mt-4">Total Unfinish</p>
                    {{-- <div class="card border-2 shadow-sm border-secondary" style="top:4%;">Lorem, ipsum dolor sit amet consectetur adipisicing elit</div> --}}
                </div>
            </div>
            <div class="row d-block">
                <ul class="list-group">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center bg-light shadow-sm my-3">
                        <small class="btn-text"><i class="fas fa-tags text-secondary"></i>&nbsp;Review Buku
                            Bacaan</small>
                        <span class="text-black-50 btn-text mr-3">Status</span>
                    </li>
                    <div class="scroll p-2">
                        @foreach ($books as $book)
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center mt-1 shadow-sm border-0">
                            {{$book->judul_buku}} &nbsp;
                            @if($review->where('books_id',$book->id)->isEmpty())
                            <span class="badge badge-soft-danger p-1 shadow-sm">Belum</span>
                            @else
                            <div class="float-right">
                                <span class="badge badge-soft-success p-1 shadow-sm">Sudah</span>
                                <!-- Button trigger modal -->
                                <a href="{{route('review.edit',$book->id)}}" class="btn btn-link">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                            </div>


                            @endif
                        </li>
                        @endforeach
                    </div>
                </ul>
            </div>

        </div>


    </div>
    @endif
    @endsection