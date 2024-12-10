<?= $this->extend('admin/base_layout') ?>

<?= $this->section('content') ?>

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Today Patient -->
        <div class="col-12 col-md-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Patient</p>
                    <h6 class="mb-0"><?= $today_appointments ?></h6>
                </div>
            </div>
        </div>

        <!-- Total Doctors -->
        <div class="col-12 col-md-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user-md fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Doctors</p>
                    <h6 class="mb-0"><?= $total_doctors ?></h6>
                </div>
            </div>
        </div>

        <!-- Today Earnings -->
        <div class="col-12 col-md-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-dollar-sign fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Earnings</p>
                    <h6 class="mb-0"><?= $today_appointments * 200 ?> DH</h6>
                </div>
            </div>
        </div>

        <!-- Month Earnings -->
        <div class="col-12 col-md-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-dollar-sign fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Month Earnings</p>
                    <h6 class="mb-0"><?= $month_appointments * 200 ?> DH</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Patients Chart -->
        <div class="col-sm-12 col-xl-8 mx-auto">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 text-center mx-auto">Patients Per Day</h6>
                </div>
                <canvas id="patients-chart" class="mx-auto" width="600" height="300"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Sales Chart End -->

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dynamic Data (Fetch this from the backend)
    const labels = <?= json_encode($chart_labels) ?>; // Days or dates
    const data = <?= json_encode($chart_data) ?>;    // Patient count

    const ctx = document.getElementById('patients-chart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Patients Per Day',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Daily Patient Data'
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Days'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Patients'
                    }
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>
