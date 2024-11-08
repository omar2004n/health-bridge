<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e3f2f9;
        }

        .login-box {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
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
<div class="login-box">
    <h2>Login</h2>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <form action="/auth/authenticate" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="/register">Register here</a></p>
</div>
</body>
</html>
