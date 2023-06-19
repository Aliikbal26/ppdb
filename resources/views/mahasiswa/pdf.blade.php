<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <!-- <img alt="image" src="{{ asset('/foto/logo.png')}}" class="my-3" width="20%" data-toggle="tooltip" title="Mahasiswa"> -->
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-center">BUKTI PENDAFTARAN</h3>
                        <h5 class="text-center">STMIK IKMI CIREBON</h5>
                        <p class="text-secondary text-center">Jalan Majasem No.10 B, Kec. Kramat Mulya Kab. Cirebon 45286</p>
                    </div>
                    <hr class="dotted">
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- <img alt="image" src="{{ asset('/storage/foto/students/Aliikbal.jpg')}}" class="my-3" width="50%" data-toggle="tooltip" title="Mahasiswa"> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <ul class="list-group">
                                        <table>
                                            <tr>
                                                <th>No Pendaftaran</th>
                                                <td>: {{$student->no_pendaftaran}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td>: {{$student->nama}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIM</th>
                                                <td>: {{$student->nim}}</td>
                                            </tr>
                                            <tr>
                                                <th>Jurusan</th>
                                                <td>: {{$student->jurusan}}</td>
                                            </tr>
                                            <tr>
                                                <th>Waktu Pendaftaran</th>
                                                <td>: {{$student->created_at}}</td>
                                            </tr>
                                        </table>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="fst-italic mt-2">Note : Bawa Bukti Pendaftaran ini pada saat registrasi ulang</p>
                <!-- <main class="px-3 my-4">
                </main> -->
            </div>
        </div>
    </div>
</body>

</html>