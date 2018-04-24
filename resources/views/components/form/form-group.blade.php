<div class="form-group"  @if ($errors->has('name')) has-error @endif>
<label for="" class="form-label">{{$form_label}}</label>
{{$slot}}
</div>