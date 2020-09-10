
<div class="form-group">
    <label for="name" class="">{{ __('Name') }}</label>

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>

<div class="form-group">
    <label for="nis" class="">{{ __('Nis/Nip') }}</label>

        <input id="nis" type="nis" class="form-control @error('nis') is-invalid @enderror"
            name="nis" value="{{ old('nis') }}" required autocomplete="nis">

        @error('nis')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>

<div class="form-group">
    <label for="password"
        class="">{{ __('Password') }}</label>
        <input id="password" type="password"
            class="form-control @error('password') is-invalid @enderror" name="password"
            required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>

<div class="form-group">
    <label for="password-confirm"
        class="">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control"
            name="password_confirmation" required autocomplete="new-password">
</div>

<div class="form-group">
    <label for="role"
        class="">{{ __('Akses Role') }}</label>

        <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
            <option value="">Pilih Role</option>
            <option value="1">Administrator</option>
            <option value="2">Guru</option>
            <option value="3">Siswa</option>
        </select>
        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>