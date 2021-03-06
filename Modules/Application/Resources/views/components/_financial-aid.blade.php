@dynamicCard(['title'=>'Financial Aids','class'=>''])
@slot('body')
<div class="form-group">
    <div class="text-right mb-5">
        <a class="btn btn-sm btn-secondary" id="add-financial">
            <i class="fe fe-plus-circle"></i> Add Financial Aid(s)
        </a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Sources Of Financial Assistance For The Visit<span class="text-danger">*</span></th>
                <th>Details<span class="text-danger">*</span></th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="dynamic_field">
            @isset($application)
            @foreach($financialaids as $key => $f)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$f->financialinstrument->name}}</td>
                <td>{{$f->remarks}}</td>
                <td></td>
            </tr>
            @endforeach
            @endisset
            <tr>
                <td>
                    1
                </td>
                <td>
                    <select name="financial_instrument[]" id="" class="form-control selectize">
                        <option value="">Please choose</option>
                        @foreach($ins as $n)
                        <option value="{{$n->id}}">{{$n->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" class="form-control" name="remarks[]" placeholder=""></td>
                <td class="text-center"><a id="+f+" class="btn btn-danger remove-financial text-white"><i class="fe fe-trash"></i>
                        Delete</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endslot
@enddynamicCard