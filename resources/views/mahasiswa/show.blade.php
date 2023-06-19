@extends('layout/main')

<!-- @section('title', 'Create') -->

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md">
                    <h2 class="mt-2">Daftar Mahasiswa</h2>
                    <p class="text-secondary">Di bawah ini merupakan daftar mahasiswa yang sudah mendaftar</p>
                </div>
            </div>
            <!-- <div class="row">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder="Cari..." value="{{ request('query') }}">
                    <button type="submit">Cari</button>
                </form>
            </div> -->

            <table class="table table-hover table-bordered my-3">
                <thead>
                    <tr class="text-center">
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
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
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
            <div class="row">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"> {{$users->links()}}
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection