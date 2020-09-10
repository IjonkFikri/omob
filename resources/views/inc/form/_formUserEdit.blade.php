<div class="form-group">
    <label for="name" class="">{{ __('Name') }}</label>

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') ?? $users->name }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>

<div class="form-group">
    <label for="nis" class="">{{ __('Nis/Nip') }}</label>

        <input id="nis" type="nis" class="form-control @error('nis') is-invalid @enderror"
            name="nis" value="{{ old('nis') ?? $users->nis }}" required autocomplete="nis">

        @error('nis')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>

<div class="form-group">
    <label for="role"
        class="">{{ __('Akses Role') }}</label>

        <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
            <option value="">Pilih Role</option>
            @foreach ($roles as $role)
        <option value="{{$role->id}}" {{ $users->role == $role->id ? 'selected' : '' }}>{{$role->nama_role}}</option>
            @endforeach
        </select>
        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>