<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | YASCO Traders</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,.12);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo h1 {
            margin: 0;
            color: #222;
            font-size: 28px;
        }

        .logo p {
            margin-top: 5px;
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #e63946;
        }

        .error {
            margin-bottom: 15px;
            padding: 10px;
            background: #ffe5e5;
            color: #c1121f;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 6px;
            background: #e63946;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #c92f3c;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            color: #e63946;
        }

        @media (max-width: 480px) {

            .login-box {
                margin: 20px;
                padding: 25px;
            }

        }

    </style>

</head>

<body>

    <div class="login-box">

        <div class="logo">

            <h1>YASCO Traders</h1>

            <p>Admin Panel Login</p>

        </div>


        {{-- Validation Errors --}}

        @if($errors->any())

            <div class="error">

                {{ $errors->first() }}

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('admin.login.submit') }}"
        >

            @csrf


            {{-- Email --}}

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter admin email"
                    required
                >

            </div>


            {{-- Password --}}

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-btn"
            >
                Admin Login
            </button>

        </form>

    </div>

</body>

</html>