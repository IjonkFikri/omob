<div class="form-group">
        <label for="">Choose User</label>
        <select name="users_id" id="" class="form-control @error('users_id') is-invalid @enderror">
            <option value="">Pilih User</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}" {{ $user->id == $recaps->users_id ? 'selected' : '' }} >{{$user->name}}</option>
            @endforeach
        </select>
        @error('users_id')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Choose Unit</label>
        <select name="units_id" id="" class="form-control @error('units_id') is-invalid @enderror">
            <option value="">Pilih Kelas</option>
            @foreach ($units as $unit)
                <option value="{{$unit->id}}" {{$unit->id ==$recaps->units_id ?'selected':''}}>{{$unit->nama_unit}}</option>
            @endforeach
        </select>
        @error('units_id')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
   