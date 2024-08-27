@extends('website.templates.master')

@section('title', 'About Us')

<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="about-us">

                        <!-- Banner Section -->
                        <div class="container-fluid banner">
                            <div class="row p-5">
                                <div class="col-12">
                                    <h1 class="text-white">About Us</h1>
                                    <p>Lari App is associated with L.A.R.I. Customer Assistance Service, a company that
                                        truly understands how a “REAL RESPONSE” is needed to help make that dream a reality.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Our Story Section -->
                        <div class="container">
                            <div class="section-2">
                                <div class="text-center p-5" style="color: #D81A28;">
                                    <h1>Our Story</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-center mb-4">
                                        <p><strong style="color: #D81A28;">An inspiration</strong> to create a better and
                                            safer community hit the founder of the company back in 2013 when he was working
                                            as a call center agent and noticed the need for a better connection between
                                            people and the authorities in the Philippines.</p>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end mb-4">
                                        <div class="card">
                                            <img src="{{ asset('assets/img/detail-img-1.png') }}" alt="sample lari img"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-start mb-4">
                                        <div class="card">
                                            <img src="{{ asset('assets/img/detail-img-1.png') }}" alt="sample lari img"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center mb-4">
                                        <p><strong style="color: #D81A28;">Fast forward to today,</strong> the story
                                            continues with two ordinary individuals dreaming to build a company that would
                                            help make a better community for everybody, and ultimately a great country which
                                            every Filipino would be proud of.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Company Info Section -->
                        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="row" style="margin: 0;">
                                <!-- Column for Logo -->
                                <div class="col-lg-6 mb-4"
                                    style="display: flex; flex-direction: column; align-items: flex-start; padding-bottom: 15px;">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="Company Logo" class="img-fluid"
                                        style="max-width: 200px; height: auto; margin-bottom: 15px;">
                                    <p style="margin: 0; color: #000000;">Thus creating <strong>L.A.R.I. Customer Assistance
                                            Service</strong>, a company that truly understands how a <strong>“REAL
                                            RESPONSE”</strong> is needed to help make that dream a reality.</p>
                                </div>
                                <!-- Column for Phone Image -->
                                <div class="col-lg-6 mb-4"
                                    style="display: flex; align-items: center; justify-content: center; padding-bottom: 15px;">
                                    <img src="{{ asset('assets/img/2phone-img.png') }}" alt="sample lari 2 img"
                                        style="max-width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>




                        <!-- Mission and Vision Section -->
                        <div class="container">
                            <div class="row section-3">
                                <div class="col-md-6 mb-4">
                                    <img src="{{ asset('assets/img/mission-and-vision.png') }}" alt="Mission and Vision"
                                        class="img-fluid">
                                </div>
                                <div class="col-md-6 d-flex flex-column align-items-start">
                                    <div class="p-3 mt-3">
                                        <h1 style="color: #D81A28;">Mission</h1>
                                        <p>To be more than just a company that provides assistance to our clienteles but a
                                            “real caring response” to situations needing support.</p>
                                    </div>
                                    <div class="p-3 mt-3">
                                        <h1 style="color: #D81A28;">Vision</h1>
                                        <p>In the next 5 years we aim to make our company synonymous with “SAFETY” and
                                            “GUARANTEE”. We envision ourselves as the “new normal” in safety and security in
                                            the Philippines.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
