<div class="card participants">
        <div class="card-header">
            <h5 class="card-title">Participants Details</h5>
        </div>
        <div class="card-body">
            <div class="form-group" id="participant-form-group">            
                <div class="text-right mb-5">
                    <a class="btn btn-sm btn-secondary" id="add-participant">
                        <i class="fe fe-plus-circle"></i> Add Participant(s)
                    </a>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Matric No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="dynamic_field_participant">
                        @isset($application)
                        @if($application->participants->count() > 0) 
                        @foreach($participants as $key => $p)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$p->participants->name}}</td>
                            <td></td>
                        </tr>                    
                        @endforeach 
                        @endif
                        @endisset
                        <tr>
                            <td>
                                1
                            </td>
                            <td><input type="text" class="form-control" name="matric_nums[]"></td>
                            <td><a type="button" name="remove" id="+p+" class="btn btn-danger remove-participant text-white"><i class="fe fe-trash"></i> Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>