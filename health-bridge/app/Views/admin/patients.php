<?= $this->extend('admin/base_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Patients Management</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Add Patient Button -->
    <div class="text-end mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPatientModal">Add Patient</button>
    </div>

    <!-- Patients Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Birth Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($patients)): ?>
                <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td><?= esc($patient['id']) ?></td>
                        <td><?= esc($patient['name']) ?></td>
                        <td><?= esc($patient['phone']) ?></td>
                        <td><?= esc($patient['gender']) ?></td>
                        <td><?= esc($patient['address']) ?></td>
                        <td><?= esc($patient['birth_date']) ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button type="button" class="btn btn-primary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editPatientModal"
                                    data-id="<?= $patient['id'] ?>"
                                    data-name="<?= $patient['name'] ?>"
                                    data-phone="<?= $patient['phone'] ?>"
                                    data-gender="<?= $patient['gender'] ?>"
                                    data-address="<?= $patient['address'] ?>"
                                    data-birth_date="<?= $patient['birth_date'] ?>">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="<?= base_url('/admin-patients/delete/' . $patient['id']) ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No patients found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Add Patient Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('/admin-patients/add') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addPatientModalLabel">Add Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="add-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="add-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="add-phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-gender" class="form-label">Gender</label>
                        <select class="form-control" id="add-gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="add-address" class="form-label">Address</label>
                        <textarea class="form-control" id="add-address" name="address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="add-birth-date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="add-birth-date" name="birth_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Patient Modal -->
<div class="modal fade" id="editPatientModal" tabindex="-1" aria-labelledby="editPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('/admin-patients/update') . '/' ?><?= $patient['id'] ?>" method="post">
        <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editPatientModalLabel">Edit Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="edit-phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-gender" class="form-label">Gender</label>
                        <select class="form-control" id="edit-gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-address" class="form-label">Address</label>
                        <textarea class="form-control" id="edit-address" name="address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-birth-date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="edit-birth-date" name="birth_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Populate Edit Modal
    document.getElementById('editPatientModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const phone = button.getAttribute('data-phone');
        const gender = button.getAttribute('data-gender');
        const address = button.getAttribute('data-address');
        const birth_date = button.getAttribute('data-birth_date');

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-phone').value = phone;
        document.getElementById('edit-gender').value = gender;
        document.getElementById('edit-address').value = address;
        document.getElementById('edit-birth-date').value = birth_date;
    });
</script>

<?= $this->endSection() ?>
