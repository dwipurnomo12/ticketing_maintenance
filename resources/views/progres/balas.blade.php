@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kirim Balasan</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="/progres" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" value="{{ $laporan->id }}" name="laporan_id">
                                    <label for="pesan" class="form-label">Kirim Pesan / Balasan <span
                                            style="color: red">*</span></label>
                                    <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="10"></textarea>
                                    @error('pesan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Kirim Progres</button>
                            </form>
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
