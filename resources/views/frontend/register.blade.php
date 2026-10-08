@extends('frontend.layouts.app')

@section('title', 'Create Account | YASCO Traders')

@section('content')

    <style>
        .register-page {
            min-height: 700px;
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        .register-box {
            width: 100%;
            max-width: 480px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .08);
        }

        .register-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-heading span {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .register-heading h1 {
            color: #222;
            font-size: 32px;
            margin: 0 0 10px;
        }

        .register-heading p {
            color: #777;
            font-size: 14px;
            margin: 0;
            line-height: 1.6;
        }


        /* =========================
           ERRORS
        ========================= */

        .errors {
            background: #fff0f0;
            color: #c1121f;
            border: 1px solid #ffd5d5;
            padding: 12px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .errors ul {
            margin: 0;
            padding-left: 20px;
        }

        .errors li {
            margin: 4px 0;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #333;
            font-size: 14px;
            font-weight: 600;
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


        /* =========================
           REGISTER BUTTON
        ========================= */

        .register-btn {
            width: 100%;
            padding: 13px;
            margin-top: 5px;
            border: none;
            border-radius: 7px;
            background: #222;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .register-btn:hover {
            background: #444;
        }


        /* =========================
           LOGIN LINK
        ========================= */

        .login-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #777;
            font-size: 14px;
        }

        .login-link a {
            color: #222;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 600px) {

            .register-page {
                min-height: 650px;
                padding: 40px 15px;
            }

            .register-box {
                padding: 30px 22px;
            }

            .register-heading h1 {
                font-size: 28px;
            }

        }
    </style>


    <section class="register-page">

        <div class="register-box">


            {{-- Heading --}}

            <div class="register-heading">

                <span>Join YASCO Traders</span>

                <h1>Create Account</h1>

                <p>
                    Create your account and start shopping with YASCO Traders.
                </p>

            </div>


            {{-- Validation Errors --}}

            @if ($errors->any())

                <div class="errors">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Register Form --}}

            <form method="POST" action="{{ route('frontend.register.submit') }}">

                @csrf


                {{-- Name --}}

                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>

                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name"
                        required>

                </div>


                {{-- Email --}}

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                        required>

                </div>


                {{-- Phone --}}

                <div class="form-group">

                    <label for="phone">
                        Phone Number
                    </label>

                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                        placeholder="Enter your phone number" required>

                </div>


                {{-- Password --}}

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input type="password" id="password" name="password" placeholder="Enter password" required>

                </div>


                {{-- Confirm Password --}}

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your password" required>

                </div>


                <button type="submit" class="register-btn">
                    Create Account
                </button>

            </form>


            {{-- Login Link --}}

            <div class="login-link">

                Already have an account?

                <a href="{{ route('frontend.login') }}">
                    Login
                </a>

            </div>


        </div>

    </section>

@endsection