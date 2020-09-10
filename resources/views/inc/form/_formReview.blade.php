<input type="hidden" name="books_id" value="{{$book->id}}">
<div class="form-group">
    <label for="formGroupExampleInput">Sinopsis Buku</label>
    <textarea name="sinopsis" id="" cols="30" rows="4" class="form-control @error('sinopsis') is-invalid @enderror" placeholder="Sinopsis">{{old('sinopsis')}}</textarea>
        @error('sinopsis')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Kelebihan</label>
        <textarea name="kelebihan" id="" cols="30" rows="4" class="form-control @error('kelebihan') is-invalid @enderror" placeholder="Kelebihan Buku">{{old('kelebihan')}}</textarea>
            @error('kelebihan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    <div class="form-group">
            <label for="formGroupExampleInput">Kekurangan</label>
            <textarea name="kekurangan" id="" cols="30" rows="4" class="form-control @error('kekurangan') is-invalid @enderror" placeholder="Kekurangan">{{old('kekurangan')}}</textarea>
                @error('kekurangan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    <div class="form-group">
            <label for="formGroupExampleInput">Kesimpulan</label>
            <textarea name="kesimpulan" id="" cols="30" rows="4" class="form-control @error('kesimpulan') is-invalid @enderror" placeholder="Kesimpulan">{{old('kesimpulan')}}</textarea>
                @error('kesimpulan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>