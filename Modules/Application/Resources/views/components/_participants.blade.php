@dynamicCard(['title'=>'Participant List', 'class'=> 'participants'])
@slot('body')
<div class="col">    
    <div class="form-group" id="participant-form-group">
            <div class="text-right mb-5">
                    <a class="btn btn-sm btn-secondary" id="add-participant">
                        <i class="fe fe-plus-circle"></i> Add Participants
                    </a>
                </div>
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Matric No.<span class="text-danger">*</span></th>
                    <th>Participant Name</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="dynamic_field_participant">
                @isset($application)
                @if($application->participants->count() > 0)
                @foreach($participants as $key => $p)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$p->matric_num}}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
                @endif
                @endisset
                <tr>
                    <td>
                        1
                    </td>
                    <td><input type="text" class="form-control" name="matric_num[]"></td>
                    <td></td>                    
                    <td class="text-center"><a name="remove" id="+p+" class="btn btn-danger remove-participant text-white mx-auto"><i
                                class="fe fe-trash"></i> Delete</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endslot
@enddynamicCard