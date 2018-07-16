@role('User')
@if(isset($application))
<button class="btn btn-sm btn-primary" name="submit" value="submit" type="submit"><i class="fe fe-send"></i> Submit</button>
@else
<button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fe fe-send"></i> Save and Submit</button>
@endif
<div class="mr-2"></div>
<button class="btn btn-sm btn-secondary" name="draft" value="draft" type="submit"><i class="fe fe-save"></i> {{isset($application) ? 'Update Draft':'Save As Draft'}}</button>

<a href="{{route('applications.index')}}" class="btn btn-sm btn-secondary"><i class="fe fe-x-circle"></i> Cancel</a>
@endrole