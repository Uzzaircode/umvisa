@if(isset($ticket->id))
            <form action="{{route('replies.update',['id'=>$ticket->id])}}" class="card" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="ticket_id" value="{{isset($ticket) ? $ticket->id:''}}">
                        <div class="form-group"  @if ($errors->has('body')) has-error @endif>
                                <label for="" class="form-label">Issue</label>
                        <textarea name="body" id="" cols="30" rows="5" class="form-control">{{old('body',$ticket->body ?? null)}}</textarea> 
                        @if ($errors->has('body'))
                                    <p class="text-danger">{{ $errors->first('body') }}</p> 
                                @endif                 
                        </div>
                @endcardBody  
            </form>
            