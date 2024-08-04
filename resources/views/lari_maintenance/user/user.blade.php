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
                                          User Maintenance
                                    </span>
                                </div>
                                <div class="col-8">
                                    <div class="row  ">
                                        <form class="mb-0" action="{{ route('user.search') }}" method="GET" >
                                            <div class="row ">
                                                <div class="col-8">
                                                  <div class="input-group">
                                                    <input class="form-control" type="text" name="query" placeholder="Search" value="{{ request()->query('query') }}" autocomplete="off">
                                                    <button class="btn btn-primary" type="submit"><i class="bx bx-search mx-1"></i>Search</button>
                                                  </div>
                                                </div>
                                                <div class="col-4 ps-0 d-flex justify-content-end">
                                                    <button class="btn btn-primary w-50" type="button"  id="user_add" data-bs-toggle="modal" data-bs-target="#modal"><i class="bx bx-plus-circle mx-1"></i>Add User</button>
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
                                <th class="text-center text-sm font-bold whitespace-nowrap">Fullname</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Username</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Level</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Status</th>
                                <th class="text-center text-sm font-bold whitespace-nowrap">Actions</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0 ">
                                @if(count($users) > 0)
                                    @foreach($users as $list)
                                        <tr >
                                            <td class="text-xs text-center p-1">{{  $list->name  }}</td>
                                            <td class="text-xs text-center p-1">{{  $list->username  }}</td>
                                            <td class="text-xs text-center p-1">{{  $list->uleveldescription  }}</td>
                                            <td class="text-xs text-center p-1">
                                              {!!  $list->blocked == 1? '<span class="badge bg-label-danger">BLOCKED</span>':'<span class="badge bg-label-success">ACTIVE</span>'  !!}
                                            </td>
                                            <td class="text-center p-1">    
                                              <div>
                                                  <button class="btn btn-warning p-1 mx-1 user_edit " data-item-id="{{ $list->userid }}" data-bs-toggle="modal" data-bs-target="#modal"><i class='bx bx-pencil '></i> </button>
                                                  <button class="btn btn-dark p-1 mx-1 user_blocking"  data-item-id = "{{ $list->userid }}" data-bs-toggle="modal" data-bs-target="#modal" ><i class='bx bx-block '></i> </button>  
                                                  <button class="btn btn-danger p-1 mx-1 user_delete"  data-item-id = "{{ $list->userid }}" data-bs-toggle="modal" data-bs-target="#modal" ><i class='bx bx-trash-alt  '></i> </button>  
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
                              <td colspan="100" class="text-sm text-right" >{{ $users->appends(['query' => request()->query('query')])->links() }}</td>
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
          <div class="modal-dialog modal-content modal-lg">

          </div>
        </div> 



@endsection



{{-- Tailwind  --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script defer src="{{asset('js/app.js')}}"></script>