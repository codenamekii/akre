@extends('layouts.visual')

@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Tenaga Kependidikan</span>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Jabatan</th>
                                <th scope="col">Jumlah Tenaga Kependidikan</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas class="border" id="chart-1"></canvas>
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
            var apiUrl = 'https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/lainnya!A11:B19?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';

            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = response.values; 
                    if (!data || data.length < 1) {
                        console.error("Data kosong atau format tidak sesuai.");
                        return;
                    }

                    $('#dataTableBody').empty();
                    var labels = [];
                    var values = [];

                    for (var i = 0; i < data.length; i++) {
                        if (data[i].length < 2) continue;
                        var jenisJabatan = data[i][0];
                        var jumlahTendik = parseInt(data[i][1]);

                        var row = `<tr>
                            <th scope="row">${i + 1}</th>
                            <td>${jenisJabatan}</td>
                            <td>${jumlahTendik}</td>
                        </tr>`;

                        $('#dataTableBody').append(row);
                        labels.push(jenisJabatan);
                        values.push(jumlahTendik);
                    }

                    renderChart('chart-1', labels, values);
                },
                error: function(xhr, status, error) {
                    console.error('Gagal mengambil data:', error);
                }
            });

            function renderChart(canvasId, labels, dataValues) {
                const ctx = document.getElementById(canvasId).getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah',
                            data: dataValues,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(153, 102, 255)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            datalabels: {
                                formatter: (value, ctx) => {
                                    let total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                                    return ((value / total) * 100).toFixed(2) + '%';
                                },
                                color: '#fff'
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
