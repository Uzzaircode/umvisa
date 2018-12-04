<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="{{route('applications.index')}}">
                <img src="{{asset('img/logo.png')}}" class="header-brand-img" alt="brillante logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto">
                @if(Auth::user()->hasRole(['Admin','User']))
                <div class="nav-item d-none d-md-flex">
                    <a href="{{route('applications.create')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fe fe-plus-circle"></i> New Application</a>
                </div>
                @endif
                <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-bell"></i>
                        <span class="badge badge-pill badge-primary">
                            {{Auth::user()->unreadNotifications->count()}}
                        </span>
                    </a> @if(Auth::user()->unreadNotifications->count() > 0)
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        @foreach ( Auth::user()->unreadNotifications as $notification)
                        <form action="{{route('notifications.read', ['id'=>$notification->id,'application_id'=>$notification->data['application_id']])}}" style="display:inline"
                            method="POST">
                            @csrf
                            <button type="submit" href="" class="dropdown-item d-flex btn btn-link">         
                            <div>
                                <strong>{{$notification->data['message']}}</strong>                                
                            <div class="small text-muted">{{$notification->updated_at->diffForHumans()}}</div>
                            </div>                                               
                        </button>
                        </form>
                        @endforeach 
                    </div>
                    @endif
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span class="avatar" style="background-image: url({{asset(Auth::user()->profile->avatar)}})"></span>
                        <span class="ml-2 d-none d-lg-block">
                            <span class="text-default">{{Auth::user()->profile->title}} {{Auth::user()->name}}</span>
                            <small class="text-muted d-block mt-1">{{ Auth::user()->roles()->pluck('name')->first()}}</small>                       
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        @can('edit_profiles')
                        <a class="dropdown-item" href="/myprofile">
                            <i class="dropdown-icon fe fe-user"></i> My Profile
                        </a> @endcan
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="dropdown-icon fe fe-logout"></i> {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                    <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>
            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    @can('view_applications')
                    <li class="nav-item">
                        <a href="{{route('applications.index')}}" class="nav-link">
                            <i class="fe fe-document"></i>{{Auth::user()->hasRole('Admin') ? 'Application':'My Applications'}}</a>
                    </li>
                    @endcan 
                    
                    @role('Admin') {{-- Laravel-permission blade helper --}}
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-layer"></i> Modules</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                           
                            <a href="" class="dropdown-item">Applications</a>
                        </div>
                    </li>                   
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
                            <i class="fe fe-shield"></i> Administration</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="{{route('users.index')}}" class="dropdown-item">Users</a>
                            <a href="{{route('roles.index')}}" class="dropdown-item">Roles & Permissions</a>
                        </div>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
</div>