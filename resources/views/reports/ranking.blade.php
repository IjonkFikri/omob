@extends('layouts.app')
@section('title','Rekap Rangking')
@section('content')
{{-- @foreach ($teachers as $teacher) --}}
<div class="alert alert-info top-border mt-4" role="alert">
    <div class="row">
        <div class="float-left col-10">
            {{-- <span class="alert-link text-info title mr-4">Rekap Data Siswa {{$teacher->level->nama_kelas}} </span>
            --}}
            <i class="fas fa-info-circle mr-2"></i>
            <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#" class="alert-link ml-2">THB</a>
            <small>Total Halaman Buku</small> <a href="#" class="alert-link ml-2">TRB</a> <small>Total Riwayat
                Bacaan</small>
        </div>
        <div class="float-right col-2"> <a
                href="@if(Auth::user()->role == 1){{url('adminrecap')}} @elseif(Auth::user()->role ==4 ){{url('recap')}}@else{{ url('reports') }} @endif"
                class="card-link font-weight-bold "><i class="fas fa-arrow-circle-left"></i> Kembali</a></div>
    </div>

</div>
{{-- @endforeach --}}
<table class="table table-striped table-responsive" id="data">
    <thead>
        <tr>
            <th>#</th>
            <th style="width:15%">Nis</th>
            <th style="width:40%">Nama</th>
            <th style="width:10%">Kelas</th>
            <th style="width:5%" class="text-center">JB</th>
            <th style="width:5%" class="text-center">THB</th>
            <th style="width:5%" class="text-center">RB</th>
            <th style="width:5%" class="text-center">Finish</th>
            <th style="width:5%" class="text-center">UnFinish</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        @php
        $reading = $readings->where('users_id',$student->users_id);
        $book = $books->where('users_id',$student->users_id)->get();
        @endphp
        <tr>
            <td class="title">{{$loop->iteration}}</td>
            <td class="title">{{$student->nis}}</td>
            <td>{{$student->name}}</td>
            <td class="title">{{$student->nama_kelas}}</td>
            <td class="text-center">
                <span class=" title font-weight-bold">
                    {{$book->count('books_id')}}
                </span>
            </td>
            <td class="title text-center">
                {{-- {{$book->sum('jumlah_halaman')}} --}}
            </td>
            <td class="title text-center">
                {{-- {{$reading->sum('total_baca')}} --}}
            </td>
            <td class="td1 title text-center">
                {{-- @if($review->where('books_id',$book->pluck('id'))->isEmpty()) 
                0
                @else
                {{$books->sum('status',1)}} --}}
                {{-- {{$review->whereIn('books_id',$book->pluck('id'))->count()}} --}}
                {{-- @endif --}}
            </td>
            <td class="td1 title text-center">
                {{-- {{$book->count('books_id') - $review->whereIn('books_id',$book->pluck('id'))->count()}} --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {{$readings->links()}} --}}
@endsection