<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="text-center mb-4">Contact Us</h2>

    <!-- Flash Messages -->
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>
    <?php if (session()->get('validation')): ?>
        <div class="alert alert-danger"><?= session()->get('validation')->listErrors() ?></div>
    <?php endif; ?>

    <!-- Contact Form -->
    <div class="mb-5">
        <h3>Send Us a Question</h3>
        <form action="/contacts/submit" method="post" class="p-4 bg-light shadow rounded">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="message" class="form-label">Your Question:</label>
                <textarea
                    name="message"
                    id="message"
                    rows="4"
                    class="form-control"
                    placeholder="Write your question here..."
                    required
                ><?= old('message') ?></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </form>
    </div>

    <!-- Useful Contacts -->
    <h3>Useful Contacts</h3>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?= $doctor['name'] ?></td>
                    <td><?= $doctor['email'] ?></td>
                    <td><?= $doctor['phone'] ?></td>
                    <td>Doctor</td>
                </tr>
            <?php endforeach; ?>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= $admin['name'] ?></td>
                    <td><?= $admin['email'] ?></td>
                    <td><?= $admin['phone'] ?? 'N/A' ?></td>
                    <td>Admin</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>

<?= $this->endSection() ?>
