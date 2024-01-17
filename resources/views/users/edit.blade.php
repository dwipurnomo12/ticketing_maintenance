@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
            <div class="ml-auto">
                <a href="/users" class="btn btn-primary"><i class="fas fa-solid fa-arrow-left"></i> Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Role / Hak Akses<span
                                            style="color: red">*</span></label>
                                    <div class="form-group">
                                        <select class="form-control" name="role_id">
                                            <option value=""> -- Pilih Role -- </option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                                    {{ $role->role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span
                                            style="color: red">*</span></label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Kosongkan password jika tidak ingin diubah">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Konfirmasi Password <span
                                            style="color: red">*</span></label>
                                    <input type="password" class="form-control" name="confirmPassword">
                                    @error('confirmPassword')
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
