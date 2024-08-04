@extends('templates.master')
<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
          <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                          <a class="btn btn-primary" id="back_button" href="{{ route('customers') }}"><i class="bx bx-arrow-back mx-1"></i>back</a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-1">
                            <div class="flex-shrink-0 mx-sm-0 mx-auto d-flex justify-content-center">
                              <img src="{{ asset('assets/img/profile.png') }}" alt="user image" class="d-block w-75 rounded-circle user-profile-img">
                            </div>
                            <div class="flex-grow-1 mt-2 mt-sm-5">
                              <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                  <h4>{{ $me->name }}</h4>
                                  <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item">
                                      <i class="bx bx-map"></i><span class="fw-medium mx-2 font-bold">Address:</span> {{ $me->address }}
                                    </li>
                                    <li class="list-inline-item">
                                      <i class="bx bx-calendar-alt"></i><span class="fw-medium mx-2 font-bold">Joined:</span> {{\Carbon\Carbon::parse($me->dateadded)->format('F d, Y') }} 
                                    </li>`
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-3">
                          <small class="text-muted text-uppercase">About</small>
                          <ul class="list-unstyled mb-4 mt-3 text-sm">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-medium mx-2 font-bold">Full Name:</span> <span>{{ $me->name }}</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-medium mx-2 font-bold">Status:</span> {!! $me->active == 1? '<span class="badge bg-label-success">Active</span>' : '<span class="badge bg-label-danger">Not Active</span>' !!}</li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-medium mx-2 font-bold">Role:</span> <span>{!! $me->categoryid == 1? '<span class="badge bg-label-success">'.$me->categoryname.'</span>' : '<span class="badge bg-label-warning">'.$me->categoryname.'</span>' !!}</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-medium mx-2 font-bold">Country:</span> <span>Philippines</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-medium mx-2 font-bold">Languages:</span> <span>Tagalog</span></li>
                          </ul>
                        </div>
                        <div class="col-3">
                          <small class="text-muted text-uppercase">Contacts</small>
                          <ul class="list-unstyled mb-4 mt-3 text-sm">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-medium mx-2 font-bold">Contact:</span> <span>{{ $me->contactno }}</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-medium mx-2 font-bold">Email:</span> <span>{{ $me->email }}</span></li>
                          </ul>
                        </div>
                        <div class="col-2">
                            <small class="text-muted text-uppercase">Teams</small>
                            <ul class="list-unstyled mt-3 mb-0 text-sm">
                              <li class="d-flex align-items-center mb-3"><i class="bx bx-face me-2 "></i>
                                <div class="d-flex flex-wrap"><span class="fw-medium me-2 font-bold">Members:</span><span>{{ '('.$members_count.' Persons)' }}</span></div>
                              </li>
                            </ul>
                        </div>
                        <div class="col-4">
                          <small class="text-muted text-uppercase">Subscription</small>
                          <ul class="list-unstyled mt-3 mb-0 text-sm">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-event me-2 "></i>
                              <div class="d-flex flex-wrap"><span class="fw-medium me-2 font-bold">Current Plan:</span><span class="badge bg-label-success">{{ $me->plantitle.' - ₱ '.number_format($me->planprice, 2, '.', ',')  }}</span> </div>
                            </li>
                            @if(!empty($customer_insularlifecode))
                              <li class="d-flex align-items-center mb-3"><i class="bx bx-qr me-2 "></i>
                                <div class="d-flex flex-wrap"><span class="fw-medium me-2 font-bold">Insular Life Code:</span><span class="badge bg-label-primary">{{ $customer_insularlifecode }}</span></div>
                              </li>
                            @endif
                          </ul>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
      @if($me->categoryid == 1) {{--  Manager only  --}}
            <div class="row">
                <div class="col-lg-12 mb-4 ">
                    <div class="card">
                          <div class="col-12 p-2  border-b border-gray-300 rounded-tl rounded-tr  ">
                            <form class="mb-0" action="{{  route('customers.profile.search',['customerid' =>  $me->customerid]) }}" method="GET" >
                              <div class="row align-items-center px-2">
                                  <div class="col-4">
                                      <span class="text-lg font-semibold p-2">
                                          Members
                                      </span>
                                  </div>
                                  <div class="col-8">
                                      <div class="row justify-content-end">
                                          <div class="col-5 ">
                                            <div class="input-group">
                                              <input class="form-control" type="text" name="query" placeholder="Search" value="{{ request()->query('query') }}" autocomplete="off">
                                              <button class="btn btn-primary" type="submit" id="normal_search"><i class="bx bx-search mx-1"></i>Search</button>
                                            </div>
                                          </div>
                                          <div class="col-4 ps-0 d-flex justify-content-end">
                                              <button class="btn btn-primary w-75" type="button"  id="profile_add" data-manager-id="{{ $me->customerid }}" data-bs-toggle="modal" data-bs-target="#modal"><i class="bx bx-plus-circle mx-1"></i>Add Member</button>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                        </div>
                        <div class="table-responsive text-nowrap">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th class="text-center text-sm font-bold whitespace-nowrap">fullname</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Address</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Email</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Contact No</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Birthdate</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Active</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Gender</th>
                                {{-- <th class="text-center text-sm font-bold whitespace-nowrap">Civil Status</th> --}}
                                <th class="text-center text-sm font-bold whitespace-nowrap">Curren Plan</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Paid</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Actions</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 ">
                                @if(count($customers) > 0)
                                @foreach($customers as $key => $list)
                                @php $key++; @endphp
                                    <tr >
                                        <td class="text-xs text-center p-1"><a href="{{ route('customers.profile',[$list->customerid]) }}"> {{  $list->name  }}</a></td>
                                        <td class="text-xs text-center p-1">{{  $list->address  }}</td>
                                        <td class="text-xs text-center p-1">{{  $list->email  }}</td>
                                        <td class="text-xs text-center p-1">{{  $list->contactno  }}</td>
                                        <td class="text-xs text-center p-1">{{  $list->birthdate  }}</td>
                                        <td class="text-xs text-center p-1">
                                            {!!  $list->active == 1? '<span class="badge bg-label-success">YES</span>':'<span class="badge bg-label-danger">NO</span>'  !!}
                                      </td>
                                        <td class="text-xs text-center p-1">{{  $list->gender  }}</td>
                                        <td class="text-xs text-right p-1">
                                           {{-- free --}}
                                          @if($list->planid == 1)
                                            <span class="badge  bg-label-primary">{{ $list->plantitle.' - ₱ '.number_format($list->planprice, 2, '.', ',') }}</span> 
                                          
                                          @else {{-- premium plan --}}
                                            <span class="badge  bg-label-success">{{ $list->plantitle.' - ₱ '.number_format($list->planprice, 2, '.', ',') }}</span> 
                                          @endif
                                        </td>
                                        <td class="text-xs text-center p-1">
                                            {{-- paid --}}
                                          @if($list->paid == 1)
                                            <i type="solid"  class="bx  bx-check-circle"></i>
                                          @elseif($list->currentplan == 5) {{-- installment --}}
                                            <button  class="btn btn-xs bg-label-warning"  data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne{{$key}}" aria-expanded="true"  >PENDING <i class='bx bx-chevron-down '></i></button>
                                          @endif
                                        </td>
                                        <td class="text-xs text-center p-1">
                                          {{  $list->dateadded  }}
                                        </td>
                                        <td class="text-xs  text-center p-1">    
                                          <div>
                                              <button class="btn btn-warning p-1 mx-1 profile_edit " data-item-id="{{ $list->customerid }}" data-bs-toggle="modal" data-bs-target="#modal"><i class='bx bx-pencil '></i> </button>
                                              <button class="btn btn-danger p-1 mx-1 profile_delete"  data-item-id = "{{ $list->customerid }}" data-bs-toggle="modal" data-bs-target="#modal" ><i class='bx bx-trash-alt  '></i> </button>  
                                          </div>                                  
                                        </td>
                                    </tr>
                                    <tr>
                                      <td colspan="7" class=" text-xs text-center p-0"></td>
                                      <td colspan="4" class=" p-0">
                                        <div id="panelsStayOpen-collapseOne{{$key}}" class="accordion-collapse collapse " >
                                            <table class="table table-bordered table-hover">
                                              <tr>
                                                <th class="text-center text-sm font-bold whitespace-nowrap p-1">Payment</th>
                                                <th class="text-center text-sm font-bold whitespace-nowrap p-1">Date</th>
                                                <th class="text-center text-sm font-bold whitespace-nowrap p-1">Status</th>
                                              </tr>
                                              @foreach($customer_with_intallment as $installment_list)
                                                  @if($installment_list->CustomerID == $list->customerid)
                                                    <tr class=" bg-[#ff000030] border-white" >
                                                      <td class=" text-xs text-right p-1 w-50">{!! '<span class="badge  bg-label-success">₱ '. number_format($installment_list->Payment, 2, '.', ',').'</span>'  !!}</td>
                                                      <td class=" text-xs text-center p-1 w-25">{{ $installment_list->Date }}</td>
                                                      <td class=" text-xs text-center p-1 w-25"> {!!  $installment_list->Paid == 1? '<span  class="badge bg-label-success">OK</span>' : '' !!}</td>
                                                    </tr>
                                                  @endif
                                              @endforeach
                                              <tr>
                                                <td colspan="2" class=" text-xs  p-1 w-50">
                                                  <strong>Current Payment:</strong>
                                                </td>
                                                <td  class=" text-xs text-right p-1 w-50">
                                                  <strong>
                                                    @foreach($installment_total as $total)
                                                      {{ $total->customerid == $list->customerid ? ' ₱ '.number_format($total->total_payment, 2, '.', ',') : ''  }}
                                                    @endforeach
                                                  </strong>
                                                </td>
                                              </tr>
                                            </table>
                                        </div>
                                      </td>
                                    </tr>

                                @endforeach  
                                @else
                                    <tr>
                                      <td colspan="100"  class="text-center" ><span >No records found</span></td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot  >
                              <td colspan="100" class="text-sm text-right" >{{ $customers->appends(['query' => request()->query('query')])->links() }}</td>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>

              @endif
            </div>
        </div>

        {{-- modal --}}

        <div class="modal fade" id="modal"  tabindex="-1" role="dialog">
          <div class="modal-dialog modal-content modal-xl">

          </div>
        </div> 



@endsection



{{-- Tailwind  --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script defer src="{{asset('js/app.js')}}"></script>