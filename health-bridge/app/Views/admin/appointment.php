<?= $this->extend('admin/base_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Appointments</h2>
    
    <!-- Display flash messages -->
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient </th>
                    <th>Doctor </th>
                    <th>Appointment Date</th>
                    <th>Time Slot</th>
                    <th>Notes</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php if (!empty($appointments)): ?>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?= esc($appointment['id']); ?></td>
                                <td><?= esc($appointment['patient_name']); ?></td>
                                <td><?= esc($appointment['doctor_name']); ?></td>
                                <td><?= esc($appointment['appointment_date']); ?></td>
                                <td><?= esc($appointment['time_slot']); ?></td>
                                <td><?= esc($appointment['notes']); ?></td>
                                <td>
                                    <?php if ($appointment['status'] === 'confirmed'): ?>
                                        <span class="badge bg-success">Confirmed</span>
                                    <?php elseif ($appointment['status'] === 'cancelled'): ?>
                                        <span class="badge bg-danger">Canceled</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center align-middle">
                                <?php if ($appointment['status'] === 'pending'): ?>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <form action="/admin/confirm_appointment" method="post">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="appointment_id" value="<?= esc($appointment['id']); ?>">
                                            <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                                        </form>
                                        <form action="/admin/cancel_appointment" method="post">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="appointment_id" value="<?= esc($appointment['id']); ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted">No action needed</span>
                                <?php endif; ?>
                                        </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No appointments found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

        </table>
    </div>
</div>

<?= $this->endSection() ?>
