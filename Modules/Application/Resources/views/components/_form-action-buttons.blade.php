<button class="btn btn-sm btn-primary" name="action" value="save"><i class="fe fe-send"></i> {{isset($app) ? 'Submit':'Submit'}}</button>
<div class="mr-2"></div>
<button class="btn btn-sm btn-secondary" type="submit" name="action" value="draft"><i class="fe fe-save"></i> {{isset($ticket) ? 'Update Draft':'Save As Draft'}}</button>

<a href="{{route('applications.index')}}" class="btn btn-sm btn-secondary"><i class="fe fe-x-circle"></i> Cancel</a>