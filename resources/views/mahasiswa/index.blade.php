@extends('layout/main')

<!-- @section('title', 'Create') -->

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <main class="px-3 my-4">
                <h1>Daftar Segera !!</h1>
                <p class="lead my-4">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
                <p class="lead">
                    <!-- <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a> -->
                    <a href="/mahasiswa/create" class="btn btn-primary my-3" type="submit">Daftar PPDB</a>
                </p>
            </main>
        </div>
        <div class="col-md-6">

            <!-- @foreach($mahasiswa as $mhs)

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{$mhs->nama}}</div>
                </div>

                <a href="/student/{{$mhs->id}}" class="badge bg-primary rounded-pill">detail</a>
            </li>
            @endforeach -->

        </div>
    </div>
</div>
@endsection