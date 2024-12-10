<?= $this->extend('admin/base_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Doctors Management</h2>

    <!-- Add New Doctor Button -->
    <div class="text-end mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctorModal">Add New Doctor</button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($doctors)): ?>
                    <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td><?= esc($doctor['id']); ?></td>
                            <td><?= esc($doctor['name']); ?></td>
                            <td><?= esc($doctor['specialty']); ?></td>
                            <td><?= esc($doctor['email']); ?></td>
                            <td><?= esc($doctor['phone']); ?></td>
                            <td>
                                <!-- Modify Button -->
                                <button 
                                    class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal" 
                                    data-id="<?= esc($doctor['id']); ?>" 
                                    data-name="<?= esc($doctor['name']); ?>" 
                                    data-specialty="<?= esc($doctor['specialty']); ?>" 
                                    data-email="<?= esc($doctor['email']); ?>" 
                                    data-phone="<?= esc($doctor['phone']); ?>">
                                    Modify
                                </button>

                                <!-- Delete Button -->
                                <form action="<?= base_url('/admin-doctors/delete/' . esc($doctor['id'])); ?>" method="post" style="display:inline;">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No doctors found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Doctor Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?= base_url('/admin-doctors/add'); ?>">
                <?= csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="add-name" class="form-label">Name</label>
                        <input type="text" name="name" id="add-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-specialty" class="form-label">Specialty</label>
                        <input type="text" name="specialty" id="add-specialty" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-email" class="form-label">Email</label>
                        <input type="email" name="email" id="add-email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="add-phone" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add Doctor</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Populate the edit modal with doctor data
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const specialty = button.getAttribute('data-specialty');
        const email = button.getAttribute('data-email');
        const phone = button.getAttribute('data-phone');

        // Fill the modal inputs with the doctor's data
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-specialty').value = specialty;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-phone').value = phone;
    });
</script>

<?= $this->endSection() ?>
