@extends('backend.master') 
@section('content')
        <div class="col-9">  
            @form(['class'=>'card', 'method'=>'POST', 'action'=>'{{route("home")}}'])                   
                {{-- Start Form --}}      
                @cardHeader
                    @slot('card_title') Hello @endslot
                @endcardHeader                
                @cardBody                                               
                            @formGroup(['form_label'=>'Text Input'])
                                <input type="text" class="form-control" name="text">   
                            @endformGroup 
                            @formGroup(['form_label'=>'Email Input'])
                                <input type="email" class="form-control" name="email">   
                            @endformGroup                                                   
                            @formGroup(['form_label'=>'Password Input'])
                                <input type="password" class="form-control" name="password">   
                            @endformGroup
                            @formGroup(['form_label'=>'Textarea'])
                                <textarea name="textarea" id="" class="form-control"></textarea>   
                            @endformGroup
                            @formGroup(['form_label'=>'Image Selection'])
                                <div class="row gutters-sm">
                                    <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="imagecheck" type="checkbox" value="1" class="imagecheck-input"  />
                                <figure class="imagecheck-figure">
                                  <img src="{{asset('img/photos/andrew-neel-141710-1500.jpg')}}" alt="}" class="imagecheck-image">
                                </figure>
                              </label>
                            </div>
                            <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="imagecheck" type="checkbox" value="2" class="imagecheck-input"  checked />
                                <figure class="imagecheck-figure">
                                 <img src="{{asset('img/photos/andrew-neel-141710-1500.jpg')}}" alt="}" class="imagecheck-image">
                                </figure>
                              </label>
                            </div>
                            <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="imagecheck" type="checkbox" value="3" class="imagecheck-input"  />
                                <figure class="imagecheck-figure">
                                  <img src="{{asset('img/photos/andrew-neel-141710-1500.jpg')}}" alt="}" class="imagecheck-image">
                                </figure>
                              </label>
                            </div>
                                </div>
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