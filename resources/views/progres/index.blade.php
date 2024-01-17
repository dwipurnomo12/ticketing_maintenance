@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Progres</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Laporan</th>
                                            <th>Nama</th>
                                            <th>Instansi</th>
                                            <th>Insiden</th>
                                            <th>Progres</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporans as $laporan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $laporan->id_laporan }}</td>
                                                <td>{{ $laporan->nama }}</td>
                                                <td>{{ $laporan->instansi }}</td>
                                                <td>{{ $laporan->insiden }}</td>
                                                <td>
                                                    @if ($laporan->pesans->count() > 0)
                                                        <ol>
                                                            @foreach ($laporan->pesans as $pesan)
                                                                <li>{{ $pesan->pesan }}</li>
                                                            @endforeach
                                                        </ol>
                                                    @else
                                                        Belum ada tindak lanjut!
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($laporan->status == 'pending')
                                                        <span class="badge badge-warning">{{ $laporan->status }}</span>
                                                    @elseIf($laporan->status == 'selesai')
                                                        <span class="badge badge-success">{{ $laporan->status }}</span>
                                                    @elseIf($laporan->status == 'ditolak')
                                                        <span class="badge badge-danger">{{ $laporan->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/progres/balas/{{ $laporan->id }}"
                                                        class="btn btn-primary">Kirim Progres</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                paging: true
            });
        });
    </script>
@endsection
