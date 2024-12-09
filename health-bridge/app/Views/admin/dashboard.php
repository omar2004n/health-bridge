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
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Worldwide Sales</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Sales & Revenue</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Sales Chart End -->

<?= $this->endSection() ?>
