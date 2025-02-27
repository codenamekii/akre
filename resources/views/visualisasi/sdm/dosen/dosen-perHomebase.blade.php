@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-3">
                    <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Dosen Berdasarkan Homebase</span>
                </div>
                
                <div class="col-lg-6 col-md-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Program Studi</th>
                                <th scope="col">Jumlah Dosen</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
                    </table>
                </div>
                
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas class="border" id="chart-1" height="300"></canvas>
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
            var apiUrl = 'https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/dosen!A3:B7?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';
            
            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = response.values;
                    if (!data || data.length === 0) return;
                    
                    $('#dataTableBody').empty();
                    var labels = [], dataset = [];
                    
                    data.forEach((entry, index) => {
                        if (entry.length >= 2) {
                            var programStudi = entry[0];
                            var jumlahDosen = parseInt(entry[1]) || 0;
                            
                            $('#dataTableBody').append(
                                `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${programStudi}</td>
                                    <td>${jumlahDosen}</td>
                                </tr>`
                            );
                            
                            labels.push(programStudi);
                            dataset.push(jumlahDosen);
                        }
                    });
                    
                    renderChart('chart-1', labels, dataset);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        
            function renderChart(canvasId, labels, dataset) {
                var ctx = document.getElementById(canvasId).getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Dosen Berdasarkan Homebase',
                            data: dataset,
                            backgroundColor: 'rgba(11, 169, 9, 0.5)',
                            borderColor: 'rgba(11, 169, 9, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        indexAxis: 'y',
                        scales: {
                            x: { beginAtZero: true }
                        }
                    }
                });
            }
        });
    </script>
@endsection
