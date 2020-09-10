@extends('layouts.app')
@section('title','Report Omob Kelas')
@section('content')
{{-- get data teacher  --}}
<h4>Report Laporan</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <div class="row">
        <div class="col-md-5 mt-2">
            <i class="fas fa-info-circle mr-2"></i>
            <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#"
                class="alert-link ml-2">THB</a> <small>Total Halaman Buku</small> <a href="#"
                class="alert-link ml-2">RB</a> <small>Riwayat Bacaan</small>
        </div>
        <div class="col-md-7">
            {{-- get unit id  --}}
            <form action="{{route('reports.store')}}" method="post" class="float-right">
                @csrf
                <div class="row">
                        <div class="input-group">
                                <select class="form-control mr-1" name="kelas_id" id="" style="width:9em;">
                                        <option value="">Kelas</option>
                                        @foreach ($units as $unit)
                                        <optgroup label="{{$unit->nama_unit}}">
                                            @foreach ($levels->where('units_id',$unit->id) as $level)
                                            <option value="{{$level->id}}" {{old('units_id')==$unit->id ?'selected':''}}>{{$level->nama_kelas}}</option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span> <i class="fa fa-caret-down"></i>
                                        </div>
                                        <input type="hidden" name="daterange" id="date">
                        <button type="submit" name="action"  value="cari" class=" ml-2 btn btn-info text-light"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
        @php
        $data = $levels->pluck('id');
        $students = $students->whereIn('kelas_id',$data);
        @endphp
        @foreach ($students as $student)
        @php
        $reading = $readings->where('users_id',$student->users_id);
        $book = $books->where('users_id',$student->user->id);
        @endphp
        <tr>
            <td class="title">{{$loop->iteration}}</td>
            <td class="title">{{$student->user->nis}}</td>
            <td>{{$student->user->name}}</td>
            <td class="title">{{$student->level->nama_kelas}}</td>
            <td class="text-center">
                <span class=" title font-weight-bold">{{$book->count('books_id')}}</span>
            </td>
            <td class="title text-center"> {{$book->sum('jumlah_halaman')}}</td>
            <td class="title text-center"> {{$reading->sum('total_baca')}}</td>
            <td class="td1 title text-center">
                @if($book->sum('status',1) < 1) 0 @else {{$book->sum('status',1)}} @endif </td> <td
                    class="td1 title text-center">
                    {{$book->count('jumlah_buku') - $book->sum('status',1)}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
