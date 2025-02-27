@extends('layouts.visual')
@section('content')
  <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="hero-area text-center pb-3">
            <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">
              Data Mahasiswa Lulusan {{ $jenjang }}
            </span>
          </div>
        </div>

        <div class="col-lg-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
          <table class="table table-striped table-hover border">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Jumlah Lulusan</th>
                <th>Rata-rata IPK Lulusan</th>
                <th>Rata-rata Masa Studi Lulusan (Tahun)</th>
              </tr>
            </thead>
            <tbody id="dataTableBody">
              <tr>
                <td colspan="5" class="text-center text-muted">Memuat data...</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
          <canvas id="chart-lulusan"></canvas>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
          <canvas id="chart-ipk"></canvas>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
          <canvas id="chart-masa-studi"></canvas>
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

  {{-- Script jQuery dan Chart.js --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

  <script>
    $(document).ready(function() {
      const jenjang = "{{ $jenjang }}";
      let apiUrl = `/api/visualisasi/MhsLulus/A2:D5`; // Sesuaikan dengan sheet

      $.ajax({
        url: apiUrl,
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log('Data dari API:', response); // Debugging

          if (!response.data || response.data.length === 0) {
            $('#dataTableBody').html(
              '<tr><td colspan="5" class="text-center text-muted">Data tidak tersedia</td></tr>');
            return;
          }

          // Kosongkan tabel sebelum menambahkan data baru
          $('#dataTableBody').empty();

          // Iterasi data untuk ditampilkan di tabel
          response.data.forEach((entry, index) => {
            $('#dataTableBody').append(`
        <tr>
          <th>${index + 1}</th>
          <td>${entry.Tahun}</td>
          <td>${entry["Jumlah Lulusan"]}</td>
          <td>${entry["Rata-Rata IPK Lulusan"].toFixed(2)}</td>
          <td>${entry["Rata-Rata Masa Studi Lulusan (Tahun)"].toFixed(2)}</td>
        </tr>
      `);
          });

          // Data untuk grafik
          const labels = response.data.map(entry => entry.Tahun);
          const lulusanData = response.data.map(entry => entry["Jumlah Lulusan"]);
          const ipkData = response.data.map(entry => entry["Rata-Rata IPK Lulusan"]);
          const masaStudiData = response.data.map(entry => entry["Rata-Rata Masa Studi Lulusan (Tahun)"]);

          renderChart('chart-lulusan', 'Jumlah Lulusan', lulusanData, labels, 'rgba(11, 169, 9, 0.2)',
            'rgb(11, 169, 9)');
          renderChart('chart-ipk', 'Rata-rata IPK Lulusan', ipkData, labels, 'rgba(11, 69, 169, 0.2)',
            'rgb(11, 69, 169)');
          renderChart('chart-masa-studi', 'Rata-rata Masa Studi', masaStudiData, labels,
            'rgba(255, 159, 64, 0.2)', 'rgb(255, 159, 64)');
        },

        error: function(xhr, status, error) {
          console.error('Error fetching data:', error);
          $('#dataTableBody').html(
            '<tr><td colspan="5" class="text-center text-danger">Gagal memuat data</td></tr>');
        }
      });



      function renderChart(canvasId, label, data, labels, bgColor, borderColor) {
        new Chart(document.getElementById(canvasId), {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: label,
              data: data,
              backgroundColor: bgColor,
              borderColor: borderColor,
              borderWidth: 1,
              tension: 0.4
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: true,
                position: 'top'
              },
              datalabels: {
                anchor: 'end',
                align: 'top',
                formatter: (value) => value.toFixed(2)
              }
            },
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }
    });
  </script>
@endsection
