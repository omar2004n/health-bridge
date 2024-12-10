<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="text-center text-white mb-4">My Profile</h2>

    <!-- Flash messages -->
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger"><?= session()->get('error') ?></div>
    <?php endif; ?>
    <?php if (session()->get('validation')): ?>
        <div class="alert alert-warning"><?= session()->get('validation')->listErrors() ?></div>
    <?php endif; ?>

    <!-- Profile Form -->
    <form action="/profile/update" method="post" class="p-4 bg-light shadow rounded">
        <?= csrf_field() ?>

        <h3 class="text-primary mb-4">Personal Information</h3>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                value="<?= esc($user['name']) ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control" 
                value="<?= esc($user['email']) ?>" 
                required>
        </div>

        <h3 class="text-primary mb-4">Contact Information</h3>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input 
                type="text" 
                name="phone" 
                id="phone" 
                class="form-control" 
                value="<?= esc($patient['phone'] ?? '') ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea 
                name="address" 
                id="address" 
                class="form-control" 
                rows="3"><?= esc($patient['address'] ?? '') ?></textarea>
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date:</label>
            <input 
                type="date" 
                name="birth_date" 
                id="birth_date" 
                class="form-control" 
                value="<?= esc($patient['birth_date'] ?? '') ?>">
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
