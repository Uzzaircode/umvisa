@extends('backend.master') 
@section('content')
@card
    @cardHeader
        @slot('card_title')Users @endslot
        @cardOptions
        <a class="btn btn-secondary btn-md">Total: {{ $result->total() }} {{ str_plural('User', $result->count()) }}</a>

        @can('add_users')
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-md text-white"> <i class=""></i> Create</a> 
        @endcan 
        @endcardOptions
    @endcardHeader
    
    @cardBody
    <div class="table-responsive">
        @table(['class'=>'table card-table table-vcenter text-nowrap', 'id'=>'datatable'])
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                @can('edit_users', 'delete_users')
                <th class="text-center">Actions</th>
                @endcan
            </thead>
            <tbody>
               @foreach($result as $key => $item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->roles->implode('name', ', ') }}</td>
                <td>{{ $item->created_at->toFormattedDateString() }}</td>
            
                @can('edit_users')
                <td class="text-right">
                    @include('shared._actions', [ 'entity' => 'users', 'id' => $item->id ])
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
