<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<!-- Flash messages for success or error -->
<?php if (session()->get('error')): ?>
    <div class="alert alert-danger mb-3"><?= session()->get('error') ?></div>
<?php endif; ?>
<?php if (session()->get('success')): ?>
    <div class="alert alert-success mb-3"><?= session()->get('success') ?></div>
<?php endif; ?>

<h3 class="mb-4">My Appointments</h3>

<!-- Existing Appointments Table -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($appointments) > 0): ?>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= $appointment['name'] ?> (<?= $appointment['specialty'] ?>)</td>
                        <td><?= $appointment['appointment_date'] ?></td>
                        <td><?= $appointment['time_slot'] ?></td>
                        <td><?= ucfirst($appointment['status']) ?></td>
                        <td>
                            <!-- Implement edit/delete actions as needed -->
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No appointments booked.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Form to Book a New Appointment -->
<h4 class="mt-5">Book a New Appointment</h4>
<form action="/appointments/book" method="POST" class="p-4 bg-light shadow rounded">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="doctor_id" class="form-label">Select Doctor:</label>
        <select name="doctor_id" id="doctor_id" class="form-select" required>
            <option value="" disabled selected>Select a Doctor</option>
            <?php foreach ($doctors as $doctor): ?>
                <option value="<?= $doctor['id'] ?>"><?= $doctor['name'] ?> (<?= $doctor['specialty'] ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="appointment_date" class="form-label">Select Date:</label>
        <input type="date" name="appointment_date" id="appointment_date" class="form-control" min="<?= date('Y-m-d') ?>" required>
    </div>

    <div class="mb-3">
        <label for="time_slot" class="form-label">Select Time Slot:</label>
        <select name="time_slot" id="time_slot" class="form-select" required>
            <!-- Populate available time slots dynamically here -->
            <option value="">Select a Time Slot</option>
            <?php foreach ($availableTimeSlots as $time): ?>
                <option value="<?= $time ?>"><?= $time ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="note" class="form-label">Note (Optional):</label>
        <textarea name="note" id="note" class="form-control" rows="4" placeholder="Add any special requests or information..."></textarea>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </div>
</form>

<?= $this->endSection() ?>
