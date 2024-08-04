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
                            <form class="mb-0" action="{{ route('permissions.search') }}" method="GET" >
                              <div class="row align-items-center px-2">
                                  <div class="col-2">
                                      <span class="text-lg font-semibold p-2">
                                          Permissions
                                      </span>
                                  </div>
                                  <div class="col-2">
                                    <select class="form-select" name="levelid" id="levelid">
                                      @foreach($access_level as $key => $list)
                                        <option value="{{$list->userlevel}}" {{$list->userlevel == request()->query('levelid') || $key == 0 ? 'selected' : '' }}>{{ $list->uleveldescription }}</option>
                                      @endforeach 
                                    </select>
                                  </div>
                                  <div class="col-8">
                                      <div class="row ">
                                          <div class="col-8">
                                            <div class="input-group">
                                              <input class="form-control" type="text" name="query" placeholder="Search" value="{{ request()->query('query') }}" autocomplete="off">
                                              <button class="btn btn-primary" type="submit" id="normal_search"><i class="bx bx-search mx-1"></i>Search</button>
                                            </div>
                                          </div>
                                          <div class="col-4 ps-0 d-flex justify-content-end">
                                              <button class="btn btn-primary w-50" type="button"  id="permissions_add" data-bs-toggle="modal" data-bs-target="#modal"><i class="bx bx-plus-circle mx-1"></i>Add Module</button>
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
                                <th class="text-center text-sm font-bold whitespace-nowrap">Module Name</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">can view</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">can edit</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">can add</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">can delete</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">can print</th>
                                {{-- <th class="text-center text-sm font-bold whitespace-nowrap">action</th> --}}
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 ">
                                @if(count($permissions) > 0)
                                    @foreach($permissions as $list)
                                        <tr >
                                            <td class="text-xs text-center p-1">{{  $list->modulename  }}</td>
                                            <td class="text-xs text-center p-1">
                                              <input class="form-check-input" type="checkbox"  id="canview" name="canview" {{ $list->canview == 1? 'Checked' : '' }} value="{{$list->canview}}">
                                            </td>
                                            <td class="text-xs text-center p-1">
                                              <input class="form-check-input" type="checkbox"  id="canedit" name="canedit" {{ $list->canedit == 1? 'Checked' : '' }} value="{{$list->canedit}}">
                                            </td>
                                            <td class="text-xs text-center p-1">
                                              <input class="form-check-input" type="checkbox"  id="canadd" name="canadd" {{ $list->canadd == 1? 'Checked' : '' }} value="{{$list->canadd}}">
                                            </td>
                                            <td class="text-xs text-center p-1">
                                              <input class="form-check-input" type="checkbox"  id="candelete" name="candelete" {{ $list->candelete == 1? 'Checked' : '' }} value="{{$list->candelete}}">
                                            </td>
                                            <td class="text-xs text-center p-1">
                                              <input class="form-check-input" type="checkbox"  id="canprint" name="canprint" {{ $list->canprint == 1? 'Checked' : '' }} value="{{$list->canprint}}">
                                            </td>
                                            {{-- <td class="text-center p-1">    
                                              <div>
                                                  <button class="btn btn-warning p-1 mx-1 permissions_edit " data-item-id="{{ $list->moduleid }}" data-bs-toggle="modal" data-bs-target="#modal"><i class='bx bx-pencil '></i> </button>
                                                  <button class="btn btn-danger p-1 mx-1 permissions_delete"  data-item-id = "{{ $list->moduleid }}" data-bs-toggle="modal" data-bs-target="#modal" ><i class='bx bx-trash-alt  '></i> </button>  
                                              </div>                                  
                                            </td> --}}
                                        </tr>
                                    @endforeach  
                                @else
                                    <tr>
                                      <td colspan="100"  class="text-center" ><span >No records found</span></td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot  >
                              <td colspan="100" class="text-sm text-right" >{{ $permissions->appends(['query' => request()->query('query'), 'levelid' => request()->query('levelid')])->links() }}</td>
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