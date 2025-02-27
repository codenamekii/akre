@extends('layouts.visual')
@section('content')
  <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="hero-area text-center pb-3">
            <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Rasio Kelulusan {{ $jenjang }}</span>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
          <div class="col-lg-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
            <table class="table table-striped table-hover border">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tahun Masuk</th>
                  <th>2016.1</th>
                  <th>2017.1</th>
                  <th>2018.1</th>
                  <th>2019.1</th>
                  <th>2020.1</th>
                  <th>2021.1</th>
                  <th>2022.1</th>
                  <th>Jumlah Lulusan Sampai Akhir</th>
                </tr>
              </thead>
              <tbody id="dataTableBody">
                <tr>
                  <td colspan="10" class="text-center">Memuat data...</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
            <canvas id="chart-1" height="220vh"></canvas>
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
        var apiUrlRatioLulus = "https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/RasioKelulusan!A3:I9?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A'";

        $.ajax({
          url: apiUrlRatioLulus,
          method: 'GET',
          dataType: 'json',
          success: function(response) {
            var data = response.values; 
            renderTable(data);
            renderChart('chart-1', 'bar', processChartData(data));
          },
          error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
            $('#dataTableBody').html('<tr><td colspan="10" class="text-center text-danger">Gagal memuat data</td></tr>');
          }
        });

        function renderTable(data) {
          $('#dataTableBody').empty();

          if (!data || data.length === 0) {
            $('#dataTableBody').append('<tr><td colspan="10" class="text-center">Data tidak tersedia</td></tr>');
            return;
          }

          $.each(data, function(index, entry) {
            let row = `<tr><td>${index + 1}</td>`; // Nomor urut
            for (let i = 0; i < entry.length; i++) {
              row += `<td>${entry[i] !== undefined ? entry[i] : '-'}</td>`;
            }
            row += `</tr>`;
            $('#dataTableBody').append(row);
          });
        }

        function renderChart(canvasId, type, datasets) {
          const ctx = document.getElementById(canvasId).getContext('2d');
          new Chart(ctx, {
            type: type,
            data: {
              labels: ['Kelulusan Tepat Waktu', 'Keberhasilan Studi'],
              datasets: datasets
            },
            options: {
              scales: {
                y: { beginAtZero: true }
              }
            }
          });
        }

        function processChartData(data) {
          if (!data || data.length < 2) {
            return [{
              label: 'Rasio Kelulusan',
              data: [0, 0],
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              borderColor: 'rgba(255, 99, 132, 1)',
              borderWidth: 1
            }];
          }

          let firstEntry = data[0];
          let lastEntry = data[data.length - 1];

          let tepatWaktu = (parseInt(lastEntry[1] || 0) / parseInt(firstEntry[1] || 1) * 100).toFixed(2);
          let keberhasilanStudi = (parseInt(lastEntry[8] || 0) / parseInt(firstEntry[8] || 1) * 100).toFixed(2);

          return [{
            label: 'Rasio Kelulusan',
            data: [parseFloat(tepatWaktu), parseFloat(keberhasilanStudi)],
            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
            borderWidth: 1
          }];
        }
      });
    </script>
  @endsection
