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
                      <small class="text-muted">{{$tickets->where('status',5)->count()}} tickets closed</small>
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
            
            </div>
@endsection