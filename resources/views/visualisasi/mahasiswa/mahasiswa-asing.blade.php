@extends('layouts.visual')
@section('content')
  <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="hero-area text-center pb-3">
            <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Mahasiswa Asing</span>
          </div>
        </div>
      </div>
      <div class="col-lg-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
        <table class="table table-striped table-hover border">
          <thead>
            <tr>
              <th>No</th>
              <th>Tahun</th>
              <th>Prodi Mesin</th>
              <th>Prodi Industri</th>
              <th>Prodi Elektro</th>
              <th>Prodi Informatika</th>
              <th>Prodi Sipil</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="dataTableBody">
            <tr>
              <td colspan="8" class="text-center">Memuat data...</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <a href="/visualisasi" class="btn btn-success wow fadeInRight" data-wow-delay="0.3s">
            <i class="bi bi-chevron-double-left"></i> Kembali
          </a>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      $(document).ready(function() {
        let apiUrl =
          'https://sheets.googleapis.com/v4/spreadsheets/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/values/lainnya!A3:G7?key=AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';

        $.ajax({
          url: apiUrl,
          method: 'GET',
          dataType: 'json',
          success: function(response) {
            let data = response.values;
            let tableBody = $('#dataTableBody');
            tableBody.empty(); // Kosongkan tabel sebelum memasukkan data

            data.forEach((row, index) => {
              let tahun = row[0];
              let mesin = row[1];
              let industri = row[2];
              let elektro = row[3];
              let informatika = row[4];
              let sipil = row[5];
              let total = row[6];

              let newRow = `<tr>
                <td>${index + 1}</td>
                <td>${tahun}</td>
                <td>${mesin}</td>
                <td>${industri}</td>
                <td>${elektro}</td>
                <td>${informatika}</td>
                <td>${sipil}</td>
                <td>${total}</td>
              </tr>`;

              tableBody.append(newRow);
            });
          },
          error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
            $('#dataTableBody').html('<tr><td colspan="8" class="text-center text-danger">Gagal memuat data</td></tr>');
          }
        });
      });
    </script>
@endsection
