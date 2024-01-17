@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Statistik Insiden</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="insidenChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('insidenChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        // ... tambahkan warna sesuai kebutuhan
                    ],
                }],
            },
        });
    </script>
@endsection
