
<div class="form-group" @if ($errors->has('remark')) has-error @endif>
    <label for="" class="form-label">Leave a recommendation</label>
    <textarea name="remark" id="" cols="30" rows="5" class="form-control"></textarea> 
    @if ($errors->has('remark'))
    <p class="text-danger">{{ $errors->first('remark') }}</p>
    @endif
</div>

<div class="form-group text-right">
        @if(Auth::user()->hasRole('Supervisor','Deputy Dean'))
    <button type="submit" class="btn btn-primary text-right" name="save_remarks"><i class="fe fe-send"></i> Submit</button>
    @endif
    @if(Auth::user()->hasRole('Deputy Dean'))
    <button type="submit" class="btn btn-success text-right" name="approve"><i class="fe fe-send"></i> Approve</button>
    <button type="submit" class="btn btn-danger text-right" name="approve"><i class="fe fe-send"></i> Reject</button>
    @endif
</div>



@isset($remarks)
<div class="o-auto" style="">
    <ul class="list-group list-card-group">
        @foreach($remarks as $remark)
        <li class="list-group-item py-5">
            <div class="media">
                <div class="media-object avatar avatar-md mr-4" style="background-image: url({{asset($remark->creator->profile->avatar)}})"></div>
                <div class="media-body">
                    <div class="media-heading">                        
                        <h5>{{$remark->creator->name}}</h5>
                        <small class="text-muted">{{$remark->created_at->toDayDateTimeString()}}</small>
                    </div>
                    <br>
                    <div>
                        {!! $remark->body !!}
                    </div>

                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endisset