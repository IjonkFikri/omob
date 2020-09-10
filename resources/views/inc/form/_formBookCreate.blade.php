@if($students->count() <= 1) @foreach ($students as $student) <input type="hidden" name="kelas_id"
    value="{{$student->kelas_id}}">
    @endforeach
    @else
    <div class="form-group">
        <label for="formGroupExampleInput2">Unit Sekolah</label>
        <select name="kelas_id" id="" class="form-control @error('kelas_id') is-invalid @enderror">
            <option value="">Pilih Kelas</option>
            @foreach ($students as $student)
            <option value="{{$student->kelas_id}}" {{old('kelas_id')==$student->id ?'selected':''}}>
                {{$student->level->nama_kelas}}</option>
            @endforeach
        </select>
        @error('kelas_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @endif
    <div class="form-group">
        <label for="formGroupExampleInput">Penulis</label>
        <input type="text" name="penulis" id="" class="form-control @error('penulis') is-invalid @enderror"
            placeholder="Nama Penulis" value="{{old('penulis')}}" autocomplete="off">
        @error('penulis')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Penerbit</label>
        <input type="text" name="penerbit" id="" class="form-control @error('penerbit') is-invalid @enderror"
            placeholder="Penerbit" value="{{old('penerbit')}}" autocomplete="off">
        @error('penerbit')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Tempat Terbit</label>
        <input type="text" name="tempat_terbit" id="" class="form-control @error('tempat_terbit') is-invalid @enderror"
            placeholder="Tempat Terbit" value="{{old('tempat_terbit')}}" autocomplete="off">
        @error('tempat_terbit')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Jumlah Halaman</label>
        <input type="number" name="jumlah_halaman" id=""
            class="form-control @error('jumlah_halaman') is-invalid @enderror" placeholder="Jumlah Halaman"
            value="{{old('jumlah_halaman')}}" autocomplete="off">
        @error('jumlah_halaman')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Judul Buku Bacaan</label>
        <textarea name="judul_buku" id="" cols="30" rows="4"
            class="form-control @error('judul_buku') is-invalid @enderror"
            placeholder="Judul Buku Bacaan">{{old('judul_halaman')}}</textarea>
        @error('judul_buku')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>