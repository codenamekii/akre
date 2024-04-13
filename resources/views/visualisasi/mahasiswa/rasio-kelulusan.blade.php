@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h2 text-dark" data-wow-delay="0.3s">Data Rasio Kelulusan {{ $status }}</span>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead id="dataTableHeader">

                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-1" height="220vh"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-2" height="220vh"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-3" height="220vh"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-4" height="220vh"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-5" height="220vh"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-6" height="220vh"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp " data-wow-delay="0.3s">
                    <canvas id="chart-7" height="220vh"></canvas>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        $(document).ready(function() {
            var status = window.location.pathname.split('/').pop();
            if (status === 'S1') {
                apiUrl = 'http://127.0.0.1:8000/api/visualisasi/rasioLulus/A2:I9';
            } else if (status === 'S2') {
                apiUrl = 'http://127.0.0.1:8000/api/visualisasi/rasioLulus/K2:P6';
            } else if (status === 'S3') {
                apiUrl = 'http://127.0.0.1:8000/api/visualisasi/rasioLulus/A12:I19';
            } else if (status === 'Profesi') {
                apiUrl = 'http://127.0.0.1:8000/api/visualisasi/rasioLulus/K12:S19';
            } else {
                console.error('Status tidak valid');
                return;
            }

            $.ajax({
                url: apiUrl,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#dataTableHeader').empty();
                    $('#dataTableBody').empty();

                    var keys = Object.keys(data[0]);
                    var tableHeader = '<tr>';
                    $.each(keys, function(index, key) {
                        tableHeader += '<th scope="col">' + key + '</th>';
                    });
                    tableHeader += '</tr>';
                    $('#dataTableHeader').append(tableHeader);

                    $.each(data, function(index, entry) {
                        var tableRow = '<tr>';
                        $.each(keys, function(index, key) {
                            tableRow += '<td>' + entry[key] + '</td>';
                        });
                        tableRow += '</tr>';
                        $('#dataTableBody').append(tableRow);
                    });


                    const labels = Object.keys(data[0]).filter(key => key !== 'Tahun Masuk' && key !==
                        'Jumlah Lulusan Sampai Akhir TS');

                    for (let i = 0; i < data.length; i++) {
                        const dataset1 = {
                            label: 'Rasio Kelulusan Tepat Waktu ' + data[i]['Tahun Masuk'],
                            data: labels.map(label => data[i][label]),
                            backgroundColor: 'rgba(11, 169, 9, 0.2)',
                            borderColor: 'rgb(11, 169, 9)',
                            borderWidth: 1,
                            tension: 0.4
                        };
                        renderChart('chart-' + (i + 1), 'line', labels, [dataset1]);
                    }
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
                var myChart = new Chart(document.getElementById(canvasId), config);
            }
        });
    </script>
@endsection
