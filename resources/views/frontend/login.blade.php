@extends('frontend.layouts.app')

@section('title', 'Login | YASCO Traders')

@section('content')

    <style>
        .login-page {
            min-height: 650px;
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        .login-box {
            width: 100%;
            max-width: 440px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .08);
        }

        .login-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-heading span {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .login-heading h1 {
            color: #222;
            font-size: 32px;
            margin: 0 0 10px;
        }

        .login-heading p {
            color: #777;
            font-size: 14px;
            margin: 0;
        }

        .error-message {
            background: #fff0f0;
            color: #c1121f;
            border: 1px solid #ffd5d5;
            padding: 12px 14px;
            margin-bottom: 20px;
            border-radius: 7px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #333;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition: .3s;
        }

        .form-group input:focus {
            border-color: #222;
            box-shadow: 0 0 0 2px rgba(34, 34, 34, .05);
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            background: #222;
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            margin-top: 5px;
        }

        .login-btn:hover {
            background: #444;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #777;
            font-size: 14px;
        }

        .register-link a {
            color: #222;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {

            .login-page {
                min-height: 600px;
                padding: 40px 15px;
            }

            .login-box {
                padding: 30px 22px;
            }

            .login-heading h1 {
                font-size: 28px;
            }

        }
    </style>


    <section class="login-page">

        <div class="login-box">


            {{-- Heading --}}

            <div class="login-heading">

                <span>Welcome Back</span>

                <h1>Login</h1>

                <p>
                    Sign in to your YASCO Traders account.
                </p>

            </div>


            {{-- Errors --}}

            @if($errors->any())

                <div class="error-message">

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- Login Form --}}

            <form method="POST" action="{{ route('frontend.login.submit') }}">

                @csrf


                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                        required>

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input type="password" id="password" name="password" placeholder="Enter your password" required>

                </div>


                <button type="submit" class="login-btn">
                    Login
                </button>

            </form>


            {{-- Register Link --}}

            <div class="register-link">

                Don't have an account?

                <a href="{{ route('frontend.register') }}">
                    Create Account
                </a>

            </div>


        </div>

    </section>

@endsection