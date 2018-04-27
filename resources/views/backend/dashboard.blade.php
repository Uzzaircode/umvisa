@extends('backend.master')

@section('content')
<div class="page-header">
    <h1 class="page-title">
      Dashboard
    </h1>
</div>
<div class="row row-cards">
  @can('view_tickets')                                                    
              <div class="col-sm-6 col-lg-4">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-blue mr-3">
                      <i class="fe fe-tag"></i>
                    </span>
                    <div>
                    <h4 class="m-0"><a href="{{route('tickets.index')}}">{{$tickets->count()}} <small>Tickets</small></a></h4>
                      <small class="text-muted">{{$tickets->where('status',3)->count()}} tickets closed</small>
                    </div>
                  </div>
                </div>
              </div>
      @endcan
              <div class="col-sm-6 col-lg-4">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-green mr-3">
                      <i class="fe fe-message-square"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">32 <small>Agents Reply</small></a></h4>
                      <small class="text-muted">7 New Replies</small>
                    </div>
                  </div>
                </div>
              </div>
              @can('view_users')
              <div class="col-sm-6 col-lg-4">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-red mr-3">
                      <i class="fe fe-users"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="{{route('users.index')}}">{{$users->count()}} <small>Members</small></a></h4>
                      <small class="text-muted">2 registered today</small>
                    </div>
                  </div>
                </div>
              </div>
              @endcan              
            </div>
            <div class="row row-cards row-deck">
            <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Recent Tickets</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Ticket Subject</th>
                              <th>Assigned To</th>                              
                              <th>Created</th>
                              <th>Status</th>                             
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><span class="text-muted">UM001401</span></td>
                              <td>Design Works</td>
                              <td>
                                Carlson Limited
                              </td>                              
                              <td>
                                15 Dec 2017
                              </td>
                              <td>
                                <span class="status-icon bg-success"></span> Paid
                              </td>                              
                              <td class="text-left">
                                <a href="javascript:void(0)" class="btn btn-secondary btn-sm">View</a>
                              </td>                              
                            </tr>                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
@endsection