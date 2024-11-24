<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="text-center text-white mb-4">My Appointments</h2>

    <!-- Flash messages for success or error -->
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success mb-3"><?= session()->get('success') ?></div>
    <?php endif; ?>
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger mb-3"><?= session()->get('error') ?></div>
    <?php endif; ?>

    <!-- Filters Section -->
    <div class="row mb-4">
        <div class="col-md-4">
            <input type="text" id="searchBar" class="form-control" placeholder="Search...">
        </div>
        <div class="col-md-3">
            <select id="doctorFilter" class="form-select">
                <option value="">All Doctors</option>
                <?php foreach (array_unique(array_column($appointments, 'doctor_name')) as $doctor): ?>
                    <option value="<?= esc($doctor) ?>"><?= esc($doctor) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <select id="statusFilter" class="form-select">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <!-- Appointments Table -->
    <?php if (!empty($appointments) && is_array($appointments)): ?>
        <div class="table-responsive">
            <table id="appointmentsTable" class="table table-striped table-bordered text-center bg-light">
                <thead class="thead-dark">
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
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td class="doctor"><?= esc($appointment['doctor_name']) ?></td>
                            <td class="specialty"><?= esc($appointment['specialty']) ?></td>
                            <td><?= date('d-m-Y', strtotime($appointment['appointment_date'])) ?></td>
                            <td><?= date('H:i', strtotime($appointment['time_slot'])) ?></td>
                            <td class="status">
                                <span class="badge 
                                    <?php 
                                        if ($appointment['status'] === 'pending') echo 'bg-warning'; 
                                        elseif ($appointment['status'] === 'cancelled') echo 'bg-danger';
                                        else echo 'bg-success';
                                    ?>">
                                    <?= ucfirst($appointment['status']) ?>
                                </span>
                            </td>
                            <td class="notes"><?= esc($appointment['notes'] ?? 'No notes') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">You have no appointments yet.</div>
    <?php endif; ?>

    <!-- Link to book a new appointment -->
    <div class="text-center mt-4">
        <a href="/new_appointment" class="btn btn-primary">Book a New Appointment</a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchBar = document.getElementById("searchBar");
        const doctorFilter = document.getElementById("doctorFilter");
        const statusFilter = document.getElementById("statusFilter");
        const tableRows = document.querySelectorAll("#appointmentsTable tbody tr");

        // Function to filter rows
        function filterRows() {
            const searchTerm = searchBar.value.toLowerCase();
            const doctorValue = doctorFilter.value.toLowerCase();
            const statusValue = statusFilter.value.toLowerCase();

            tableRows.forEach(row => {
                const doctor = row.querySelector(".doctor").textContent.toLowerCase();
                const specialty = row.querySelector(".specialty").textContent.toLowerCase();
                const status = row.querySelector(".status span").textContent.toLowerCase();
                const notes = row.querySelector(".notes").textContent.toLowerCase();

                // Search matches any of the fields
                const matchesSearch = 
                    doctor.includes(searchTerm) || 
                    specialty.includes(searchTerm) || 
                    status.includes(searchTerm) || 
                    notes.includes(searchTerm);

                // Filter matches doctor and status filters
                const matchesDoctor = !doctorValue || doctor.includes(doctorValue);
                const matchesStatus = !statusValue || status.includes(statusValue);

                // Show row if all conditions match, hide otherwise
                if (matchesSearch && matchesDoctor && matchesStatus) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        // Attach event listeners
        searchBar.addEventListener("input", filterRows);
        doctorFilter.addEventListener("change", filterRows);
        statusFilter.addEventListener("change", filterRows);
    });
</script>


<?= $this->endSection() ?>
