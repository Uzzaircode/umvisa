@dynamicCard(['title'=>'Application Type','class'=>''])
@slot('body')
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="" class="form-label">Please choose Application Type</label>
            <select name="type" id="" class="form-control selectize {{$errors->has('type') ? 'is-invalid':''}} application_type">
                <option value="">Please select</option>
                <option value="faculty">Faculty</option>
                <option value="college">Residential College</option>
            </select>
            @include('shared._errors',['entity'=>'type'])
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="" class="form-label">Please select number of participants</label>
            <select name="num_partcipants" id="" class="form-control num_participants selectize">
                <option value="1">1 person</option>
                <option value="2">More than 1 person</option>
            </select>
        </div>
    </div>
</div>
@endslot
@enddynamicCard