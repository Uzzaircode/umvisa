<div class="form-group">
        <label for="" class="form-label">Title of Activity/Event</label>
        <input type="text" class="form-control" name="title_event" value="">
        @include('shared._errors',['entity'=>'title_event'])
</div>
<div class="form-group">
        <div class="row">
                <div class="col-6">
                        <label for="" class="form-label">Venue</label>
                        <input type="text" class="form-control" name="venue" value="">
        @include('shared._errors',['entity'=>'venue'])
                </div>
                <div class="col-6">
                        <label for="" class="form-label">Country</label>
                        <select name="" id="" class="form-control">
                                @foreach($countries as $c) 
                            <option value="">{!! $c !!} </option>
                            
                        @endforeach
                        </select>
        @include('shared._errors',['entity'=>'country'])
                </div>
        </div>
</div>
<div class="form-group">
        <label for="" class="form-label">
                Travelling Period
        </label>
        <div class="row">
                <div class="col">
                        <div class="input-group ">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fe fe-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                </div>
                <div class="col">
                                <div class="input-group ">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fe fe-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                </div>
        </div>




</div>