@extends('frontend.layouts.app')

@section('title', 'Login | YASCO Traders')

@section('content')

    <div style="
        max-width: 450px;
        margin: 60px auto;
        padding: 30px;0
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,.1);
        border-radius: 10px;
    ">

        <h2 style="color:#222; text-align:center; margin-bottom:25px;">
            Login
        </h2>

        <form method="POST" action="{{ route('frontend.login.submit') }}">
            @csrf

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                style="width:100%; padding:12px; margin-bottom:15px;">

            <input type="password" name="password" placeholder="Password" required
                style="width:100%; padding:12px; margin-bottom:15px;">

            <button type="submit" style="
                    width:100%;
                    padding:12px;
                    background:#e63946;
                    color:white;
                    border:none;
                    border-radius:5px;
                    cursor:pointer;
                ">
                Login
            </button>

        </form>

    </div>

@endsection