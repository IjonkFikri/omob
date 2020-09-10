<div class="form-group">
    <label for="formGroupExampleInput">Penulis</label>
    <input type="text" name="penulis" id="" class="form-control @error('penulis') is-invalid @enderror"
        placeholder="Nama Penulis" value="{{old('penulis',$books->penulis)}}" autocomplete="off">
        @error('penulis')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
<div class="form-group">
    <label for="formGroupExampleInput">Penerbit</label>
    <input type="text" name="penerbit" id="" class="form-control @error('penerbit') is-invalid @enderror"
        placeholder="Penerbit" value="{{old('penerbit',$books->penerbit)}}" autocomplete="off">
        @error('penerbit')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
<div class="form-group">
    <label for="formGroupExampleInput">Tempat Terbit</label>
    <input type="text" name="tempat_terbit" id="" class="form-control @error('tempat_terbit') is-invalid @enderror"
        placeholder="Tempat Terbit" value="{{old('tempat_terbit',$books->tempat_terbit)}}" autocomplete="off">
        @error('tempat_terbit')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
<div class="form-group">
    <label for="formGroupExampleInput">Jumlah Halaman</label>
    <input type="text" name="jumlah_halaman" id="" class="form-control @error('jumlah_halaman') is-invalid @enderror"
        placeholder="0" value="{{old('jumlah_halaman',$books->jumlah_halaman)}}" autocomplete="off">
        @error('jumlah_halaman')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
            <label for="formGroupExampleInput">Judul Buku Bacaan</label>
            <textarea name="judul_buku" id="" cols="30" rows="4" class="form-control @error('jumlah_halaman') is-invalid @enderror" placeholder="Judul Buku Bacaan">{{old('judul_halaman',$books->judul_buku)}}</textarea>
                @error('judul_buku')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>