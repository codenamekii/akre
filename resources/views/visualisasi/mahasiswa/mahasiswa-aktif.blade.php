@extends('layouts.visual')
@section('content')
    <div id="hero-area" class="hero-area-bg" style="padding-top:130px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-area text-center pb-3">
                        <span class="wow fadeInUp h4 text-dark" data-wow-delay="0.3s">Data Mahasiswa Aktif {{ $jenjang }}</span>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-2 wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Jumlah Mahasiswa Aktif</th>
                                <th scope="col">Jumlah Mahasiswa Aktif (Transfer)</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
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
    document.addEventListener("DOMContentLoaded", function() {
        const jenjang = @json($jenjang);

        // Cek apakah ada elemen untuk transfer, lalu tampilkan jika jenjang S1
        const transferHeader = document.querySelector("th:nth-child(4)");
        if (jenjang === 'S1' && transferHeader) {
            transferHeader.style.display = "table-cell";
        }

        fetch("/api/google-sheet?sheet=MhsAktif")
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                return response.json();
            })
            .then(data => {
                console.log("Data dari API:", data); // Debugging

                if (!data.values || !Array.isArray(data.values)) {
                    throw new Error("Format data tidak sesuai atau kosong");
                }

                let rows = data.values.slice(2); // Abaikan 2 baris pertama (judul & header)

                if (rows.length === 0) {
                    throw new Error("Tidak ada data yang bisa ditampilkan");
                }

                $('#dataTableBody').empty();
                const labels = [];
                const jumlahMahasiswaAktif = [];
                const jumlahMahasiswaTransfer = [];

                rows.forEach((entry, index) => {
                    let tahun = entry[0] || "-";
                    let jumlahAktif = Number(entry[1]) || 0;
                    let jumlahTransfer = entry.length > 2 ? Number(entry[2]) || 0 : 0; // Hindari error jika kolom kosong

                    let row = `<tr>
                        <th scope="row">${index + 1}</th>
                        <td>${tahun}</td>
                        <td>${jumlahAktif}</td>`;

                    if (jenjang === 'S1') {
                        row += `<td>${jumlahTransfer}</td>`;
                    }

                    row += `</tr>`;
                    $('#dataTableBody').append(row);

                    labels.push(tahun);
                    jumlahMahasiswaAktif.push(jumlahAktif);
                    jumlahMahasiswaTransfer.push(jumlahTransfer);
                });

                renderChart('chart-1', 'line', labels, [
                    {
                        label: 'Jumlah Mahasiswa Aktif',
                        data: jumlahMahasiswaAktif,
                        backgroundColor: 'rgba(11, 169, 9, 0.2)',
                        borderColor: 'rgb(11, 169, 9)',
                        borderWidth: 1,
                        tension: 0.4
                    }
                ]);
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Gagal mengambil data. Periksa koneksi API.");
            });
    });

    function renderChart(canvasId, type, labels, datasets) {
        new Chart(document.getElementById(canvasId), {
            type: type,
            data: { labels: labels, datasets: datasets },
            options: { scales: { y: { beginAtZero: true } } }
        });
    }
</script>
@endsection
