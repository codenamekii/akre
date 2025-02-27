@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pb-3">
                    <h4 class="text-dark">Data Dosen Berdasarkan Jabatan Akademik</h4>
                </div>
                <div class="col-12 p-2">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan Akademik</th>
                                <th>Doktor</th>
                                <th>Magister</th>
                                <th>Profesi</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12">
                    <canvas class="border" id="chart-1" height="300"></canvas>
                </div>
                <div class="col-lg-6 col-md-12">
                    <canvas class="border" id="chart-2" height="300"></canvas>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <a href="/visualisasi" class="btn btn-success">
                        <i class="bi bi-chevron-double-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        $(document).ready(function () {
            var apiUrl = 'https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/dosen!D3:H7?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';
            
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var values = data.values || [];
                    var labels = [];
                    var doktor = [];
                    var magister = [];
                    var profesi = [];
                    var jumlah = [];

                    $('#dataTableBody').empty();

                    $.each(values, function (index, entry) {
                        var row = $('<tr>');
                        row.append('<td>' + (index + 1) + '</td>');
                        row.append('<td>' + entry[0] + '</td>');
                        row.append('<td>' + entry[1] + '</td>');
                        row.append('<td>' + entry[2] + '</td>');
                        row.append('<td>' + entry[3] + '</td>');
                        row.append('<td>' + entry[4] + '</td>');

                        $('#dataTableBody').append(row);

                        labels.push(entry[0]);
                        doktor.push(parseInt(entry[1]) || 0);
                        magister.push(parseInt(entry[2]) || 0);
                        profesi.push(parseInt(entry[3]) || 0);
                        jumlah.push(parseInt(entry[4]) || 0);
                    });

                    renderChart('chart-1', 'Jumlah Doktor & Magister', labels, doktor, magister);
                    renderChart('chart-2', 'Jumlah Profesi & Total', labels, profesi, jumlah);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

            function renderChart(canvasId, title, labels, data1, data2) {
                var ctx = document.getElementById(canvasId);
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: title.split('&')[0].trim(),
                                data: data1,
                                backgroundColor: 'rgb(54, 162, 235)',
                            },
                            {
                                label: title.split('&')[1].trim(),
                                data: data2,
                                backgroundColor: 'rgb(255, 99, 132)',
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            datalabels: {
                                anchor: 'end',
                                align: 'top',
                                formatter: (value) => value,
                                color: 'black'
                            }
                        },
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
            }
        });
    </script>
@endsection
