@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
            <div class="ml-auto">
                <a href="/laporan" class="btn btn-primary"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="/laporan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="instansi" class="form-label">instansi <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="instansi"
                                        value="{{ old('instansi') }}">
                                    @error('instansi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="insiden" class="form-label">insiden <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="insiden" value="{{ old('insiden') }}">
                                    @error('insiden')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload Laporan <span
                                            style="color: red">*</span></label>
                                    <input type="file" class="form-control" name="file" value="{{ old('file') }}">
                                    @error('file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
