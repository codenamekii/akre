@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-3">
                    <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Dosen Tidak Tetap</span>
                </div>

                <!-- Tabel 1 -->
                <div class="col-lg-6 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan Akademik</th>
                                <th>Doktor</th>
                                <th>Magister</th>
                                <th>Profesi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
                    </table>
                </div>

                <!-- Tabel 2 -->
                <div class="col-lg-6 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Program Studi</th>
                                <th>Jumlah Dosen</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody2"></tbody>
                    </table>
                </div>

                <!-- Grafik -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas class="border" id="chart-1" height="300"></canvas>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas class="border" id="chart-2" height="300"></canvas>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <a href="/visualisasi" class="btn btn-success wow fadeInRight" data-wow-delay="0.3s">
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
        $(document).ready(function() {
            var apiUrl = 'https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/dosen!E13:K17?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';

            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = response.values;
                    if (!data || data.length < 2) return;

                    $('#dataTableBody').empty();
                    $('#dataTableBody2').empty();

                    for (let i = 1; i < data.length; i++) {
                        var row = data[i];

                        // Tabel Dosen
                        if (row[0] && row[0] !== 'Total') {
                            $('#dataTableBody').append(`
                                <tr>
                                    <th scope="row">${i}</th>
                                    <td>${row[0]}</td>
                                    <td>${row[1] || 0}</td>
                                    <td>${row[2] || 0}</td>
                                    <td>${row[3] || 0}</td>
                                </tr>
                            `);
                        }

                        // Tabel Program Studi
                        if (row[4] && row[4] !== 'Total') {
                            $('#dataTableBody2').append(`
                                <tr>
                                    <th scope="row">${i}</th>
                                    <td>${row[5]}</td>
                                    <td>${row[6] || 0}</td>
                                </tr>
                            `);
                        }
                    }

                    // Buat Grafik
                    var chartData1 = processDataForChart(data, 1);
                    var chartData2 = processDataForChart(data, 2);
                    renderChart('chart-1', chartData1);
                    renderChart('chart-2', chartData2);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

            function processDataForChart(data, columnIndex) {
                var labels = [];
                var chartData = [];

                for (let i = 1; i < data.length; i++) {
                    var row = data[i];
                    if (row[0] && row[0] !== 'Total') {
                        labels.push(row[0]);
                        chartData.push(parseInt(row[columnIndex]) || 0);
                    }
                }

                return {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah',
                        data: chartData,
                        backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'],
                    }]
                };
            }

            function renderChart(canvasId, data) {
                new Chart(document.getElementById(canvasId), {
                    type: 'pie',
                    data: data,
                    options: {
                        plugins: {
                            datalabels: {
                                formatter: (value, ctx) => {
                                    const total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                    return ((value * 100) / total).toFixed(2) + '%';
                                },
                                color: 'white',
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
