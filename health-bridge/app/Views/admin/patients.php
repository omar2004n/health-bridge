<?= $this->extend('admin/base_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
<div class="row mb-4 align-items-center">
    <div class="col-md-12 text-center">
        <h2 class="mb-0">Patients Management</h2>
    </div>
    <div class="col-md-12 text-end">
        <!-- Add Patient Button -->
        <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addPatientModal">Add Patient</button>
    </div>
</div>


    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Patients Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th class="text-center">Actions</th>
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
                            <td class="text-center">
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-sm btn-primary me-1" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editPatientModal"
                                        data-id="<?= $patient['id'] ?>"
                                        data-name="<?= $patient['name'] ?>"
                                        data-phone="<?= $patient['phone'] ?>"
                                        data-gender="<?= $patient['gender'] ?>"
                                        data-address="<?= $patient['address'] ?>"
                                        >
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                <form action="<?= base_url('/admin-patients/delete/' . $patient['id']) ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
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
</div>

<!-- Add Patient Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('/admin-patients/add') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addPatientModalLabel">Add Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6 mb-3">
                        <label for="add-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="add-name" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="add-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="add-phone" name="phone" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="add-gender" class="form-label">Gender</label>
                        <select class="form-control" id="add-gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="add-birth-date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="add-birth-date" name="birth_date" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="add-address" class="form-label">Address</label>
                        <textarea class="form-control" id="add-address" name="address" rows="2" required></textarea>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('/admin-patients/update') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="editPatientModalLabel">Edit Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="col-md-6 mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="edit-phone" name="phone" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-gender" class="form-label">Gender</label>
                        <select class="form-control" id="edit-gender" name="gender" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit-birth-date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="edit-birth-date" name="birth_date" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="edit-address" class="form-label">Address</label>
                        <textarea class="form-control" id="edit-address" name="address" rows="2" required></textarea>
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
