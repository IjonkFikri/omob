<h4>Kelas @foreach ($levels as $level)
    {{$level->nama_kelas}}
    @endforeach
</h4>
<table class="table table-light table-responsive" width="100" id="data">
    <thead>
        <tr>
            <th>#</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jumlah Buku</th>
            <th>Total Halaman Buku</th>
            <th>Finish</th>
            <th>Unfinish</th>
            <th>Total Riwayat Baca</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td> {{$student->user->nis}}</td>
            <td>{{$student->user->name}}</td>

            <td>
                @php $books= App\Book::where('users_id',$reading->user->id) @endphp
                <!-- Button trigger modal -->
                {{$books->count()}}
            </td>
            <td>{{$books->sum('jumlah_halaman')}}</td>
            <td>@if($books->sum('status',1) < 1) 0 @else {{$books->sum('status',1)}} @endif</td> <td>
                    {{$books->count() - $books->sum('status',1)}}</td>
            <td>
                @php $tReading= App\Reading::where('users_id',$reading->user->id) @endphp
                {{$tReading->sum('total_baca')}}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>