<?= $this->extend('admin/base_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center">Daily Patient Data</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light rounded p-4">
                <canvas id="patientChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart data
    const labels = <?= json_encode($chart_labels) ?>;
    const data = <?= json_encode($chart_data) ?>;

    // Configure the chart
    const ctx = document.getElementById('patientChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // Change to 'line' for a line chart
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Patients',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>
