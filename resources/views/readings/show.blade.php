@extends('layouts.app')
@section('title','Detail Riwayat')
    @section('content')
    <h4>Detail Riwayat</h4>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th><i class="fas fa-list-ol"></i> Halaman</th>
                <th> <i class="fas fa-calendar-alt"></i> Tanggal</th>
                <th><i class="fas fa-history"></i> Created At</th>
                <th style="width:10%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($readings as $reading)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$reading->start}} - {{$reading->end}} </td>
            <td>{{ \Carbon\Carbon::parse($reading->created_at)->format('d F Y')}}</td>
                    <td>
                        {{$reading->created_at->diffForHumans()}}
                    </td>
                    <td>
                    <form action="{{route('readings.destroy',$reading->id)}}" method="post" onsubmit="return confirm('Yakin akan di hapus ?')">
                        @csrf 
                        @method('DELETE')
                            <button type="submit" class="btn btn-link btn-text">
                                <i class="far fa-trash-alt"></i>&nbsp; Delete
                            </button>
                        </form>
                    </td>
                </tr> 
            @endforeach
            
        </tbody>
    </table>
@endsection