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

            background:
                radial-gradient(circle at top left,
                    #1e3a8a 0,
                    #0f172a 35%,
                    #020617 100%);

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            padding: 20px;
        }


        /* Background Decoration */

        .background-circle {
            position: fixed;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.08);

            top: -150px;
            right: -100px;

            pointer-events: none;
        }


        .background-circle-two {
            position: fixed;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background: rgba(99, 102, 241, 0.07);

            bottom: -130px;
            left: -100px;

            pointer-events: none;
        }


        /* Login Container */

        .login-wrapper {
            width: 100%;
            max-width: 430px;

            position: relative;
            z-index: 2;
        }


        .login-box {
            background: #ffffff;

            border: 1px solid rgba(255, 255, 255, 0.1);

            border-radius: 16px;

            padding: 38px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.35);
        }


        /* Logo */

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }


        .logo-icon {
            width: 55px;
            height: 55px;

            margin: 0 auto 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #4f46e5);

            color: white;

            font-size: 22px;
            font-weight: 800;

            box-shadow:
                0 8px 20px rgba(37, 99, 235, 0.25);
        }


        .logo h1 {
            margin: 0;

            color: #0f172a;

            font-size: 26px;
            font-weight: 800;

            letter-spacing: -0.5px;
        }


        .logo p {
            margin: 7px 0 0;

            color: #64748b;

            font-size: 13px;
        }


        /* Admin Badge */

        .admin-badge {
            display: inline-flex;

            align-items: center;

            margin-top: 13px;

            padding: 5px 10px;

            border-radius: 20px;

            background: #eff6ff;
            color: #2563eb;

            font-size: 11px;
            font-weight: 700;
        }


        /* Error */

        .error {
            margin-bottom: 20px;

            padding: 12px 14px;

            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #be123c;

            border-radius: 8px;

            font-size: 13px;

            line-height: 1.5;
        }


        /* Form */

        .form-group {
            margin-bottom: 19px;
        }


        .form-group label {
            display: block;

            margin-bottom: 8px;

            color: #334155;

            font-size: 13px;
            font-weight: 700;
        }


        .input-wrapper {
            position: relative;
        }


        .input-icon {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            width: 17px;
            height: 17px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #94a3b8;

            font-size: 12px;
            font-weight: 700;

            pointer-events: none;
        }


        .form-group input {
            width: 100%;

            padding: 12px 13px 12px 40px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            background: #ffffff;

            color: #0f172a;

            font-size: 14px;

            outline: none;

            transition: 0.2s;
        }


        .form-group input::placeholder {
            color: #94a3b8;
        }


        .form-group input:hover {
            border-color: #94a3b8;
        }


        .form-group input:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        /* Login Button */

        .login-btn {
            width: 100%;

            margin-top: 5px;

            padding: 13px;

            border: none;

            border-radius: 8px;

            background:
                linear-gradient(135deg,
                    #2563eb,
                    #4f46e5);

            color: white;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.2s;

            box-shadow:
                0 6px 15px rgba(37, 99, 235, 0.20);
        }


        .login-btn:hover {
            transform: translateY(-1px);

            box-shadow:
                0 8px 20px rgba(37, 99, 235, 0.28);
        }


        .login-btn:active {
            transform: translateY(0);
        }


        /* Bottom */

        .login-footer {
            margin-top: 22px;

            padding-top: 18px;

            border-top: 1px solid #e2e8f0;

            text-align: center;
        }


        .back-link {
            color: #64748b;

            text-decoration: none;

            font-size: 13px;

            transition: 0.2s;
        }


        .back-link:hover {
            color: #2563eb;
        }


        .secure-text {
            margin-top: 10px;

            color: #94a3b8;

            font-size: 11px;
        }


        /* Mobile */

        @media (max-width: 480px) {

            body {
                padding: 15px;
            }


            .login-box {
                padding: 28px 22px;

                border-radius: 13px;
            }


            .logo h1 {
                font-size: 23px;
            }


            .logo-icon {
                width: 50px;
                height: 50px;
            }

        }
    </style>

</head>


<body>


    <div class="background-circle"></div>

    <div class="background-circle-two"></div>


    <div class="login-wrapper">

        <div class="login-box">


            {{-- Logo --}}

            <div class="logo">

                <div class="logo-icon">
                    Y
                </div>

                <h1>
                    YASCO Traders
                </h1>

                <p>
                    Welcome back to your admin panel
                </p>

                <span class="admin-badge">
                    ADMIN PANEL
                </span>

            </div>


            {{-- Validation Errors --}}

            @if($errors->any())

                <div class="error">

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- Login Form --}}

            <form method="POST" action="{{ route('admin.login.submit') }}">

                @csrf


                {{-- Email --}}

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            @
                        </span>

                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter admin email" autocomplete="email" required>

                    </div>

                </div>


                {{-- Password --}}

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            •
                        </span>

                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            autocomplete="current-password" required>

                    </div>

                </div>


                {{-- Login Button --}}

                <button type="submit" class="login-btn">
                    Sign In to Admin Panel
                </button>

            </form>


            {{-- Footer --}}

            <div class="login-footer">

                <a href="{{ url('/') }}" class="back-link">
                    ← Back to YASCO Traders
                </a>

                <div class="secure-text">
                    Secure administrator access
                </div>

            </div>


        </div>

    </div>


</body>

</html>