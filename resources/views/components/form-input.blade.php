@extends('backend.master') 
@section('content')
        <div class="col-9">  
            @form(['class'=>'card', 'method'=>'POST', 'action'=>'{{route("home")}}'])                   
                {{-- Start Form --}}      
                @cardHeader
                    @slot('card_title') Hello @endslot
                @endcardHeader                
                @cardBody                                               
                            @formGroup(['form_label'=>'Hello'])
                                <input type="text" class="form-control" name="Hello">   
                            @endformGroup                                                    

                @endcardBody
                
                {{-- End Form --}}
            @endform
            <form action="https://httpbin.org/post" method="post" class="card">
                <div class="card-header">
                    <h3 class="card-title">Form elements</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Static</label>
                                <div class="form-control-plaintext">Username</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Text</label>
                                <input type="text" class="form-control" name="example-text-input" placeholder="Text..">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Disabled</label>
                                <input type="text" class="form-control" name="example-disabled-input" placeholder="Disabled.." value="Well, she turned me into a newt."
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Readonly</label>
                                <input type="text" class="form-control" name="example-disabled-input" placeholder="Disabled.." value="Well, how'd you become king, then?"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Textarea
                                    <span class="form-label-small">56/100</span>
                                </label>
                                <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Content..">Oh! Come and see the violence inherent in the system! Help, help, I'm being repressed! We
                                    shall say 'Ni' again to you, if you do not appease us. I'm not a witch. I'm not a witch.
                                    Camelot!</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Help</h3>                        
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
                        @endsection