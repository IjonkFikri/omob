<input type="hidden" name="kelas_id" value="{{$book->kelas_id}}">
<input type="hidden" name="books_id" value="{{$book->id}}">
<div class="form-group my-3">
    <label for="" class="font-weight-bold">Judul Buku</label>
    <p>{{$book->judul_buku}}</p>
</div>
<div class="form-group my-3">
    <label for="" class="font-weight-bold">Jumlah Halaman</label>
    <p>{{$book->jumlah_halaman}}</p>
<input type="hidden" name="jhb" value="{{$book->jumlah_halaman}}">
</div>
<div class="form-group my-3">
    <label for="" class="font-weight-bold">Riwayat Terakhir Bacaan</label>
    <p>
        @if ($readings->count()== 0)
        <span class="text-muted">Belum ada riwayat</span>
        @else
        {{$readings->sum('total_baca')}}
        @endif
    </p>
</div>

{{-- kondisi apabila reading kosong  --}}
@if($readings->count()== 0) @php $n =1; @endphp @else @php $n = $readings->sum('total_baca'); @endphp @endif
<div class="form-group my-3">
    <label for="">Update Halaman Baca</label>
    <div class="row">
            <div class="col-sm-4">
                    <input type="text" name="start" id="" value="{{$n}}" class="form-control " readonly>
            </div>
            <div onchange="endData()" class="col-sm-8">
                <input type="hidden" id="jhb" value="{{$book->jumlah_halaman}}">
                <select name="end" id="end" class="form-control">
                    <option value="">Halaman Akhir</option>
                    @for($i=$n+1; $i<= $book->jumlah_halaman; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>
            </div>
        </div>
</div>

