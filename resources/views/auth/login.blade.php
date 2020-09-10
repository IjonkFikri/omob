<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <script src="https://kit.fontawesome.com/b21c2356bc.js" crossorigin="anonymous"></script>
</head>

<body>
        
    <div class="card card-sm" style="margin-top:10em;">
            <div class="mt-4" style="text-align:center;">
                    <img src="/images/nfrc.png" alt=""  srcset="" style="width:5em;">
            </div>
        <div class="my-4 mx-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="nis" type="nis" class="form-control @error('nis') is-invalid @enderror" name="nis"
                        value="{{ old('nis') }}" required autocomplete="off" autofocus placeholder="Username">

                    @error('nis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block text-light">
                        {{ __('Login') }}
                    </button>
                    <div class="alert alert-info alert-dismissible fade show mt-4" role="alert" style="border-left:4px solid #fed330;">
                            <i class="fas fa-info-circle mr-2"></i> <small><strong>Login</strong> menggunakan Nis Siswa.</small>
                          </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
