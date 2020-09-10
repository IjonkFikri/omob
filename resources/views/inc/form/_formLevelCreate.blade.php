<div class="form-group">
        <label for="formGroupExampleInput2">Unit Sekolah</label>
        <select name="units_id" id="" class="form-control @error('units_id') is-invalid @enderror">
            <option value="">Pilih Unit</option>
            @foreach ($units as $unit)
            <option value="{{$unit->id}}" {{old('units_id')==$unit->id ?'selected':''}}>{{$unit->nama_unit}}</option>
            @endforeach
        </select>
        @error('units_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
   
<div class="form-group">
    <label for="formGroupExampleInput">Nama Kelas</label>
    <input type="text" name="nama_kelas" id="" class="form-control @error('nama_kelas') is-invalid @enderror"
        placeholder="Input New Kelas" value="{{old('nama_kelas')}}" autocomplete="off">
        @error('nama_kelas')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>