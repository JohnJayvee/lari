@extends('templates.master')
<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <span>Total Managers</span>
                  <h2 class="card-title text-nowrap mb-1 text-center py-2">{{ $total_managers }}</h2>
                </div>
              </div>
            </div>


            <div class="col-lg-4 col-md-12 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <span>Total Customers</span>
                  <h2 class="card-title text-nowrap mb-1 text-center py-2">{{ $total_customers }}</h2>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <span>Total Sales</span>
                  <h2 class="card-title text-nowrap mb-1 text-center py-2">{{ '₱ '.number_format( $total_sales, 2, '.', ',') }}</h2>
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