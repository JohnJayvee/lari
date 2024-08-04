@extends('website.templates.master')

@section('title', 'Terms and Conditions ')

<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-12 p-0">
                <div class="about-us">

                    <div class="container-fluid banner2">
                        {{-- banner --}}
                        <div class="row ps-5">
                            <div class="col-12">
                                <h1 style="color: #FFFFFF;">Terms & Conditions</h1>
                           </div>
                        </div>
                    </div>



                     {{-- features --}}
                    <div class="container-fluid terms-and-condition">
                            <div class="row">
                                <div class="col-3">
                                    <ul class="list-group">
                                        <li>
                                            <a class="tab-link list-group-item  {{ request()->route()->named('general-terms') ? 'active' : '' }}" href="{{ route('general-terms') }}"><i class=" bx bx-globe me-2"></i>General Terms</a>
                                        </li>
                                        <li>
                                            <a class="tab-link list-group-item  {{ request()->route()->named('subscription-agreement') ? 'active' : '' }}"  href="{{ route('subscription-agreement') }}"> <i class=" bx bx-edit-alt me-2"></i>Subscription Agreement</a>
                                        </li>
                                        <li>
                                            <a class="tab-link list-group-item  {{ request()->route()->named('privacy-policy') ? 'active' : '' }}"  href="{{ route('privacy-policy') }}"> <i class=" bx bx-copy-alt me-2"></i>Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a class="tab-link list-group-item  {{ request()->route()->named('insurance') ? 'active' : '' }}"  href="{{ route('insurance') }}" >   <i class=" bx bx-heart me-2"></i>Insurance</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-9">
                                    <div class="details">
                                        @yield('details')
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


