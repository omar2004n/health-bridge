<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css"> <!-- External CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-info"> <!-- Bootstrap's bg-info for background color -->

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
        <form action="/book-appointment" method="post" class="bg-white p-4 rounded shadow-sm">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Select Doctor:</label>
                <select name="doctor_id" id="doctor_id" class="form-control">
                    <option value="">Select a Doctor</option>
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?= $doctor['id']; ?>"><?= $doctor['name']; ?> - <?= $doctor['specialty']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date:</label>
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="time_slot" class="form-label">Select Time Slot:</label>
                <select name="time_slot" id="time_slot" class="form-select" required>
                    <option value="">Choose a Time Slot</option>
                    <?php
                    $start = strtotime($open_time);
                    $end = strtotime($close_time);
                    while ($start < $end): ?>
                        <option value="<?= date('H:i', $start) ?>"><?= date('H:i', $start) ?></option>
                        <?php $start = strtotime('+30 minutes', $start); ?>
                    <?php endwhile; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Book Appointment</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>