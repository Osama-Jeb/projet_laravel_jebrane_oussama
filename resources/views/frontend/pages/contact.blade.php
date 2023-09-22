@extends('layouts.front_layout')

@section('content')
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>contact us</h2>
                            <p>Home <span>-</span> contact us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section padding_top">
        <div class="container">

            <div class="container d-flex align-items-center justify-content-center mb-5">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.058438495085!2d-7.536426624214571!3d33.60378817332913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cdb2f812837f%3A0xbbcfc74fbc11b2d9!2sLionsGeek!5e0!3m2!1sen!2sma!4v1695396095810!5m2!1sen!2sma"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="" action="{{ route('mailbox.store') }}" method="POST" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        placeholder='Enter Message'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @auth
                                        <input class="form-control" name="name" id="name" type="text"
                                            value="{{ $user->name }}">
                                    @else
                                        <input class="form-control" name="name" id="name" type="text"
                                            placeholder='Enter your name'>
                                    @endauth
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @auth
                                        <input class="form-control" name="email" id="email" type="email"
                                            value="{{ $user->email }}">
                                    @else
                                        <input class="form-control" name="email" id="email" type="email"
                                            placeholder='Enter email address'>
                                    @endauth
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        placeholder='Enter Subject'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn_3 button-contactForm">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>{{ $info->city }}</h3>
                            <p>{{ $info->adress }}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>{{ $info->phone }}</h3>
                            <p>{{ $info->hours }}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>{{ $info->email }}</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
