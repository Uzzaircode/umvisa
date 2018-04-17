@can('edit_users')
    <a href="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class="btn btn-sm btn-primary">
        <i class="fe fe-edit"></i> Edit</a>
@endcan

@can('delete_users')
    {!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
        <button type="submit" class="btn-delete btn btn-sm btn-danger">
            <i class="fe fe-trash"></i> Delete
        </button>
    {!! Form::close() !!}
@endcan