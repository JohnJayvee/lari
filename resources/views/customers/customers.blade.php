@extends('templates.master')
<!-- Contents -->
@section('contents')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 ">
                    <div class="card">
                          <div class="col-12 p-2  border-b border-gray-300 rounded-tl rounded-tr  ">
                            <form class="mb-0" action="{{ route('customers.search') }}" method="GET" >
                              <div class="row align-items-center px-2">
                                  <div class="col-2">
                                      <span class="text-lg font-semibold p-2">
                                          Customers
                                      </span>
                                  </div>
                                  <div class="col-2">
                                    <select class="form-select" name="categoryid" id="categoryid">
                                      <option value="" >All</option>
                                      @foreach($customer_category as $list)
                                        <option value="{{$list->categoryid}}" {{$list->categoryid == request()->query('categoryid') ? 'selected' : '' }}>{{ $list->categoryname }}</option>
                                      @endforeach 
                                    </select>
                                  </div>
                                  <div class="col-8">
                                      <div class="row  ">
                                            <div class="col-5">
                                              <div class="input-group">
                                                <input class="form-control" type="text" name="query" placeholder="Search" value="{{ request()->query('query') }}" autocomplete="off">
                                                <button class="btn btn-primary" type="submit" id="normal_search"><i class="bx bx-search mx-1"></i>Search</button>
                                              </div>
                                            </div>
                                            <div class="col-3 ps-0">
                                            </div>
                                            <div class="col-4 ps-0 d-flex justify-content-end">
                                                <button class="btn btn-primary w-75" type="button"  id="customers_add" data-bs-toggle="modal" data-bs-target="#modal"><i class="bx bx-plus-circle mx-1"></i>Add Customer</button>
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
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">fullname</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Address</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Email</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Contact No</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Birthdate</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Active</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Gender</th>
                                {{-- <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Civil Status</th> --}}
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Curren Plan - Price</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Paid</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Date</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap  p-1">Actions</th>
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
                                                @can('can_edit',[Auth::user()->UserLevel, $mid])
                                                  <button class="btn btn-warning p-1 mx-1 customers_edit " data-item-id="{{ $list->customerid }}" data-bs-toggle="modal" data-bs-target="#modal"><i class='bx bx-pencil '></i> </button>
                                                @endcan
                                                @can('can_delete',[Auth::user()->UserLevel, $mid])
                                                  <button class="btn btn-danger p-1 mx-1 customers_delete"  data-item-id = "{{ $list->customerid }}" data-bs-toggle="modal" data-bs-target="#modal" ><i class='bx bx-trash-alt  '></i> </button>  
                                                @endcan
                                              </div>                                  
                                            </td>
                                        </tr>
                                        <tr>
                                          <td colspan="7" class=" text-xs text-center p-0"></td>
                                          <td colspan="4" class=" p-0  ">
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
                                                          <td class=" text-xs text-center p-1 w-25"> {!!  $installment_list->Paid == 1? '<span  class="badge bg-label-success">PAID</span>' : '' !!}</td>
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