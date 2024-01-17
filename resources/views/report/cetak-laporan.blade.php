<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Ticketing</title>
    <style>
        .container {
            text-align: center;
            margin: auto;
        }

        .column {
            text-align: center;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        table {
            margin: auto;
            width: 100%;
        }

        tr {
            text-align: left;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            background-color: gainsboro;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <h2>Laporan Ticketing</h2>
            </div>
            <div class="col">
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
                                        Belum ada progres !
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
