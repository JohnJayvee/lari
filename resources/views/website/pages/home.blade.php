@extends('website.templates.master')

@section('title', 'Home')

<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="home">
                        {{-- banner --}}
                        <div class="container">
                            <div class="row section-1 align-items-center">
                                <div class="col-md-6 col-12 text-md-left text-center mb-4 mb-md-0">
                                    <div class="header">
                                        <span>Life</span><br>
                                        <span>Application</span><br>
                                        <span>Response</span><br>
                                        <span>Initiative</span>
                                    </div>
                                    <div class="h-desc">
                                        <span class="p-1 d-block">Putting the power of safety at your fingertips.</span>
                                    </div>
                                    <div class="play-btn mt-3">
                                        <a href="#">
                                            <object data="{{ asset('assets/img/playstore-button.svg') }}"
                                                type="image/svg+xml"></object>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12 text-center">
                                    <div class="h-mock-banner d-flex justify-content-center">
                                        <img src="{{ asset('assets/img/mock-1.png') }}" alt="LARI Mobile Mock"
                                            class="img-fluid" />
                                    </div>
                                </div>
                            </div>

                            {{-- features --}}
                            <div class="row section-2 text-center">
                                <div class="col-12">
                                    <h1 style="color: #D81A28;">App Features</h1>
                                    <p class="p-1">This app sends SMS alerts in emergency situations.<br>Some of these
                                        are the app features.</p>
                                </div>

                                <div class="col-md-4 col-12 d-flex align-items-center justify-content-center mb-4">
                                    <div class="card card-1">
                                        <object data="{{ asset('assets/img/features-1.svg') }}"
                                            type="image/svg+xml"></object>
                                        <div class="card-body">
                                            <p class="card-text">Some security features like sending email verifications</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12 d-flex align-items-center justify-content-center mb-4">
                                    <div class="card card-2">
                                        <object data="{{ asset('assets/img/features-2.svg') }}"
                                            type="image/svg+xml"></object>
                                        <p class="card-text">This app can send notifications via email and text throughout
                                            the user</p>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12 d-flex align-items-center justify-content-center mb-4">
                                    <div class="card card-3">
                                        <object data="{{ asset('assets/img/features-3.svg') }}"
                                            type="image/svg+xml"></object>
                                        <p class="card-text">Can track the location to send an emergency response to the
                                            user</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- mission and vision --}}
                        <div class="container-fluid">
                            <div class="row section-3 align-items-center">
                                <div class="col-md-6 col-12 text-center mb-4 mb-md-0">
                                    <img src="{{ asset('assets/img/mission-and-vision.png') }}" alt="Mission and Vision"
                                        class="img-fluid" />
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="p-3 w-md-75">
                                        <h1 style="color: #D81A28;">Mission</h1>
                                        <p>To be more than just a company that provides assistance to our clienteles but a
                                            “real caring response” to situations needing support.</p>
                                    </div>

                                    <div class="p-3 mt-5 w-md-75">
                                        <h1 style="color: #D81A28;">Vision</h1>
                                        <p>In the next 5 years, we aim to make our company synonymous with “SAFETY” and
                                            “GUARANTEE”. We envision ourselves as the “new normal” in safety and security in
                                            the Philippines.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- how to --}}
                            <div class="pt-12 row section-4 align-items-center">
                                <div class="col-md-6 col-12 text-center mb-4 mb-md-0">
                                    <div class="card w-100 p-3">
                                        <h5 style="color: #D81A28;">How to subscribe</h5>
                                        <iframe class="w-100" height="300"
                                            src="https://www.youtube.com/embed/0NaNQELynmU" title="How to subscribe to LARI"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12 text-center">
                                    <div class="card w-100 p-3">
                                        <h5 style="color: #D81A28;">How to use the app</h5>
                                        <iframe class="w-100" height="300"
                                            src="https://www.youtube.com/embed/MJT7NDSYhc8" title="How to use LARI"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                            {{-- sponsors --}}
                            {{-- <div class="row p-5 section-5 align-items-center">
                                <div class="col-lg-4 col-md-12 text-center text-lg-left p-3 mt-3">
                                    <h1 style="color: #FFFFFF;">Trusted<br>Partnership</h1>
                                    <p>Your support and partnership played a key role in this success, and we appreciate
                                        your participation.</p>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-end">
                                    <div class="card text-center d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('assets/img/Insular-Life.png') }}" alt="Insular Life"
                                            class="img-fluid" />
                                        <a href="#">View More</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-start">
                                    <div class="card text-center d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('assets/img/cebuana.png') }}" alt="Cebuana" class="img-fluid" />
                                        <a href="#">View More</a>
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                        <div class="container">
                            {{-- Download --}}
                            <div class="row section-6 align-items-center">
                                <div class="col-md-6 col-12 text-center mb-4 mb-md-0">
                                    <img src="{{ asset('assets/img/mock-2.png') }}" alt="LARI Mobile Mock"
                                        class="img-fluid" />
                                </div>

                                <div class="col-md-6 col-12 text-center text-md-left">
                                    <div>
                                        <h1 style="color: #D81A28;">Download Now</h1>
                                        <p class="pt-3">This app sends SMS alerts in emergency situations, an inspiration
                                            to create a better and safer community.</p>
                                        <div class="play-btn pt-3">
                                            <a href="#">
                                                <object data="{{ asset('assets/img/playstore-button.svg') }}"
                                                    type="image/svg+xml"></object>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            {{-- plans --}}
                            {{-- <div class="row section-7">
                                <div class="col-12 text-center text-white mb-3">
                                    <h1>Subscription Plans</h1>
                                    <p>Choose a plan that works best for you.</p>
                                </div>

                                @foreach ($plans as $list)
                                    <div class="col-md-4 col-12 d-flex align-items-center justify-content-center mb-4">
                                        <div class="card card-2 w-100 text-center">
                                            <strong style="color: {{ $list->PlanColor }}">{{ $list->PlanTitle }}</strong>
                                            <hr />
                                            <h1 class="p-3">{{ $list->PlanPrice }}<span> / Year</span></h1>

                                            <ul class="plan-desc list-unstyled">
                                                {{ $list->Description }}
                                            </ul>

                                            <div class="plan-btn">
                                                <button type="button" class="btn btn-link"
                                                    style="background: {{ $list->PlanColor }}">Choose Plan</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
