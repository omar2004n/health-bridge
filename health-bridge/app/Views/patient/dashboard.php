<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-calendar-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Upcoming Appointments</p>
                    <h6 class="mb-0">2</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-file-medical fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Medical Records</p>
                    <h6 class="mb-0">12</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-prescription fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Active Prescriptions</p>
                    <h6 class="mb-0">3</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-heartbeat fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Health Status</p>
                    <h6 class="mb-0">Stable</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
