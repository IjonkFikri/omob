@extends('layouts.app')
@section('title','Detail Data')
@section('content')
@foreach ($students as $student)
<h4><span class="alert-link text-info">Detail Data Riwayat</span> {{$student->user->name}}</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <label for="" class="alert-link  mr-2">{{$student->level->nama_kelas}}</label>
    <i class="fas fa-info-circle mr-2"></i>
    <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#" class="alert-link ml-2">THB</a>
    <small>Total Halaman Baca</small> <a href="#" class="alert-link ml-2">RB</a> <small>Riwayat Bacaan</small>
    <a href="{{url('reports')}}" class="card-link float-right font-weight-bold "><i
            class="fas fa-arrow-circle-left"></i> Kembali</a>
</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            {{-- <th>Kelas</th> --}}
            <th> <i class="fas fa-bookmark "></i> Judul Buku</th>
            <th>JB</th>
            <th>RB</th>
            <th><i class="fas fa-percentage text-center"></i></th>
            <th>Status</th>
            {{-- <th><i class="fas fa-tools text-secondary"></i> Action</th> --}}
        </tr>
    </thead>
    <tbody>
    <tbody>

        @foreach ($books as $book)
        @php $readings = App\Reading::where('books_id',$book->id)->get(); @endphp
        <tr>
            <td class="td1">{{$loop->iteration}}</td>
            {{-- <td>{{$book->level->nama_kelas}}</td> --}}
            <td>
                <label for="" class="title">{{$book->judul_buku}}</label>

                <ul class="list-group">
                    @foreach ($readings as $reading)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ \Carbon\Carbon::parse($reading->created_at)->format('d F Y')}}
                        <span class="badge badge-primary badge-pill">{{$reading->start}} - {{$reading->end}}</span>
                    </li>
                    @endforeach
                </ul>
            </td>
            <td class="td1">{{$book->jumlah_halaman}}</td>
            <td class="td1">
                {{$readings->sum('total_baca')}}
            </td>
            <td class="td1">
                {{round(($readings->sum('total_baca')/$book->jumlah_halaman)*100)}}
            </td>
            <td class="td1">
                @if($readings->sum('total_baca') == $book->jumlah_halaman)
                <span class="badge badge-success">Finish</span>
                @else
                <span class="badge badge-danger">Unfinish</span>
                @endif
            </td>
        </tr>

        @endforeach
    </tbody>
    </tbody>
</table>

@endforeach

@endsection