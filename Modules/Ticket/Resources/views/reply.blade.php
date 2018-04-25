@if(isset($reply->id))
            <form action="{{route('replies.update',['id'=>$reply->id])}}" class="card" method="POST" enctype="multipart/form-data">
                {{method_field('PUT')}}
            @else
            <form action="{{route('replies.store')}}" class="card" method="POST" enctype="multipart/form-data">
            @endif
                @csrf
                @cardHeader
                @slot('card_title')<i class="fe fe-message"></i> Remarks  
                @endslot
                
                        @endcardHeader
                        @cardBody
                        <input type="hidden" name="ticket_id" value="{{isset($reply) ? $reply->id:''}}">
            <input type="hidden" name="user_id" value="{{isset($reply) ? $reply->id:''}}">
                        <div class="form-group"  @if ($errors->has('body')) has-error @endif>
                                <label for="" class="form-label">Leave a remark</label>
                        <textarea name="body" id="" cols="30" rows="5" class="form-control">{{old('body',$reply->body ?? null)}}</textarea> 
                        @if ($errors->has('body'))
                                    <p class="text-danger">{{ $errors->first('body') }}</p> 
                                @endif                 
                        </div>
                        <div class="form-group">
                        <input type="submit" name="reply" class="btn btn-primary btn-md" value="Submit">
                    </div>
                @endcardBody  
            </form>
            