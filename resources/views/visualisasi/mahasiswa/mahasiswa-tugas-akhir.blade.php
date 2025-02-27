@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Mahasiswa Tugas Akhir</span>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Jumlah Mahasiswa Tugas Akhir</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody">
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas class="border" id="chart-1" height="300vh"></canvas>
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
    <script>
        $(document).ready(function() {
            var apiUrl = 'https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/lainnya!I11:J16?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';

            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (!response.values || response.values.length === 0) {
                        console.error('Data kosong atau tidak tersedia');
                        return;
                    }

                    let data = response.values; // Ambil array data dari response API
                    let labels = [];
                    let values = [];

                    $('#dataTableBody').empty();
                    for (let i = 0; i < data.length; i++) {
                        let fakultas = data[i][0] || 'Tidak Diketahui';
                        let jumlah = data[i][1] || 0;

                        // Tambahkan ke tabel
                        let row = `
                            <tr>
                                <th scope="row">${i + 1}</th>
                                <td>${fakultas}</td>
                                <td>${jumlah}</td>
                            </tr>
                        `;
                        $('#dataTableBody').append(row);

                        // Tambahkan ke array chart
                        labels.push(fakultas);
                        values.push(parseInt(jumlah));
                    }

                    renderChart2('chart-1', labels, values);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

            function renderChart2(canvasId, labels, data) {
                const ctx = document.getElementById(canvasId).getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Mahasiswa Tugas Akhir',
                            data: data,
                            backgroundColor: 'rgba(11, 169, 9, 0.2)',
                            borderColor: 'rgba(11, 169, 9, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
