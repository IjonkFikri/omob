<div class="form-group">
        <label for="">Nama Unit</label>
        <input type="text" name="nama_kelas" id="" class="form-control @error('nama_kelas') is-invalid @enderror"
        placeholder="Input New Kelas" value="{{old('nama_kelas') ?? $levels->nama_kelas}}" autocomplete="off">
    @error('nama_kelas')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>