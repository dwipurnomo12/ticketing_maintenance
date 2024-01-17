@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Laporan Masuk</h4>
                        </div>
                        <div class="card-body">
                            <p>{{ $laporanMasuks }} Laporan</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h4>Laporan Pending</h4>
                        </div>
                        <div class="card-body">
                            <p>{{ $laporanPending }} Laporan</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Laporan Selesai</h4>
                        </div>
                        <div class="card-body">
                            <p>{{ $laporanSelesai }} Laporan</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h4>Laporan Ditolak</h4>
                        </div>
                        <div class="card-body">
                            <p>{{ $laporanDitolak }} Laporan</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
