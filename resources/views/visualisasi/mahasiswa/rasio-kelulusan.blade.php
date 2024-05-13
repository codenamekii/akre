@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Rasio Kelulusan {{ $jenjang }}</span>
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


            </div>
            <div class="row mt-5">
                <div class="col-12">
                  <a href="/visualisasi"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
    $(document).ready(function() {
        var status = "{{ $jenjang }}";
        var apiUrlRatioLulus = '';
    
        if (status === 'S1') {
            apiUrlRatioLulus = '/api/visualisasi/rasioLulus/A2:I9';
        } else if (status === 'S2') {
            apiUrlRatioLulus = '/api/visualisasi/rasioLulus/K2:P6';
        } else if (status === 'S3') {
            apiUrlRatioLulus = '/api/visualisasi/rasioLulus/A12:I19';
        } else {
            console.error('Status tidak valid');
            return;
        }
    
        $.ajax({
            url: apiUrlRatioLulus,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                renderTable(data);
                renderChart(data);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    
        function renderTable(data) {
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
        }
    
        function renderChart(data) {
            //Belum Siap
        }

    });
    

    </script>
@endsection


{{-- ==========================Contoh Dari Table Pak Isan:======================================
           ,  Jumlah Mahasiswa Perangkatan Pada Tahun  ,
Tahun Masuk, Awal Ts-3, Awal Ts-2, Awal Ts-1, Akhir Ts , Jumlah Lulusan Sampai dengan akhir Ts
Ts-3       , 370      ,   289    ,     84   ,    60    ,   310
TS-2       ,          ,   360    ,     248  ,    55    ,   305
TS-1       ,          ,          ,     249  ,    106   ,   143
TS         ,          ,          ,          ,    348   ,

Dari table itu didapatkan hasil:
1. Rasio Kelulusan Tepat waktu = 57.43%
2. Keberhasilan Studi = 83.78%

Rumus:
1. Rasio Kelulusan Tepat Waktu:
Yang Digunakan: jumlah lulusan akhir TS-3 (310) dan jumlah mahasiswa awal TS-3 (370).
	Rasio Kelulusan Tepat Waktu TS-3 = (310 / 370) * 100% ≈ 83.78%

2. Rasio Keberhasilan Studi:
Yang Digunakan: jumlah lulusan akhir TS-1 (143) dan jumlah mahasiswa awal TS-1 (249).
	Rasio Keberhasilan Studi TS-1 = (143 / 249) * 100% ≈ 57.43%
=============================================================================================
Yang Diminta Dia:
1. Rasio kelulusan tepat waktu
a. untuk S3, rumusnya: jumlah lulusan akhir TS dibagi Jumlah mhs awal TS-6.
b. untuk S2, rumusnya: jumlah lulusan akhir TS dibagi Jumlah mhs awal TS-3.
c. untuk S1, rumusnya: jumlah lulusan akhir TS dibagi Jumlah mhs awal TS-6.

2. Rasio Keberhasilan studi:
a. untuk S3, rumusnya: jumlah lulusan akhir TS dibagi Jumlah mhs awal TS-2.
b. untuk S2, rumusnya: jumlah lulusan akhir TS dibagi Jumlah mhs awal TS-1.
c. untuk S1, rumusnya: jumlah lulusan akhir TS dibagi Jumlah mhs awal TS-3.



Contoh Implementasi Pada Tabel kita yang S1

Tahun Masuk, 2016.1, 2017.1, 2018.1, 2019.1, 2020.1, 2021.1, 2022.2, Jumlah Lulusan Sampai Akhir TS
TS-6	   ,  4497 ,  4497 ,  4497 ,  4009 ,  1999 ,  1268 ,  738  , 3759
TS-5	   ,       ,  6543 ,  6543 ,  6531 ,  6120 ,  2494 ,  1664 , 4879
TS-4	   ,	   ,       ,  7338 ,  7338 ,  7338 ,  6126 ,  2600 , 4738 
TS-3	   ,       ,       ,       ,  5812 ,  5812 ,  5812 ,  2936 , 2876
TS-2	   ,       ,       ,       ,       ,  5792 ,  5792 ,  5792 ,	
TS-1	   ,       ,       ,       ,       ,       ,  5695 ,  5695 ,
TS	       ,       ,       ,       ,       ,       ,       ,  5815 ,

1. Rasio Kelulusan Tepat Waktu:
	Jumlah Lulusan Akhir TS-6: 3759
	Jumlah Mahasiswa Awal TS-6: 4497
	Rasio Kelulusan Tepat Waktu TS-6 = (3759 / 4497) * 100% ≈ 83.63%

2. Rasio Keberhasilan Studi:
	Jumlah Lulusan Akhir TS-3: 2876
	Jumlah Mahasiswa Awal TS-3: 5812
	Rasio Keberhasilan Studi TS-3 = (2876 / 5812) * 100% ≈ 49.48%

Buatlah 1 Table dan 1 Grafik diagram Bar, Grafik Tersebut berisi:
	1. Labels/Angka parameternya adalah 0% sampai 100%
	2. dataset: berisi 2 dataset: Rasio Kelulusan Tepat Waktu & Rasio Keberhasilan Studi
	3. grafik: 1 chart diagram bar yang berisi 2 batang bar/2 dataset


	Gambaran Kode Kasar:
	const labels = (0% - 100%);
	const dataset1 = {
                        label: 'Rasio Kelulusan Tepat Waktu',
                        data: data.map(entry => entry['Rasio Kelulusan Tepat Waktu']),
                        backgroundColor: 'rgb(11 169 9 / 48%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };
    const dataset2 = {
                        label: 'Rasio Keberhasilan Studi',
                        data: data.map(entry => entry['Rasio Keberhasilan Studi']),
                        backgroundColor: 'rgb(7 129 22 / 28%)',
                        borderColor: 'rgb(11 169 9)',
                        borderWidth: 1
                    };
	renderChart('chart-1', 'bar', labels, [dataset1, dataset2]);
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
        } --}}