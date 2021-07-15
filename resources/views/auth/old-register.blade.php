<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-4 offset-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Form Register</h3>
                </div>
                <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="card-body">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <h5>Info Akun*</h5>
                    <hr>
                    <div class="form-group">
                        <label for=""><strong>Lomba</strong></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="olim" name="lomba" id="lomba1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Olimpiade
                              </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="poster" name="lomba" id="lomba2">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Poster
                              </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Nama Tim</strong></label>
                        <input type="text" name="teamname" class="form-control" placeholder="Nama Tim" value="{{ old('teamname') }}">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Email</strong></label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Konfirmasi Password</strong></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                    </div>

                    <br>
                    <h5>Info Peserta</h5>
                    <hr>
                    <div class="form-group">
                        <label for=""><strong>Nama Lengkap</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}">
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for=""><strong>Nama Anggota 2</strong></label>
                        <input type="text" name="name2" class="form-control" placeholder="Nama Lengkap" value="{{ old('name2') }}">
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for=""><strong>Nama Anggota 3</strong></label>
                        <input type="text" name="name3" class="form-control" placeholder="Nama Lengkap" value="{{ old('name3') }}">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
