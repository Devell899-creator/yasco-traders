@extends('frontend.layouts.app')

@section('title', 'Contact Us | YASCO Traders')

@section('content')

    <style>
        /* =========================
           CONTACT HERO
        ========================= */

        .contact-hero {
            background: #222;
            color: #fff;
            text-align: center;
            padding: 85px 20px;
        }

        .contact-hero span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #ccc;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .contact-hero h1 {
            font-size: 46px;
            margin: 0 0 15px;
        }

        .contact-hero p {
            color: #ccc;
            font-size: 17px;
            margin: 0;
        }


        /* =========================
           CONTACT SECTION
        ========================= */

        .contact-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 25px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 35px;
        }


        /* =========================
           FORM
        ========================= */

        .contact-form {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            padding: 35px;
        }

        .contact-form span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .contact-form h2 {
            color: #222;
            font-size: 30px;
            margin: 0 0 25px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            color: #333;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition: .3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #222;
            box-shadow: 0 0 0 2px rgba(34, 34, 34, .05);
        }

        .contact-form textarea {
            height: 140px;
            resize: vertical;
        }

        .contact-form button {
            width: 100%;
            background: #222;
            color: #fff;
            border: none;
            padding: 13px 20px;
            border-radius: 7px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .contact-form button:hover {
            background: #444;
        }


        /* =========================
           CONTACT INFORMATION
        ========================= */

        .contact-info {
            background: #f7f7f7;
            border-radius: 14px;
            padding: 35px;
        }

        .contact-info span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .contact-info h2 {
            color: #222;
            font-size: 30px;
            margin: 0 0 25px;
        }

        .info-item {
            padding: 17px 0;
            border-bottom: 1px solid #ddd;
        }

        .info-item:last-of-type {
            border-bottom: none;
        }

        .info-item h3 {
            color: #222;
            font-size: 15px;
            margin: 0 0 6px;
        }

        .info-item p {
            color: #666;
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
        }

        .business-hours {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .business-hours h3 {
            color: #222;
            font-size: 17px;
            margin: 0 0 10px;
        }

        .business-hours p {
            color: #666;
            margin: 5px 0;
            font-size: 14px;
        }


        /* =========================
           MAP
        ========================= */

        .map-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 25px 80px;
        }

        .map-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .map-heading span {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #777;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .map-heading h2 {
            color: #222;
            font-size: 32px;
            margin: 0;
        }

        .map-box {
            height: 350px;
            background: #f3f3f3;
            border: 1px solid #eee;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            font-size: 18px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .contact-hero {
                padding: 60px 20px;
            }

            .contact-hero h1 {
                font-size: 34px;
            }

            .contact-section {
                grid-template-columns: 1fr;
                padding: 55px 15px;
            }

            .contact-form,
            .contact-info {
                padding: 25px;
            }

            .map-section {
                padding: 0 15px 55px;
            }

            .map-box {
                height: 250px;
            }

        }
    </style>


    {{-- =========================
    CONTACT HERO
    ========================= --}}

    <section class="contact-hero">

        <span>Get In Touch</span>

        <h1>Contact Us</h1>

        <p>
            We're here to help you with your mobile accessory needs.
        </p>

    </section>


    {{-- =========================
    CONTACT SECTION
    ========================= --}}

    <section class="contact-section">


        {{-- Contact Form --}}

        <div class="contact-form">

            <span>Send Message</span>

            <h2>How Can We Help?</h2>

            <form action="{{ route('frontend.contact.store') }}" method="POST">

                @csrf


                <div class="form-group">

                    <label for="name">
                        Your Name
                    </label>

                    <input type="text" id="name" name="name" placeholder="Enter your name">

                </div>


                <div class="form-group">

                    <label for="email">
                        Your Email
                    </label>

                    <input type="email" id="email" name="email" placeholder="Enter your email">

                </div>


                <div class="form-group">

                    <label for="phone">
                        Phone Number
                    </label>

                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number">

                </div>


                <div class="form-group">

                    <label for="subject">
                        Subject
                    </label>

                    <input type="text" id="subject" name="subject" placeholder="Enter subject">

                </div>


                <div class="form-group">

                    <label for="message">
                        Your Message
                    </label>

                    <textarea id="message" name="message" placeholder="Write your message here..."></textarea>

                </div>


                <button type="submit">
                    Send Message
                </button>

            </form>

        </div>


        {{-- Contact Information --}}

        <div class="contact-info">

            <span>Contact Details</span>

            <h2>Let's Talk</h2>


            <div class="info-item">

                <h3>Company</h3>

                <p>
                    YASCO Traders
                </p>

            </div>


            <div class="info-item">

                <h3>Phone</h3>

                <p>
                    +92 300 1234567
                </p>

            </div>


            <div class="info-item">

                <h3>Email</h3>

                <p>
                    info@yascotraders.com
                </p>

            </div>


            <div class="info-item">

                <h3>Address</h3>

                <p>
                    Gujranwala, Pakistan
                </p>

            </div>


            <div class="business-hours">

                <h3>Business Hours</h3>

                <p>
                    Monday - Saturday
                </p>

                <p>
                    09:00 AM - 07:00 PM
                </p>

            </div>

        </div>


    </section>


    {{-- =========================
    LOCATION
    ========================= --}}

    <section class="map-section">

        <div class="map-heading">

            <span>Find Us</span>

            <h2>Our Location</h2>

        </div>


        <div class="map-box">

            Google Map Here

        </div>

    </section>


@endsection