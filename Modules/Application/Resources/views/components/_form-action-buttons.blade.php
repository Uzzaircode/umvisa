@role('User') @if(isset($application))
<button class="btn btn-sm btn-primary" name="submit" value="submit" type="submit"><i class="fe fe-send"></i> Submit</button>@else
<a class="btn btn-sm btn-primary submit-save text-white" name="save"><i class="fe fe-send"></i> Save and Submit</a>
<div class="input-group recepient-name">
    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">

    </div>
    <div class="input-group-prepend">
        <button class="btn btn-primary" name="submit" value="submit" type="submit"><i class="fe fe-send"></i> Save and Submit</button>
        <a class="btn btn-danger cancel-submit text-white"><i class="fe fe-x-circle"></i> Cancel Submission</a>
    </div>
</div>
@endif
<div class="mr-2"></div>
<button class="btn btn-sm btn-secondary submit-draft" name="draft" value="draft" type="submit"><i class="fe fe-save"></i> {{isset($application) ? 'Update Draft':'Save As Draft'}}
</button>
<a href="{{route('applications.index')}}" class="btn btn-sm btn-secondary cancel"><i class="fe fe-x-circle"></i> Cancel</a>@endrole