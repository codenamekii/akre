@extends('layouts.visual')

@section('content')
<div id="hero-area" class="hero-area-bg" style="padding-top:130px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center pb-3">
                <span class="h4 text-dark">Data Mahasiswa Baru</span>
            </div>
            <div class="col-lg-12 p-2">
                <table class="table table-striped table-hover border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Prodi Mesin</th>
                            <th>Prodi Industri</th>
                            <th>Prodi Elektro</th>
                            <th>Prodi Informatika</th>
                            <th>Prodi Sipil</th>
                            <th>Jumlah Lulus Seleksi</th>
                            <th>Jumlah Mahasiswa Baru</th>
                            <th>Jumlah Mahasiswa Baru (Transfer)</th>
                        </tr>
                    </thead>
                    <tbody id="dataTableBody"></tbody>
                </table>
            </div>

            <div class="col-lg-6">
                <canvas id="chart-1"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="chart-2"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const sheetUrl = "https://docs.google.com/spreadsheets/d/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/gviz/tq?tqx=out:json&sheet=MhsBaru";
    fetch(sheetUrl)
        .then(response => response.text())
        .then(text => {
            const json = JSON.parse(text.substr(47).slice(0, -2));
            const rows = json.table.rows;

            const dataTableBody = document.getElementById("dataTableBody");
            dataTableBody.innerHTML = "";

            const labels = [];
            const jumlahLulus = [];
            const jumlahMhsBaru = [];
            const jumlahMhsTransfer = [];

            rows.forEach((row, index) => {
                const cols = row.c.map(col => (col ? col.v : "0"));
                
                dataTableBody.innerHTML += `
                    <tr>
                        <th>${index + 1}</th>
                        <td>${cols[1]}</td>
                        <td>${cols[2]}</td>
                        <td>${cols[3]}</td>
                        <td>${cols[4]}</td>
                        <td>${cols[5]}</td>
                        <td>${cols[6]}</td>
                        <td>${cols[7]}</td>
                        <td>${cols[8]}</td>
                    </tr>
                `;
                
                labels.push(cols[0]);
                jumlahLulus.push(Number(cols[6]) || 0);
                jumlahMhsBaru.push(Number(cols[7]) || 0);
                jumlahMhsTransfer.push(Number(cols[8]) || 0);
            });

            if (labels.length > 0) {
                renderChart("chart-1", "line", labels, jumlahMhsBaru, "Jumlah Mahasiswa Baru", "rgb(75, 192, 192)");
                renderChart("chart-2", "bar", labels, jumlahMhsTransfer, "Jumlah Mahasiswa Baru (Transfer)", "rgb(255, 99, 132)");
            } else {
                console.error("Data kosong atau tidak valid.");
            }
        })
        .catch(error => console.error("Error fetching data:", error));
});

function renderChart(canvasId, type, labels, data, label, color) {
    const ctx = document.getElementById(canvasId);
    if (!ctx) return;
    
    new Chart(ctx, {
        type: type,
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                backgroundColor: color + "20",
                borderColor: color,
                borderWidth: 2,
                tension: 0.4
            }]
        }
    });
}
</script>

@endsection
