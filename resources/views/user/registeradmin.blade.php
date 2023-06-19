<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{$title}}</title>
</head>

<body>
    <div class="container">
        <div class="row p-3 justify-content-center my-3">
            <div class="card shadow p-4 col-md-6 mt-3">
                <h2 class="text-center">Registrasi</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <hr>
                <form action="{{url('/admin/register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                    </div>
                    <div class="form-group mb-3">
                        <label for="level">Level</label>
                        <select name="level" class="form-control" id="level">
                            <option value="admin">Admin</option>
                            <option value="oprator">Oprator</option>
                            <option value="user">User</option>
                        </select>
                        <input class="btn btn-primary my-3" type="submit" name="submit" id="submit">
                        <a href="{{url('student')}}" class="btn btn-success"><- back</a>
                    </div>

                    <!-- <button type="submit" class="btn btn-primary">Register</button>
                    <a type="submit" href="{{url('login')}}" class="btn btn-success">Login</a> -->
                </form>
            </div>
        </div>

    </div>
</body>

</html>