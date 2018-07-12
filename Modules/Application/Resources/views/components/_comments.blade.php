<div class="form-group" @if ($errors->has('replybody')) has-error @endif>
    <label for="" class="form-label">Leave a remark</label>
    <textarea name="replybody" id="" cols="30" rows="5" class="form-control"></textarea> @if ($errors->has('replybody'))
    <p class="text-danger">{{ $errors->first('replybody') }}</p>
    @endif
</div>