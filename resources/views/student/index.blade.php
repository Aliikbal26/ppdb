@extends('layout/main')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="my-3">DAFTAR MAHASISWA</h2>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="/student/create" class="btn btn-primary my-3" type="submit">Tambah Data</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Action</th>
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
                        <td>
                            <a href="/student/{{$mhs->id}}" class="badge bg-primary rounded-pill">detail</a>
                        </td>
                        <form action="/student/{{$mhs->id}}" method="post">
                            @csrf
                            <td>
                                <button value="diterima" name="status" class="btn btn-sm bg-success text-white">Diterima</button>
                                <button value="ditolak" name="status" class="btn btn-sm bg-danger text-white">Ditolak</button>
                            </td>
                        </form>
                    </tr>
                </tbody>
                @endforeach
            </table>



        </div>
    </div>
</div>
@endsection