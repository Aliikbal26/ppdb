@extends('layout/main')

<!-- @section('title', 'Create') -->

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <main class="px-3 my-4 card p-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow my-2">
                            <div class="card-header">
                                <h6 class="text-center">TOTAL MAHASISWA</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-center">{{$jumlahMhs. ' Orang'}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow my-2">
                            <div class="card-header">
                                <h6 class="text-center">JUMLAH MAHASISWA PEREMPUAN</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-center">{{$jumlahMhsPerempuan. ' Orang'}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow my-2">
                            <div class="card-header">
                                <h6 class="text-center">JUMLAH MAHASISWA LAKI-LAKI</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-center">{{$jumlahMhsLaki. ' Orang'}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
@endsection