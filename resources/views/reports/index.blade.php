@extends('layouts.app')
@section('title','Report Omob Kelas')
@section('content')
{{-- get data teacher  --}}
{{-- @if(Auth::user()->role==2) --}}
@php $teachers = $teachers->where('users_id',Auth::user()->id); @endphp
{{-- @else
@php $teachers @endphp
@endif --}}

<h4>Report Laporan Kelas</h4>
<div class="alert alert-info top-border mt-4" role="alert">
    <div class="row">
        <div class="col-md-5">
            <i class="fas fa-info-circle mr-2"></i>
            <a href="#" class="alert-link">JB</a> <small>Jumlah Buku</small> <a href="#"
                class="alert-link ml-2">THB</a> <small>Total Halaman Baca</small> <a href="#"
                class="alert-link ml-2">RB</a> <small>Riwayat Bacaan</small>
        </div>
        <div class="col-md-7">
            <form action="{{route('reports.store')}}" method="post" class="float-right">
                @csrf
                @foreach ($teachers as $teacher)
                @endforeach
                <div class="row">
                    <div class="input-group" style="position: relative; top:-.1em;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i
                                    class="fas fa-filter text-info"></i></span>
                        </div>
                        <input type="hidden" name="kelas_id" id="" value="{{$teacher->kelas_id}}">
                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                            <input type="hidden" name="daterange" id="date" value="">
                        <button type="submit" class=" ml-2 btn btn-info text-light"><i class="fas fa-search"></i> <small class="text-light font-weight-bold">View Rangking</small> </button>
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
            <th style="width:10%">Nis</th>
            <th style="width:35%">Nama</th>
            <th style="width:10%">Kelas</th>
            <th style="width:5%" class="text-center">JB</th>
            <th class="text-center">THB</th>
            <th class="text-center">RB</th>
            <th class="text-center">Finish</th>
            <th class="text-center">UnFinish</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
        @foreach($students->where('kelas_id',$teacher->kelas_id) as $student)
        <tr>
            <td class="title">{{$loop->iteration}}</td>
            <td class="title">{{$student->user->nis}}</td>
            <td>{{$student->user->name}}</td>
            <td class="title">{{$student->level->nama_kelas}}</td>
            {{-- query book  --}}
            @php $books = App\Book::where('users_id',$student->user->id)->where('kelas_id',$teacher->kelas_id)->get();
            // query reading
            $reading = App\Reading::where('users_id',$student->user->id)->where('kelas_id',$teacher->kelas_id)->get();
            @endphp
            <td>
                <a href="#" data-toggle="modal" data-target="#detailData-{{$student->user->id}}"><button
                        class="btn btn-info">
                        <i class="fas fa-book-reader text-light"></i> <span
                            class=" text-light font-weight-bold">{{$books->count('judul_buku')}}</span>
                    </button></a>

                <!-- Modal -->
                <div class="modal fade" id="detailData-{{$student->user->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width:50em;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> {{$student->user->name}} -
                                    {{$student->user->nis}} </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-info top-border mt-4" role="alert">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <a href="#" class="alert-link">JH</a> <small>Jumlah Halaman</small>
                                    <a href="#" class="alert-link">RB</a> <small>Riwayat Bacaan</small>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Judul Buku</th>
                                            <th class="td1">JH</th>
                                            <th class="td1">RB</th>
                                            <th class="td1">%</th>
                                            <th class="td1">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                        <tr>

                                            <td>{{$book->judul_buku}}</td>
                                            <td class="title">{{$book->jumlah_halaman}}</td>
                                            <td class="title">
                                                @php $reading = $readings->where('books_id',$book->id)->where('users_id',$student->users_id)->where('kelas_id',$student->kelas_id); @endphp
                                                    {{ $reading->sum('total_baca') }}
                                            </td>
                                            <td class="title text-primary">
                                                {{round(($reading->sum('total_baca')/$book->jumlah_halaman)*100)}}
                                            </td>
                                            <td>
                                                @if($book->status == 1)
                                                <span class="badge badge-success">Finish</span>
                                                @else
                                                <span class="badge badge-danger">Unfinish</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="title text-center"> {{$books->sum('jumlah_halaman')}}</td>
            <td class="title text-center"> {{$reading->sum('total_baca')}}</td>
           {{-- finish  --}}
            <td class="td1 title text-center">
                @php $cReview = $review->whereIn('books_id',$books->pluck('id')) @endphp
                {{ $cReview->count('books_id') }}
            </td> 
            {{-- unfinish  --}}
            <td class="td1 title text-center">
                {{ $books->count('judul_buku') - $cReview->count('books_id') }}</td>
            <td>
                <a href="{{route('reports.detail',['id'=>$student->user->id,'kelas_id'=>$teacher->kelas_id])}}"
                    class="text-dark mr-2 card-link font-weight-bold">View Riwayat</a>
            </td>

        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>
{{-- {{$teachers->links()}} --}}
@endsection
