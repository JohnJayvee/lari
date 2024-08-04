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
                            <div class="row align-items-center px-2">
                                <div class="col-4">
                                    <span class="text-lg font-semibold p-2">
                                         Ads
                                    </span>
                                </div>
                                <div class="col-8">
                                    <div class="row  ">
                                        <form class="mb-0" action="{{ route('ads.search') }}" method="GET" >
                                            <div class="row ">
                                                <div class="col-8">
                                                  <div class="input-group">
                                                      <input class="form-control" type="text" name="query" placeholder="Search" value="{{ request()->query('query') }}" autocomplete="off">
                                                      <button class="btn btn-primary" type="submit"><i class="bx bx-search mx-1"></i>Search</button>
                                                  </div>
                                                </div>
                                                <div class="col-4 ps-0 d-flex justify-content-end">
                                                    <button class="btn btn-primary w-50" type="button"  id="ads_add" data-bs-toggle="modal" data-bs-target="#modal"><i class="bx bx-plus-circle mx-1"></i>Upload Ads</button>
                                              </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Ads title</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Preview</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Type</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Size</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Date</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Actions</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 ">
                                @if(count($ads) > 0)
                                    @foreach($ads as $list)
                                        <tr >
                                            <td class="text-xs text-center p-1">{{  $list->adstitle  }}</td>
                                            <td class="text-xs text-center p-1 d-flex justify-content-center ">
                                              @if(isset($list->adsfilename))
                                                  @if(str_contains($list->adsfilename, '.mp4'))
                                                      <div class="card  m-3 w-50">
                                                        <div class="card-body">
                                                          <p class="card-text">{{ $list->adsfilename }}</p>
                                                        </div>
                                                        <video>
                                                            <source src="{{ asset('storage/uploads/' . $list->adsfilename) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <div class="card-body">
                                                          <p class="card-text">Uploaded on: {{ $list->DateUploaded }}</p>
                                                        </div>
                                                      </div>
                                                  @else
                                                      <div class="card m-3 w-50">
                                                        <div class="card-body">
                                                          <h5 class="card-title">{{ $list->adsfilename }}</h5>
                                                        </div>
                                                        <img src="{{ asset('storage/uploads/' . $list->adsfilename) }}" alt="Uploaded Image" class="img-fluid">
                                                        <div class="card-body">
                                                          <p class="card-text">Uploaded on: {{ $list->DateUploaded }}</p>
                                                        </div>
                                                      </div>
                                                  @endif
                                              @endif
                                            </td>
                                            <td class="text-xs text-center p-1">
                                              {!! str_contains($list->adsfilename, '.mp4') ? '<span class="badge bg-label-primary">Video</span>' : '<span class="badge bg-label-primary">Image</span>' !!}
                                            </td>
                                            <td class="text-xs text-center p-1">{{ $list->adsfilesize }}</td>
                                            <td class="text-xs text-center p-1 whitespace-nowrap">{{ \Carbon\Carbon::parse($list->DateUploaded)->format('Y-m-d') }}</td>
                                            <td class="text-center p-1">    
                                              <div>
                                                  <button class="btn btn-warning p-1 mx-1 ads_edit " data-item-id="{{ $list->adsid }}" data-bs-toggle="modal" data-bs-target="#modal"><i class='bx bx-pencil '></i> </button>
                                                  <button class="btn btn-danger p-1 mx-1 ads_delete"  data-item-id = "{{ $list->adsid }}" data-bs-toggle="modal" data-bs-target="#modal" ><i class='bx bx-trash-alt  '></i> </button>  
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
                              <td colspan="100" class="text-sm text-right" >{{ $ads->appends(['query' => request()->query('query')])->links() }}</td>
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
          <div class="modal-dialog modal-content modal-md">

          </div>
        </div> 



@endsection



{{-- Tailwind  --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script defer src="{{asset('js/app.js')}}"></script>