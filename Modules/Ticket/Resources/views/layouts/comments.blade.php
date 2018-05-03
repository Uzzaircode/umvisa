<div class="card">
        @cardHeader @slot('card_title')
        <i class="fe fe-message-circle"></i> Comments @endslot @endcardHeader @cardBody
        <div class="form-group" @if ($errors->has('replybody')) has-error @endif>
          <label for="" class="form-label">Leave a remark</label>
          <textarea name="replybody" id="" cols="30" rows="5" class="form-control"></textarea>
          @if ($errors->has('replybody'))
          <p class="text-danger">{{ $errors->first('replybody') }}</p>
          @endif
        </div>
        @if($ticket->status == 2 || $ticket->status == 3 || $ticket->status == 4) 
        @can('add_replies')
        <div class="form-group text-right">
          <button type="submit" class="btn btn-primary btn-md" name="comment">
            <i class="fe fe-send"></i> Submit Comment</button>
        </div>
        @endcan 
        @endif 
        @isset($replies)
        <div class="o-auto" style="{{$replies->count() > 3 ? 'height:17rem':''}}">
          <ul class="list-group list-card-group">
            @foreach($replies as $reply)
            <li class="list-group-item py-5">
              <div class="media">
                <div class="media-object avatar avatar-md mr-4" style="background-image: url({{asset($reply->user->profile->avatar)}})"></div>
                <div class="media-body">
                  <div class="media-heading">
                    <small class="float-right text-muted">{{$reply->created_at->toDayDateTimeString()}}</small>
                    <h5>{{$reply->user->name}}</h5>
                  </div>
                  <br>
                  <div>
                    {{$reply->body}}
                  </div>

                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
        @endisset @endcardBody
      </div>