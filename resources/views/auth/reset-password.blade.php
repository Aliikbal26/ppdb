<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reset Password</title>
</head>

<body>
    <div class="container">
        <div class="row p-3 justify-content-center my-5">
            <div class="card shadow p-4 col-md-4 mt-5">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <input type="hidden" name="token" value="{{ $token}}">
                    <div class="form-group">

                        <div>
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $email) }}" required autofocus>
                            @error('email')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">

                        <div>
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required>
                            @error('password')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">

                        <div>
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary my-3">Reset Password</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>

</html>