<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Health Bridge - Patient Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('admin/img/favicon.ico') ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('admin/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('admin/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('admin/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-heartbeat me-2"></i>Health Bridge</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="admin/img/user.jpg" alt="Patient Image" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">John Doe</h6>
                        <span>Patient</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="#" class="nav-item nav-link" data-url="/personal-space"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="#" class="nav-item nav-link" data-url="/book-appointment"><i class="fa fa-calendar-check me-2"></i>Appointments</a>
                    <a href="#" class="nav-item nav-link" data-url="medical-history.html"><i class="fa fa-file-medical me-2"></i>Medical History</a>
                    <a href="#" class="nav-item nav-link" data-url="prescriptions.html"><i class="fa fa-prescription me-2"></i>Prescriptions</a>
                    <a href="#" class="nav-item nav-link" data-url="settings.html"><i class="fa fa-cogs me-2"></i>Settings</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Messages</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="admin/img/user.jpg" alt="User" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Doctor sent you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all messages</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="admin/img/user.jpg" alt="Patient Image" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile.html" class="dropdown-item">My Profile</a>
                            <a href="/settings" class="dropdown-item">Settings</a>
                            <a href="/logout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Center Section (Dynamic Content) -->
            <div id="content-container" class="container-fluid pt-4 px-4">
                <!-- Overview Section Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-calendar-check fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Upcoming Appointments</p>
                                <h6 class="mb-0">2</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-file-medical fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Medical Records</p>
                                <h6 class="mb-0">12</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-prescription fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Active Prescriptions</p>
                                <h6 class="mb-0">3</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-heartbeat fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Health Score</p>
                                <h6 class="mb-0">85%</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Overview Section End -->

            <!-- Recent Activity Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Medical Activity</h6>
                        <a href="medical-history.html">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Date</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2024-11-05</td>
                                    <td>Dr. Sarah Johnson</td>
                                    <td>Cardiology</td>
                                    <td>Routine heart check-up</td>
                                </tr>
                                <tr>
                                    <td>2024-10-28</td>
                                    <td>Dr. Ahmed Khan</td>
                                    <td>Dermatology</td>
                                    <td>Skin rash consultation</td>
                                </tr>
                                <tr>
                                    <td>2024-10-15</td>
                                    <td>Dr. Emily Davis</td>
                                    <td>Orthopedics</td>
                                    <td>Follow-up for knee injury</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Activity End -->

            </div>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Health Bridge</a>, All Rights Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    // Handle Sidebar Menu Click
    $('.nav-item.nav-link').on('click', function(e) {
        e.preventDefault(); // Prevent default navigation

        var url = $(this).data('url'); // Get the URL from data-url attribute

        // Show the loading spinner
        $('#spinner').addClass('show');

        // Make an AJAX request to load content
        $.ajax({
            url: url, // The URL to load content from
            method: 'GET',
            success: function(response) {
                // Replace the content of #content-container with the new content
                $('#content-container').html(response);

                // Update the browser's URL without reloading the page
                history.pushState(null, '', url);

                // Hide the loading spinner
                $('#spinner').removeClass('show');
            },
            error: function() {
                // Handle errors (optional)
                $('#spinner').removeClass('show');
                alert("Error loading the page. Please try again.");
            }
        });
    });

    // Handle Back/Forward browser navigation (optional)
    window.onpopstate = function() {
        location.reload(); // Reload the page to handle back/forward
    };
});

    </script>
    <script src="<?= base_url('admin/js/main.js') ?>"></script>
</body>
</html>
