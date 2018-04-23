@extends('backend.master') 
@section('content')
<div class="row row-cards row-deck">
  <div class="col-12">
@card
    @cardHeader
        @slot('card_title')<i class="fe fe-users"></i> Users @endslot
        @cardOptions
        <a class="btn btn-secondary btn-sm">Total: {{ $result->total() }} {{ str_plural('User', $result->count()) }}</a>

        @can('add_users')
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm text-white"> <i class=""></i> Create</a> 
        @endcan 
        @endcardOptions
    @endcardHeader
    
    @cardBody
    <div class="table-responsive">
        @table(['class'=>'table card-table table-vcenter text-nowrap', 'id'=>'datatable'])
            <thead>
                <th>#</th>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                @can('edit_users', 'delete_users')
                <th class="text-center">Actions</th>
                @endcan
            </thead>
            <tbody>
               @foreach($result as $key => $user)
            <tr>
                <td>{{ ++$key }}</td>
                <td class="text-center"><div class="avatar d-block" style="background-image: url({{asset($user->profile->avatar)}})">                    
                    <span class="avatar-status {{$user->isOnline() ? 'bg-green':'bg-red'}}"></span> 
                  </div></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->implode('name', ', ') }}</td>
                <td>{{ $user->created_at->toFormattedDateString() }}</td>
            
                @can('edit_users')
                <td class="text-center">
                    @can('edit_users')
                    <a href="{{ route('users.edit', ['id' => $user->id])  }}" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i> Edit</a>
                    @endcan
                    
                    @can('delete_users')                    
                        {!! Form::open( ['method' => 'delete', 'url' => route('users.destroy', ['id' => $user->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
                <button type="submit" class="btn-delete btn btn-sm btn-danger" style="visibility:{{Auth::id() == $user->id ? 'hidden':''}}">
                                <i class="fe fe-trash"></i> Delete
                            </button>
                        {!! Form::close() !!}
                    @endcan 
                </td>
                @endcan
            </tr>
            @endforeach             
            </tbody>
        @endtable
    </div>
    @endcardBody
@endcard
</div>
@include('asset-partials.datatables')
@endsection
