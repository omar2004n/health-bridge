<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="text-center text-white mb-4">Book an Appointment</h2>

    <!-- Flash messages for error and success -->
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger mb-3"><?= session()->get('error') ?></div>
    <?php endif; ?>
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success mb-3"><?= session()->get('success') ?></div>
    <?php endif; ?>

    <!-- Appointment booking form -->
    <form action="/appointment/book" method="post" class="p-4 bg-light shadow rounded">
        <?= csrf_field() ?>

        <h3 class="mb-4 text-center text-primary">Book an Appointment</h3>

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
            <input 
                type="date" 
                name="appointment_date" 
                id="appointment_date" 
                class="form-control" 
                min="<?= date('Y-m-d') ?>" 
                value="<?= $appointment_date ?>" 
                required 
                onchange="location.href='?date=' + this.value">
        </div>

        <div class="mb-3">
            <label for="time_slot" class="form-label">Available Time Slots:</label>
            <select name="time_slot" id="time_slot" class="form-select" required>
                <?php
                $startTime = strtotime($open_time);
                $endTime = strtotime($close_time);

                while ($startTime < $endTime) {
                    $timeSlot = date('H:i:s', $startTime); // Backend format
                    $displayTime = date('H:i', $startTime); // Frontend format
                    $isDisabled = in_array($timeSlot, $reserved_times) ? 'disabled' : '';
                    echo "<option value=\"$timeSlot\" $isDisabled>$displayTime</option>";
                    $startTime = strtotime('+1 hour', $startTime); // Increment by 1 hour
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note (Optional):</label>
            <textarea 
                name="note" 
                id="note" 
                class="form-control" 
                rows="4" 
                placeholder="Add any special requests or information..."></textarea>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Book Appointment</button>
        </div>
    </form>

</div>

<?= $this->endSection() ?>
