<div class="card">
    @cardHeader 
    @slot('card_title')
    <i class="fe fe-message-circle"></i> Remarks @endslot 
    @endcardHeader 
    @cardBody   
    <div class="form-group" @if ($errors->has('reply_body')) has-error @endif>
        <label for="" class="form-label">Leave a remark</label>
        <textarea name="replybody" id="" cols="30" rows="5" class="form-control"></textarea>
        @if ($errors->has('reply_body'))
        <p class="text-danger">{{ $errors->first('reply_body') }}</p>
        @endif
    </div>    
    @endcardBody
</div>