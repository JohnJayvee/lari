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
                        <div class="row section-1">
                            <div class="col-6 d-block align-items-center">
                                <div class="header">
                                    <span>Life</span><br>
                                    <span>Application</span><br>
                                    <span>Response</span><br>
                                    <span>Initiative</span>
                                </div>
                                <div class="h-desc">
                                    <span class="p-1">Putting the power of safety at your fingertips.</span>
                                </div>
                                <div class="play-btn">
                                    <a href=#>
                                        <object data="{{ asset('assets/img/playstore-button.svg') }}" type="image/svg+xml"></object>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="h-mock-banner d-flex justify-content-center">
                                    <img src="{{ asset('assets/img/mock-1.png') }}" alt="LARI Mobile Mock"/>
                                </div>
                            </div>
                        </div>
                
                    {{-- features --}}
                    <div class="row section-2">
                        <div class="text-center" style="color: #D81A28;"><h1>App Features</h1></div>
                        <p class="p-1 text-center">This app send SMS alerts in emergency situations.<br>Some of these are the app features.</p>
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <div class="card card-1">
                                <object data="{{ asset('assets/img/features-1.svg') }}" type="image/svg+xml"></object>
                                <div class="card-body">
                                    <p class="card-text text-center">Some security features like sending email verifications</p>
                                </div>
                                </div>
                        </div>
                
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <div class="card card-2">
                                <object data="{{ asset('assets/img/features-2.svg') }}" type="image/svg+xml"></object>
                                <p class="card-text text-center">This app can send notifications via email and text through out the user</p>
                            </div>
                        </div>
                
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <div class="card card-3">
                                <object data="{{ asset('assets/img/features-3.svg') }}" type="image/svg+xml"></object>
                                <p class="card-text text-center">Can track the location to sent an emergency reponse to the user</p>
                            </div>
                        </div>
                    </div>
                    </div>
                
                    {{-- mission and vision --}}
                    <div class="container-fluid">
                        <div class="row section-3">
                            <div class="col-6">
                                <img src="{{ asset('assets/img/mission-and-vision.png') }}" alt="Mission and Vision"/>
                            </div>
                
                            <div class="col-6">
                                <div class="p-3 mt-5 w-75">
                                    <h1 style="color: #D81A28;">Mission</h1>
                                    <p>To be more than just a company that provides assistance to our clienteles but a “real caring response” to situations needing support.</p>
                                </div>
                
                                <div class="p-3 mt-5 w-75">
                                    <h1 style="color: #D81A28;">Vision</h1>
                                    <p>In the next 5 years we aim to make our company synonymous with “SAFETY” and “GUARANTEE”. We envision ourselves as the “new normal” in safety and security in the Philippines.</p>
                                </div>
                            </div>
                        </div>
                
                        {{-- how to --}}
                        <div class="row section-4">
                            <div class="col-6">
                                <div class="p-3 mt-5 w-75 desc text-center d-flex justify-content-center align-items-center">
                                    <div class="card">
                                        <h5 class="p-3" style="color: #D81A28;">How to subscribe</h5>
                                        <iframe width="500" height="300" src="https://www.youtube.com/embed/0NaNQELynmU" title="How to subscribe to LARI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>
                
                                <div class="p-3 mt-5 w-75 desc text-center d-flex justify-content-center align-items-center">
                                    <div class="card">
                                        <h5 class="p-3" style="color: #D81A28;">How to use the app</h5>
                                        <iframe width="500" height="300" src="https://www.youtube.com/embed/MJT7NDSYhc8" title="How to use LARI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <img src="{{ asset('assets/img/Isolated_right_hand_with_smartphone.png') }}" alt="Mission and Vision"/>
                            </div>
                        </div>
                
                        {{-- sponsors --}}
                        <div class="row p-5 section-5">
                            <div class="col-4 p-3 mt-3">
                                <h1 style="color: #FFFFFF;">Trusted<br>Partnership</h1>
                                <p>Your support and partnership played a key role in this success, and we appreciate your participation.</p>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <div class="card text-center d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/img/Insular-Life.png') }}" alt="Insular Life"/>
                                    <a href=#>View More</a>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-start">
                                <div class="card text-center d-flex justify-content-center align-items-center">
                                    <img src=" {{ asset('assets/img/cebuana.png') }}" alt="Cebuana"/>
                                    <a href=#>View More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                
                    <div class="container">
                        {{-- Download --}}
                        <div class="row section-6">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/mock-2.png') }}" alt="LARI Mobile Mock"/>
                            </div>
                
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div>
                                    <div style="color: #D81A28;"><h1>Download Now</h1></div>
                                    <p class="pt-3">This app send SMS alerts in emergency situations, An inspiration to create a better and safer community.</p>
                                    <div class="play-btn pt-3">
                                        <a href=#>
                                            <object data="{{ asset('assets/img/playstore-button.svg') }}" type="image/svg+xml"></object>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="container-fluid">
                        {{-- plans --}}
                        <div class="row section-7">
                        <div class="text-center" style="color: #ffffff;"><h1>Subscription Plans</h1></div>
                        <p class="p-1 text-center" style="color: #ffffff;">Choose a plan that works best for you.</p>
                
                        @foreach ($plans as $list)
                            <div class="col-4 d-flex align-items-center justify-content-center">
                                <div class="card card-2">
                                    <strong class="text-center" style="color: {{ $list->PlanColor }}">{{ $list->PlanTitle }}</strong>
                                    <hr/>
                                    <h1 class="text-center p-3">{{ $list->PlanPrice }}<span> / Year</spam></h1>
                    
                                    <ul class="plan-desc">
                                            {{ $list->Description }}
                                    </ul>
                    
                                    <div class="plan-btn">
                                        <button type="button" class="btn btn-link" style="background: {{ $list->PlanColor }}">Choose Plan</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                
                    </div>
                    </div>
                
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection


