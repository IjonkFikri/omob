@extends('layouts.app')
@section('title','Dashboard Guru')
@section('content')
{{-- get data level --}}
@foreach ($teachers as $teacher)
@php
$book = $books->where('kelas_id',$teacher->kelas_id);
$student = $students->where('kelas_id',$teacher->kelas_id);
@endphp
@endforeach
<div class="mt-5">
    <div class="my-4 mx-3">
        <strong style="text-transform: capitalize; letter-spacing:1px; color:#535c68; font-size:16px;"> <i
                class="fas fa-tachometer-alt" style="color:#f9ca24;"></i>&nbsp; @yield('title')</strong>
    </div>

    <div class="row mt-4 text-center m-auto">

        <div class="container">
            <div class="row">
                {{-- action view total halaman buku --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-users my-4" style="color:#f9ca24; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2> {{$student->count()}}<h2>
                    </div>
                    <p class="title mt-2">Jumlah Siswa</p>
                </div>
                {{-- action view jumlah buku --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book my-4" style="color:#70a1ff; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2> {{$book->count()}} <h2>
                    </div>
                    <p class="title mt-2">Total Buku</p>
                </div>
                {{-- action view total finish --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-smile-wink my-4" style="color:#2ed573; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            @php $cReview = $review->whereIn('books_id',$book->pluck('id')) @endphp
                            {{ $cReview->count('books_id') }}
                        </h2> 
                    </div> 
                    <p
                                class="title mt-2">Total Finish</p>
                    </div>
                    {{-- total unfinish --}}
                    <div class="col-sm card mx-1 my-1">
                        <i class="fas fa-sad-cry my-4" style="color:#ff4757; font-size: 2.8em;"></i>
                        <div class="my-4">
                            <h2>
                                {{ $book->count('judul_buku') - $cReview->count('books_id') }}
                            </h2>
                        </div>
                        <p class="title mt-2">Total Unfinish</p>
                    </div>
                </div>
            </div>
            @endsection
