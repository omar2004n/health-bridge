<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Color Preferences */
        body {
            background-color: #e3f2fd;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        h2 {
            color: #00b894;
            text-align: center;
        }
        .form-label {
            color: #00b894;
            font-weight: bold;
        }
        .form-control, .form-select {
            border: 1px solid #81ecec;
            transition: 0.3s ease-in-out;
        }
        .form-control:focus, .form-select:focus {
            border-color: #00cec9;
            box-shadow: 0 0 5px rgba(0, 206, 201, 0.5);
        }
        .btn-primary {
            background-color: #00b894;
            border-color: #00b894;
        }
        .btn-primary:hover {
            background-color: #00cec9;
            border-color: #00cec9;
        }
    </style>
    <title>Register</title>
</head>
<body>

<div class="container mt-5">
    <h2>Register</h2>

                <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>



    <form action="/auth/store" method="post">
        <div class="form-group">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="form-group">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>">
        </div>

        <div class="form-group">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender">
                <option value="" disabled selected>Select your gender</option>
                <option value="male" <?= old('gender') == 'male' ? 'selected' : '' ?>>Male</option>
                <option value="female" <?= old('gender') == 'female' ? 'selected' : '' ?>>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address"><?= old('address') ?></textarea>
        </div>

        <div class="form-group">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= old('birth_date') ?>">
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
    </form>

    <p class="mt-3 text-center">Already have an account? <a href="/login" style="color: #00b894; text-decoration: underline;">Login here</a></p>
</div>

</body>
</html>
