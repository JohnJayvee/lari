@extends('templates.master')

<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
              <div class="col-lg-12 mb-4 ">
                <div class="card mb-4">
                  <div class="user-profile-header-banner">
                    <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                  </div>
                  <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                      <img src="{{ asset('assets/img/profile.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                      <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                          <h4>John Doe</h4>
                          <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                            <li class="list-inline-item fw-medium">
                              <i class="bx bx-pen"></i> UX Designer
                            </li>
                            <li class="list-inline-item fw-medium">
                              <i class="bx bx-map"></i> Vatican City
                            </li>
                            <li class="list-inline-item fw-medium">
                              <i class="bx bx-calendar-alt"></i> Joined April 2021
                            </li>
                          </ul>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary text-nowrap">
                          <i class="bx bx-user-check me-1"></i>Connected
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
@endsection


{{-- Tailwind  --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script defer src="{{asset('js/app.js')}}"></script>