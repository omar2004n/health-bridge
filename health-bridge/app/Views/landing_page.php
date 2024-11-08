<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Name - Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        .hero {
            background: #007bff;
            color: white;
            padding: 100px 0;
        }
        .feature-icon {
            font-size: 2rem;
            color: #007bff;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1 class="display-4">Welcome to Your App Name</h1>
        <p class="lead">Easily manage appointments with doctors anytime, anywhere.</p>
        <a href="#features" class="btn btn-light btn-lg mt-3">Learn More</a>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2>Features</h2>
            <p class="text-muted">Discover how our app makes appointment management a breeze.</p>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <i class="feature-icon bi bi-calendar-check-fill"></i>
                <h3>Easy Booking</h3>
                <p>Schedule appointments with just a few clicks.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="feature-icon bi bi-person-check-fill"></i>
                <h3>Account Management</h3>
                <p>Manage your profile and view appointment history effortlessly.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="feature-icon bi bi-clock-fill"></i>
                <h3>Doctor Availability</h3>
                <p>View doctors' schedules and book at your convenience.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2>Ready to get started?</h2>
        <p class="lead">Sign up today and take control of your healthcare appointments.</p>
        <a href="#signup" class="btn btn-primary btn-lg">Get Started</a>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
