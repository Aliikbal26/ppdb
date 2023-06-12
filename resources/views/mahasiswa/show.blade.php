@extends('layout/main')

<!-- @section('title', 'Create') -->

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="my-3">Daftar Mahasiswa</h2>
            <p class="text-secondary">Di bawah ini merupakan daftar mahasiswa yang sudah mendaftar</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                @foreach($mahasiswa as $mhs)
                <tbody>
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$mhs->nama}}</td>
                        <td>{{$mhs->nim}}</td>
                        <td>{{$mhs->jurusan}}</td>

                        <td>@if($mhs->status == 'diterima')
                            <span class="badge bg-success">Diterima</span>
                            @elseif($mhs->status == 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                            @elseif($mhs->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>

                    </tr>
                </tbody>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection