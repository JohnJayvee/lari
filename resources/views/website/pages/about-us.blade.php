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

                    <div class="container-fluid banner">
                        {{-- banner --}}
                        <div class="row  p-5">
                            <div class="col-4">
                                <h1 style="color: #FFFFFF;">About Us</h1>
                                <p>Lari App is associated with L.A.R.I. Customer Assistance Service, a company that truly understands how a “REAL RESPONSE” is needed to help make that dream a reality.</p>
                            </div>
                        </div>
                    </div>



                    <div class="container">
                     {{-- features --}}
                        <div class="section-2 container-fluid">
                            <div class="text-center p-5" style="color: #D81A28;"><h1>Our Story</h1></div>
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p><strong style="color: #D81A28;">An inspiration</strong> to create a better and safer community hit the founder of the company back in 2013 when he was working as a call center agent and have noticed that there needs to be a better connection between people and the authorities in the Philippines.</p>
                                    </div>
                                    <div class="col-6   d-flex justify-content-end">
                                        <div class="card  ">
                                            <img src="{{ asset('assets/img/detail-img-1.png') }}" alt="sample lari img">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6   d-flex justify-content-start">
                                        <div class="card">
                                            <img src="{{ asset('assets/img/detail-img-1.png') }}" alt="sample lari img">
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-center ">
                                        <p><strong style="color: #D81A28;">Fast forward to today,</strong> the story continues with two ordinary individuals dreaming to build a company that would help make a better community for everybody, and ultimately a great country which every Filipino would be proud of.</p>
                                    </div>
                                </div>
                        </div>
                    </div>


                    <div class="company-info">
                        <div class="row">
                            <div class="col-6 p-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('assets/img/logo.png') }}" alt="Company Logo" class="logo pb-4">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                Thus creating <strong>L.A.R.I. Customer Assistance Service</strong>, a company that truly understands how a <strong>“REAL RESPONSE”</strong> is needed to help make that dream a reality.
                                            </p>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-6 d-flex align-items-center ">
                                <div class="phones">
                                    <img src="{{ asset('assets/img/2phone-img.png') }}" alt="sample lari 2 img">
                                </div>                           
                            </div>
                        </div>
                    </div>

                    <div class="row section-3">
                        <div class="col-6 ">
                            <img src="{{ asset('assets/img/mission-and-vision.png') }}" alt="Mission and Vision"/>
                        </div>
            
                        <div class="col-6 align-self-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 mt-5 w-75">
                                        <h1 style="color: #D81A28;">Mission</h1>
                                        <p>To be more than just a company that provides assistance to our clienteles but a “real caring response” to situations needing support.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-3 mt-5 w-75">
                                        <h1 style="color: #D81A28;">Vision</h1>
                                        <p>In the next 5 years we aim to make our company synonymous with “SAFETY” and “GUARANTEE”. We envision ourselves as the “new normal” in safety and security in the Philippines.</p>
                                    </div>
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


