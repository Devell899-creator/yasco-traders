@extends('frontend.layouts.app')

@section('title', 'Contact Us | YASCO Traders')

@section('content')

    <style>
        .contact-banner {
            background: #e63946;
            color: #fff;
            text-align: center;
            padding: 60px 20px;
        }

        .contact-banner h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .contact-banner p {
            font-size: 18px;
        }

        .contact-section {
            max-width: 1200px;
            margin: 60px auto;
            display: flex;
            gap: 40px;
            padding: 20px;
        }

        .contact-form,
        .contact-info {
            flex: 1;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
        }

        .contact-form h2,
        .contact-info h2 {
            margin-bottom: 20px;
            color: #222;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-form button {
            background: #e63946;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background: #c92f3b;
        }

        .contact-info p {
            color: #555;
            margin-bottom: 12px;
            line-height: 1.8;
        }

        .contact-info h3 {
            margin-top: 25px;
            margin-bottom: 10px;
            color: #222;
        }

        .map-section {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        .map-section h2 {
            color: #222;
        }

        .map-box {
            margin-top: 20px;
            height: 350px;
            background: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            color: #555;
            font-size: 20px;
        }

        @media(max-width:768px) {

            .contact-section {
                flex-direction: column;
            }

            .contact-banner h1 {
                font-size: 30px;
            }

            .contact-form,
            .contact-info {
                width: 100%;
            }

            .map-box {
                height: 250px;
            }

        }
    </style>


    <section class="contact-banner">

        <h1>Contact Us</h1>

        <p>
            We're Here To Help You
        </p>

    </section>


    <section class="contact-section">

        {{-- Contact Form --}}
        <div class="contact-form">

            <h2>Send Us A Message</h2>

            <form action="{{ route('frontend.contact.store') }}" method="POST">
                @csrf

                <input type="text" name="name" placeholder="Your Name">

                <input type="email" name="email" placeholder="Your Email">

                <input type="text" name="phone" placeholder="Phone Number">

                <input type="text" name="subject" placeholder="Subject">

                <textarea name="message" placeholder="Your Message"></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>


        {{-- Contact Information --}}
        <div class="contact-info">

            <h2>Contact Information</h2>

            <p>
                <strong>Company:</strong>
                YASCO Traders
            </p>

            <p>
                <strong>Phone:</strong>
                +92 300 1234567
            </p>

            <p>
                <strong>Email:</strong>
                info@yascotraders.com
            </p>

            <p>
                <strong>Address:</strong>
                Gujranwala, Pakistan
            </p>

            <h3>Business Hours</h3>

            <p>
                Monday - Saturday
            </p>

            <p>
                09:00 AM - 07:00 PM
            </p>

        </div>

    </section>


    <section class="map-section">

        <h2>Our Location</h2>

        <div class="map-box">
            Google Map Here
        </div>

    </section>

@endsection