<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <link rel="shortcut icon" href="href=" /resources/assets/img/ali.jpeg"> -->
    <title>@yield('title')</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container">
            <a class="navbar-brand text-bold" href="#">Ali Ikbal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @if(Auth::User()->level == 'user')
                    <a class="nav-link" aria-current="page" href="{{url('/mahasiswa')}}">Home</a>
                    <a class="nav-link" href="{{url('/mahasiswa/show')}}">Students</a>
                    <a class="nav-link" href="{{url('/mahasiswa/pendaftaran')}}">Pendftaran</a>
                    @endif
                    @if(Auth::User()->level == 'oprator')
                    <a class="nav-link" aria-current="page" href="{{url('/home')}}">Home</a>
                    <a class="nav-link" href="{{url('/student')}}">Students</a>
                    <a class="nav-link" href="{{url('/admin/register')}}">Register</a>
                    @endif
                    @if(Auth::User()->level == 'admin')
                    <a class="nav-link" aria-current="page" href="{{url('/home')}}">Home</a>
                    <a class="nav-link" href="{{url('/student')}}">Students</a>
                    <a class="nav-link" href="{{url('/admin/register')}}">Register</a>
                    <a class="nav-link" href="{{url('/mahasiswa')}}">Mahasiswa</a>
                    @endif
                </div>

                <div class="navbar-nav ms-auto">
                    <form action="{{url('logout')}}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>

        </div>

    </nav>


    @yield('container')

    @yield('jumbotron')
    @yield('tombol')


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>