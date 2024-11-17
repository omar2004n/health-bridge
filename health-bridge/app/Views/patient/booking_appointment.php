<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #00cec9; /* Matches one of your preferred colors */
            color: white;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 0;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            width: 50px;
            margin-right: 10px;
        }
        .logo span {
            font-size: 30px;
            color: white;
            font-weight: bold;
        }
        .nav a {
            display: inline-block;
            padding: 10px 15px;
            margin-left: 20px;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            text-decoration: none;
        }
        .nav a.active {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
        }
        .menu i {
            font-size: 20px;
            cursor: pointer;
            color: white;
        }
        h2 {
            margin-top: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00b894;
            color: white;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #55efc4;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-danger {
            background-color: #e74c3c;
            color: white;
        }
        .alert-success {
            background-color: #2ecc71;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="https://images.vexels.com/media/users/3/142777/isolated/preview/84711206e52e0d4ff6c793cb476ea264-heartbeat-star-medical-logo-by-vexels.png" alt="Logo">
                <span>Sansa</span>
            </div>
            <div class="nav">
                <a href="">Blog</a>
                <a href="/register">Register</a>
                <a class="active" href="/login">Login</a>
            </div>
            <div class="menu">
                <i class="fa fa-bars"></i>
            </div>
        </header>

        <h2>Book an Appointment</h2>

        <?php if (session()->get('error')): ?>
            <div class="alert alert-danger"><?= session()->get('error') ?></div>
        <?php endif; ?>

        <?php if (session()->get('success')): ?>
            <div class="alert alert-success"><?= session()->get('success') ?></div>
        <?php endif; ?>

        <form action="/book-appointment" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="doctor_id">Select Doctor:</label>
                <select name="doctor_id" id="doctor_id" class="form-control" required>
                    <option value="">Choose a Doctor</option>
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?= $doctor['id'] ?>"><?= $doctor['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time_slot">Select Time Slot:</label>
                <select name="time_slot" id="time_slot" class="form-control" required>
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

            <button type="submit" class="btn">Book Appointment</button>
        </form>
    </div>
</body>
</html>
