<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-fw fa-user"></i> Profile</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="clearfix"></div>
                    <div class="card mb-3" style="max-width: 640px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/images/') . $user['image'] ?>" class="img-thumbnail">
                            </div>
                            <div class="col-md-8" style="padding-top: 30px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['name']; ?></h5>
                                    <p class="card-text"><?= $user['email']; ?></p>
                                    <p class="card-text"><small class="text-muted">Terdaftar sejak
                                            <?= (new DateTime($user['date_created']))->format('d F Y'); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <hr>
                    <h4>Aktivitas Pengguna</h4>
                    <canvas id="profileBarChart" width="400" height="200"></canvas>
                    <br><br>
                    <!-- <h4>Riwayat hasil deteksi</h4>
                    <canvas id="profileLineChart" width="400" height="200"></canvas> -->

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Bar Chart - Aktivitas Pengguna
const ctxBar = document.getElementById('profileBarChart').getContext('2d');
const profileBarChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ['Login', 'Upload', 'Komentar', 'Like', 'Share'],
        datasets: [{
            label: 'Aktivitas Mingguan',
            data: [12, 19, 7, 5, 3], // ← Ganti data sesuai kebutuhan
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 99, 132, 0.7)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});

// Line Chart - Tren Harian
// const ctxLine = document.getElementById('profileLineChart').getContext('2d');
// const profileLineChart = new Chart(ctxLine, {
//     type: 'line',
//     data: {
//         labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
//         datasets: [{
//             label: 'Login Harian',
//             data: [3, 4, 2, 5, 6, 3, 1], // ← Ganti data sesuai kebutuhan
//             fill: true,
//             borderColor: 'rgba(75, 192, 192, 1)',
//             backgroundColor: 'rgba(75, 192, 192, 0.2)',
//             tension: 0.3
//         }]
//     },
//     options: {
//         responsive: true,
//         scales: {
//             y: {
//                 beginAtZero: true,
//                 ticks: {
//                     stepSize: 1
//                 }
//             }
//         }
//     }
// });
</script>