@extends('layout/main')

<!-- @section('title', 'Create') -->

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/mahasiswa/create" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="my-3 text-center">Form Daftar PPDB</h1>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{old('nama')}}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nim">Nomor Induk Mahasiswa</label>
                    <input class="form-control  @error('nim') is-invalid @enderror" type="text" name="nim" id="nim" value="{{old('nim')}}">
                    @error('nim')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto" id="foto" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" class="form-control" id="jurusan">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    </select>
                    <input class="btn btn-primary my-3" type="submit" name="submit" id="submit">
                </div>
            </form>

        </div>
    </div>
</div>
@endsection