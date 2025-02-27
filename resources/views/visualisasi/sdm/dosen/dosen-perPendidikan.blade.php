@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">
                            Data Dosen Berdasarkan Pendidikan Terakhir
                        </span>
                    </div>
                </div>

                <div class="col-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Program Studi</th>
                                <th scope="col">Doktor</th>
                                <th scope="col">Magister</th>
                                <th scope="col">Profesi</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
                    </table>
                </div>

                <div class="col-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-1"></canvas>
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
            var apiUrl = 'https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/dosen!D3:H7?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';

            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (!response.values || response.values.length === 0) {
                        console.error("Data kosong atau tidak ditemukan.");
                        return;
                    }

                    $('#dataTableBody').empty();

                    response.values.forEach(function(entry, index) {
                        if (entry.length < 5) return; // Skip jika data tidak lengkap

                        var row = $('<tr>');
                        row.append('<th scope="row">' + (index + 1) + '</th>');
                        row.append('<td>' + (entry[0] || '-') + '</td>');
                        row.append('<td>' + (entry[1] || '0') + '</td>');
                        row.append('<td>' + (entry[2] || '0') + '</td>');
                        row.append('<td>' + (entry[3] || '0') + '</td>');
                        row.append('<td>' + (entry[4] || '0') + '</td>');
                        $('#dataTableBody').append(row);
                    });

                    const labels = response.values.map(entry => entry[0]);
                    const datasetDoktor = {
                        label: 'Doktor',
                        data: response.values.map(entry => parseInt(entry[1] || 0)),
                        backgroundColor: 'rgba(11, 169, 9, 0.48)',
                        borderColor: 'rgb(11, 169, 9)',
                        borderWidth: 1
                    };
                    const datasetMagister = {
                        label: 'Magister',
                        data: response.values.map(entry => parseInt(entry[2] || 0)),
                        backgroundColor: 'rgba(7, 129, 22, 0.28)',
                        borderColor: 'rgb(11, 169, 9)',
                        borderWidth: 1
                    };

                    renderChart('chart-1', 'bar', labels, [datasetDoktor, datasetMagister]);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

            function renderChart(canvasId, type, labels, datasets) {
                const config = {
                    type: type,
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };
                new Chart(document.getElementById(canvasId), config);
            }
        });
    </script>
@endsection
