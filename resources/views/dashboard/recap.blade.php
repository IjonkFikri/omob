@extends('layouts.app')
@section('title','Dashboard Recap')
@section('content')
{{-- get data level --}}
@foreach ($recaps as $recap)

<div class="mt-5">
    <div class="my-4 mx-3">
        <strong style="text-transform: capitalize; letter-spacing:1px; color:#535c68; font-size:16px;"> <i
                class="fas fa-tachometer-alt" style="color:#f9ca24;"></i>&nbsp; @yield('title') -
            {{$recap->unit->nama_unit}}</strong>
    </div>

    <div class="row mt-4 text-center m-auto">

        <div class="container">
            <div class="row">
                {{-- action view total halaman buku --}}
                <div class="col-sm card mx-1 my-1">
                    <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-award m-auto mt-4"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9.669.864L8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193l-1.51-.229L8 1.126l-1.355.702-1.51.229-.684 1.365-1.086 1.072L3.614 6l-.25 1.506 1.087 1.072.684 1.365 1.51.229L8 10.874l1.356-.702 1.509-.229.684-1.365 1.086-1.072L12.387 6l.248-1.506-1.086-1.072-.684-1.365z" />
                        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                    </svg>
                    <div class="my-4">
                        <h2>
                            @php
                            // get data siswa berdasarkan unit dan level
                            $data = $levels->where('units_id',$recap->unit->id)->pluck('id');
                            $student = $students->whereIn('kelas_id',$data);
                            // get data buku berdasarkan unit dan level
                            $book = $books->whereIn('kelas_id',$data);
                            @endphp
                            {{$student->count()}}
                            <h2>
                    </div>
                    <p class="title mt-2">Jumlah Siswa</p>
                </div>
                {{-- action view jumlah buku --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-book my-4" style="color:#70a1ff; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            {{$book->count()}}
                            <h2>
                    </div>
                    <p class="title mt-2">Total Buku</p>
                </div>
                {{-- action view total finish --}}
                <div class="col-sm card mx-1 my-1">
                    <i class="fas fa-smile-wink my-4" style="color:#2ed573; font-size: 2.8em;"></i>
                    <div class="my-4">
                        <h2>
                            @if($book->sum('status',1) < 1) 0 @else {{$book->sum('status',1)}} @endif </h2> </div> <p
                                class="title mt-2">Total Finish</p>
                    </div>
                    {{-- total unfinish --}}
                    <div class="col-sm card mx-1 my-1">
                        <i class="fas fa-sad-cry my-4" style="color:#ff4757; font-size: 2.8em;"></i>
                        <div class="my-4">
                            <h2>
                                {{$book->count('judul_buku') - $book->sum('status',1)}}
                            </h2>
                        </div>
                        <p class="title mt-2">Total Unfinish</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="my-2">
        <table class="table table-light">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Jumlah Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($levels->where('units_id',$recap->unit->id) as $value)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->nama_kelas}}</td>
                    <td>
                        @php
                        $student = $students->whereIn('kelas_id',$value->id);
                        @endphp
                        {{$student->count()}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
    @endsection