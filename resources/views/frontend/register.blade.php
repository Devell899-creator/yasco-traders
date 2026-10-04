<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account - YASCO Traders</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.10);
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #222;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #007bff;
        }

        .register-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .register-btn:hover {
            background: #0056b3;
        }

        .errors {
            background: #ffe6e6;
            color: #d00;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .errors ul {
            padding-left: 20px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .register-container {
                padding: 25px 20px;
            }

            .register-container h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="register-container">

        <h2>Create Account</h2>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('frontend.register.submit') }}">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number"
                    required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="register-btn">
                Create Account
            </button>
        </form>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('frontend.login') }}">Login</a>
        </div>

    </div>

</body>

</html>