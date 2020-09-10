@extends('layouts.app')
@section('title','Data Review')
@section('content')

<h4>Data Review Buku Kelas <span class=" rounded-pill p-1 shadow-sm bg-info text-light">
    @if(!Request::get('level'))
    All
    @else 
    {{$u->nama_kelas}}
    @endif
    
</span></h4>
    <div class="input-group mb-3">
        <div class="input-group-prepend shadow-sm">
          <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fas fa-filter text-black-50"></i></span>
        </div>
        <div class="dropdown show shadow-sm border-left-0" aria-describedby="basic-addon1">
            @if(!Request::get('level'))
            <a class="btn btn-light dropdown-toggle" href="{{route('review.index')}}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All
              </a>
            @else
            <a class="btn btn-light dropdown-toggle" href="{{route('review.index',['level' => $u->id])}}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$u->nama_kelas}}
              </a>
            @endif
          
            <div class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenuLink">
                @if(Request::get('level'))
                <a class="dropdown-item" href="{{route('review.index')}}">All</a>
                @endif
                @foreach ($datas as $data)
                    <a class="dropdown-item {{Request::get('level') == $data->id ? 'active' : '' }}" href="{{route('review.index', ['level' => $data->id])}}">{{$data->nama_kelas}}</a>
                @endforeach
            </div>
          </div>
      </div>

    
      <table class="table table-borderles" id="data">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th><i class="fas fa-book-open text-secondary"></i>Nama Lengkap</th>
               <th><i class="fas fa-list text-secondary"></i>JB</th>
                 <th><i class="fas fa-list text-secondary"></i> Sudah</th>
                <th><i class="fas fa-clock text-secondary"></i> Belum</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
            <td>
                @php $countBook = $books->where('users_id',$data->users_id)->where('kelas_id',$data->kelas_id); @endphp
                {{ $countBook->count('judul_buku') }}
            </td>
                <td>
                    @php $cReview = $review->whereIn('books_id',$countBook->pluck('id')) @endphp
                    {{ $cReview->count('books_id') }}
                </td>
                <td>
                    {{ $countBook->count('judul_buku') - $cReview->count('books_id') }}
                </td>
                <td>
                <a href="{{route('review.show',$data->users_id."-".$data->kelas_id)}}" class="btn btn-link text-decoration-none btn-txt">View Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection