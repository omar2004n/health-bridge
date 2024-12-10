<?= $this->extend('patient/base_layout') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="text-center text-primary mb-4">Settings</h2>

    <!-- Flash messages for error and success -->
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success"><?= session()->get('success') ?></div>
    <?php endif; ?>
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger"><?= session()->get('error') ?></div>
    <?php endif; ?>

    <!-- Settings Form -->
    <form action="/settings/update" method="post" class="p-4 bg-light shadow rounded">
        <?= csrf_field() ?>
        
        <div class="mb-4">
            <h4 class="text-primary">Notification Preferences</h4>
            <div class="form-check">
                <input 
                    type="radio" 
                    name="notification_preference" 
                    value="email" 
                    id="notify_email" 
                    class="form-check-input" 
                    <?= $settings['notification_preference'] === 'email' ? 'checked' : '' ?>>
                <label for="notify_email" class="form-check-label">Email Notifications</label>
            </div>
            <div class="form-check">
                <input 
                    type="radio" 
                    name="notification_preference" 
                    value="sms" 
                    id="notify_sms" 
                    class="form-check-input" 
                    <?= $settings['notification_preference'] === 'sms' ? 'checked' : '' ?>>
                <label for="notify_sms" class="form-check-label">SMS Notifications</label>
            </div>
            <div class="form-check">
                <input 
                    type="radio" 
                    name="notification_preference" 
                    value="none" 
                    id="notify_none" 
                    class="form-check-input" 
                    <?= $settings['notification_preference'] === 'none' ? 'checked' : '' ?>>
                <label for="notify_none" class="form-check-label">No Notifications</label>
            </div>
        </div>

        <div class="mb-4">
            <h4 class="text-primary">Theme Preferences</h4>
            <select name="theme_preference" class="form-select">
                <option value="light" <?= $settings['theme_preference'] === 'light' ? 'selected' : '' ?>>Light Theme</option>
                <option value="dark" <?= $settings['theme_preference'] === 'dark' ? 'selected' : '' ?>>Dark Theme</option>
            </select>
        </div>

        <div class="mb-4">
            <h4 class="text-primary">Language Preferences</h4>
            <select name="language_preference" class="form-select">
                <option value="en" <?= $settings['language_preference'] === 'en' ? 'selected' : '' ?>>English</option>
                <option value="fr" <?= $settings['language_preference'] === 'fr' ? 'selected' : '' ?>>French</option>
                <option value="es" <?= $settings['language_preference'] === 'es' ? 'selected' : '' ?>>Spanish</option>
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Save Settings</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
