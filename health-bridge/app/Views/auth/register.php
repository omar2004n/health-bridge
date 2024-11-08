<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e3f2f9;
        }

        .register-box {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #00b894;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group label {
            color: #00cec9;
        }

        .form-control {
            border-color: #55efc4;
        }

        .form-control:focus {
            border-color: #00b894;
            box-shadow: 0 0 5px rgba(0, 184, 148, 0.5);
        }

        .btn-primary {
            background-color: #00b894;
            border-color: #00b894;
            transition: background-color 0.3s, transform 0.1s;
        }

        .btn-primary:hover {
            background-color: #00cec9;
            transform: scale(1.05);
        }

        .btn-primary:active {
            background-color: #55efc4;
            transform: scale(0.98);
        }

        a {
            color: #00cec9;
        }

        a:hover {
            color: #81ecec;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="register-box">
    <h2>Register</h2>
    
    <?php if (session()->getFlashdata('validation')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('validation')->listErrors() ?>
        </div>
    <?php endif; ?>
    
    <form action="/auth/store" method="post">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male" <?= old('gender') == 'male' ? 'selected' : '' ?>>Male</option>
                <option value="female" <?= old('gender') == 'female' ? 'selected' : '' ?>>Female</option>
                <option value="other" <?= old('gender') == 'other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address"><?= old('address') ?></textarea>
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= old('birth_date') ?>">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
    
    <p class="mt-3">Already have an account? <a href="/login">Login here</a></p>
</div>
</body>
</html>
