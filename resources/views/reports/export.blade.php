@extends('layouts.app')
@section('title','Rekap Rangking')
@section('content')
@php header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Report-Omob.xls");
@endphp
<table class="table table-light table-responsive" width="100" id="data">
    <thead>
        <tr>
            <th>#</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>JB</th>
            <th>THB</th>
            <th>Finish</th>
            <th>Unfinish</th>
            <th>TRB</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($readings as $reading)
        <tr>
            <td style="width:4%;">{{$loop->iteration}}</td>
            <td class="td1 title text-center" style="width:5%;"> {{$reading->user->nis}}</td>
            <td style="width:60%;">{{$reading->user->name}}</td>
            <td class="td1 title text-center">
                @php $books= App\Book::where('users_id',$reading->user->id) @endphp
                <!-- Button trigger modal -->
                {{$books->count()}}
            </td>
            <td class="td1 title text-center">{{$books->sum('jumlah_halaman')}}</td>
            <td class="td1 title text-center">@if($books->sum('status',1) < 1) 0 @else {{$books->sum('status',1)}}
                    @endif</td> <td class="td1 title text-center">{{$books->count() - $books->sum('status',1)}}</td>
            <td class="td1 title text-center">
                @php $tReading= App\Reading::where('users_id',$reading->user->id) @endphp
                {{$tReading->sum('total_baca')}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$readings->links()}}
@endsection