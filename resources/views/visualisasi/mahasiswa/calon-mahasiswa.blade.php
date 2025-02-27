@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Calon Mahasiswa {{ $jenjang }}</span>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Daya Tampung</th>
                                <th scope="col">Pendaftar</th>
                                <th scope="col">Lulus Seleksi</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody">

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-1"></canvas>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <canvas id="chart-2"></canvas>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                      <a href="/visualisasi"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
      $(document).ready(function() {
        var sheetId = "1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s";
        var sheetUrl = `https://docs.google.com/spreadsheets/d/${sheetId}/gviz/tq?tqx=out:csv`;

        console.log("Fetching data from:", sheetUrl);

        $.ajax({
            url: sheetUrl,
            method: 'GET',
            dataType: 'text',
            success: function(response) {
                console.log("CSV Response:", response);

                let rows = response.split("\n").map(row => row.split(",").map(cell => cell.replace(/["]/g, '').trim()));

                if (rows.length < 6) {
                    console.error("Data tidak mencukupi.");
                    return;
                }

                // Hapus baris pertama (header)
                let cleanedData = rows.slice(1, 6).map(row => ({
                    tahun: row[0],            // Tahun
                    dayaTampung: parseInt(row[1]),  // Daya Tampung
                    pendaftar: parseInt(row[2]),    // Pendaftar
                    lulusSeleksi: parseInt(row[3])  // Lulus Seleksi
                }));

                console.log("Cleaned Data:", cleanedData);

                // Kosongkan tabel sebelum memasukkan data baru
                $('#dataTableBody').empty();

                // Tambahkan data ke dalam tabel
                $.each(cleanedData, function(index, entry) {
                    var row = $('<tr>');
                    row.append('<th scope="row">' + (index + 1) + '</th>');
                    row.append('<td>' + entry.tahun + '</td>'); 
                    row.append('<td>' + entry.dayaTampung + '</td>'); 
                    row.append('<td>' + entry.pendaftar + '</td>'); 
                    row.append('<td>' + entry.lulusSeleksi + '</td>'); 
                    $('#dataTableBody').append(row);
                });

                // Siapkan data untuk chart
                const labels = cleanedData.map(entry => entry.tahun);
                const dataset1 = {
                    label: 'Jumlah Pendaftar',
                    data: cleanedData.map(entry => entry.pendaftar),
                    backgroundColor: 'rgba(11, 169, 9, 0.38)',
                    borderColor: 'rgb(11, 169, 9)',
                    borderWidth: 1
                };
                const dataset2 = {
                    label: 'Daya Tampung',
                    data: cleanedData.map(entry => entry.dayaTampung),
                    backgroundColor: 'rgba(11, 169, 9, 0.48)',
                    borderColor: 'rgb(11, 169, 9)',
                    borderWidth: 1
                };
                const dataset3 = {
                    label: 'Lulus Seleksi',
                    data: cleanedData.map(entry => entry.lulusSeleksi),
                    backgroundColor: 'rgba(7, 129, 22, 0.28)',
                    borderColor: 'rgb(11, 169, 9)',
                    borderWidth: 1
                };

                renderChart('chart-1', 'bar', labels, [dataset1]);
                renderChart('chart-2', 'bar', labels, [dataset2, dataset3]);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });

        function renderChart(canvasId, type, labels, datasets) {
            new Chart(document.getElementById(canvasId), {
                type: type,
                data: { labels: labels, datasets: datasets },
                options: { scales: { y: { beginAtZero: true } } }
            });
        }
    });
    </script>
@endsection
