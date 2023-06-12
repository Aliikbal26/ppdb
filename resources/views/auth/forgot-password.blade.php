<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lupa Password</title>
</head>

<body>
    <div class="container">
        <div class="row p-3 justify-content-center my-5">
            <div class="card shadow p-4 col-md-4 mt-5">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <div>
                            <label for="email">Email</label>
                            <input id="email" class="form-control my-2" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary my-3">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>