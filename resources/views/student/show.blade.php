@extends('layout/main')

@section('title', 'Detail '. $student->nama)

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2 class="my-3">DETAIL MAHASISWA</h2>

            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <img alt="image" src="{{ asset('/storage/foto/students/' . $student->foto) }}" class="my-3" width="50%" data-toggle="tooltip" title="Produk">
                    <h5 class="card-title">{{$student->nama}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$student->nim}}</h6>
                    <p class="card-text">{{$student->jurusan}}</p>
                    <form action="{{$student->id}}" class="d-inline" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                    <a href="{{$student->id}}/edit" class="btn btn-success d-inline">Edit</a>
                    <!-- <form action="{{$student->id}}/edit" method="post" class="d-inline">
                        @csrf
                        <button>Edit</button>
                    </form> -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection