<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,900">
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: "Lato", sans-serif;
            margin: 0;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background: white;
            padding: 2rem;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .header-logo img {
            width: 50px;
            margin-right: 10px;
        }

        .header-logo span {
            font-size: 32px;
            color: #3ed1cc;
            font-weight: 900;
        }

        .login-title {
            text-align: center;
            font-weight: 900;
            font-size: 24px;
            margin-bottom: 1rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 400;
            font-size: 14px;
            color: #999;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        .login-btn {
            width: 100%;
            background-color: #3ed1cc;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #00b894;
        }

        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 1rem;
            font-size: 14px;
            color: #3ed1cc;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="header-logo">
            <img src="https://via.placeholder.com/50" alt="Logo">
            <span>Health Bridge</span>
        </div>
        <h2 class="login-title">Login</h2>
        <form action="/authenticate" method="POST">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn">Log In</button>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
