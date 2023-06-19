@extends('layout/main')

<!-- @section('title', 'Create') -->

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md">
                    <h2 class="mt-2">Bukti pendaftaran</h2>
                    <p class="text-secondary">Di bawah ini merupakan isi data diri anda</p>
                </div>
                <div class="col-md-3 mt-3 ml-auto">
                    @if(!empty($student) && $student->email == null)
                    <a href="#" class="btn btn-success btn-sm" style="border-radius: 35px;">Download Bukti Pendaftaran</a>
                    @elseif(!empty($student) && $student->email != null)
                    <a href="{{ route('download.pdf', ['email' => $mhs->email]) }}" class="btn btn-success btn-sm" style="border-radius: 35px;">Download Bukti Pendaftaran</a>
                    @endif
                </div>
            </div>
            <div class="row">
                @if(empty($student->email))
                <div class="card p-3 bg-danger">
                    <h1 class="text-center text-white">Anda Belum Melakukan Pendaftaran</h1>
                </div>
                @elseif(!empty($student) && $student->email != null)
                <div class="col-md-5 my-3">
                    <ul class="list-group">
                        <table class="table table-bordered">
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
                            <tr>
                                <th>Status</th>
                                @if($student->status == 'diterima')
                                <td><button class="btn btn-success">Diterima</button></td>
                                @elseif($student->status == 'ditolak')
                                <td><button class="btn btn-danger">Ditolak</button></td>
                                @else
                                <td><button class="btn btn-warning">Pending</button></td>
                                @endif
                            </tr>
                        </table>
                    </ul>
                </div>
                @endif
            </div>




        </div>
    </div>
</div>
@endsection