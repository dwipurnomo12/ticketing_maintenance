@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="ml-auto">
                <a href="/users/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                    Users</a>
            </div>
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->role }}</td>
                                                <td>
                                                    <a href="/users/{{ $user->id }}/edit" class="btn btn-warning"><i
                                                            class="fas fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <form id="{{ $user->id }}" action="/users/{{ $user->id }}"
                                                        method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button" class="btn btn-danger swal-confirm"
                                                            data-form="{{ $user->id }}"><i
                                                                class="fas fa-solid fa-trash"></i></button>
                                                    </form>
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
