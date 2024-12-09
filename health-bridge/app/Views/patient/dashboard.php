<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid pt-4 px-4">
    <!-- Dashboard Cards -->
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-calendar-alt fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Upcoming Appointments</p>
                    <h6 class="mb-0"><?= $upcomingAppointmentsCount ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-envelope fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Messages Sent</p>
                    <h6 class="mb-0"><?= $messagesCount ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user-md fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Doctors Available</p>
                    <h6 class="mb-0"><?= $doctorsCount ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-cogs fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Your Settings</p>
                    <a href="/settings" class="btn btn-primary btn-sm mt-1">Update Settings</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Appointments -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h5 class="mb-4">Latest Appointments</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Doctor</th>
                                <th>Specialty</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($appointments)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">No recent appointments found.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($appointments as $appointment): ?>
                                    <tr>
                                        <td><?= esc($appointment['doctor_name']) ?></td>
                                        <td><?= esc($appointment['specialty']) ?></td>
                                        <td><?= date('d-m-Y', strtotime($appointment['appointment_date'])) ?></td>
                                        <td><?= date('H:i', strtotime($appointment['time_slot'])) ?></td>
                                        <td>
                                            <span class="badge 
                                                <?= $appointment['status'] === 'pending' ? 'bg-warning' : 
                                                   ($appointment['status'] === 'cancelled' ? 'bg-danger' : 'bg-success') ?>">
                                                <?= ucfirst($appointment['status']) ?>
                                            </span>
                                        </td>
                                        <td><?= esc($appointment['notes'] ?? 'No notes') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Useful Links -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <h5 class="mb-4">Useful Contacts</h5>
                <ul class="list-unstyled">
                    <li><strong>Contact Admin:</strong> <a href="/contacts">Submit a Query</a></li>
                    <li><strong>Doctors Directory:</strong> <a href="/new_appointment">View Available Doctors</a></li>
                    <li><strong>Update Preferences:</strong> <a href="/settings">Personalize Your Account</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
