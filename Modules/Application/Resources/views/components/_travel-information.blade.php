@dynamicCard(['title'=>'Event/Travel Information','class'=>''])
@slot('body')
<div class="col">
        <div class="form-group">
                <label for="" class="form-label">Title of Activity/Event<span class="text-danger">*</span></label>
                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid':''}}" name="title" value="{{ old('title',$application->title ?? null) }}"
                        placeholder="e.g: 4th International Conference on New Direction In Multidisciplinary Research & Practice 2018">
                @include('shared._errors',['entity'=>'title'])
        </div>

        <div class="form-group">
                <div class="row">
                        <div class="col">
                                <label for="" class="form-label"> Venue<span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{$errors->has('venue') ? 'is-invalid':''}}"
                                        name="venue" value="{{old('venue',$application->venue ?? null)}}"
                                        placeholder="e.g: University of Cambridge">
                                @include('shared._errors',['entity'=>'venue'])
                        </div>
                        <div class="col">
                                <label for="" class="form-label"> State<span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{$errors->has('state') ? 'is-invalid':''}}"
                                        name="state" value="{{old('state',$application->state ?? null)}}"
                                        placeholder="e.g: Cambridge">
                                @include('shared._errors',['entity'=>'state'])
                        </div>
                        <div class="col">
                                <label for="" class="form-label"> Country<span class="text-danger">*</span></label>
                                <select name="country" id="" class="form-control {{$errors->has('country') ? 'is-invalid':''}}">
                                        <option value="">Please select a country</option>
                                        @foreach($countries as $c)
                                        <option value="{!! $c->name->common !!}" @if(isset($application) &&
                                                $application->country == $c->name->common) selected @endif> {!!
                                                $c->name->common !!}</option>

                                        @endforeach
                                </select>
                                @include('shared._errors',['entity'=>'country'])
                        </div>
                </div>
        </div>
        <div class="form-group">
                <label for="" class="form-label">Event Type<span class="text-danger">*</span></label>
                <select class="form-control " name="event_type" placeholder="">
                        <option value="">Please select</option>                        
                        <option value="competition" {{isset($application) && $application->event_type == 'competition' ? 'selected':null}}>Competition</option>
                        <option value="conference" {{isset($application) && $application->event_type == 'conference' ? 'selected':null}}>Conference</option>
                        <option value="conventions" {{isset($application)&& $application->event_type == 'conventions' ? 'selected':null}}>Conventions</option>
                        <option value="exhibitions" {{isset($application) && $application->event_type == 'exhibitions' ? 'selected':null}}>Exhibitions</option>
                        <option value="fairs" {{isset($application) && $application->event_type == 'fairs' ? 'selected':null}}>Fairs</option>
                        <option value="networking-events" {{isset($application) && $application->event_type == 'networking-events' ? 'selected':null}}>Networking Events</option>
                        <option value="seminars" {{isset($application) && $application->event_type == 'seminars' ? 'selected':null}}>Seminars</option>
                        <option value="symposium" {{isset($application) && $application->event_type == 'symposium' ? 'selected':null}}>Symposium</option>
                        <option value="workshop" {{isset($application) && $application->event_type == 'workshop' ? 'selected':null}}>Workshop</option>
                </select>
                @include('shared._errors',['entity'=>'event_type'])
        </div>
        <div class="form-group">
                <label for="" class="form-label">Justifications For Attending The Visit<span class="text-danger">*</span></label>
                <textarea class="form-control {{$errors->has('description') ? 'is-invalid':''}}" name="description"
                        placeholder="">{{ old('description',$application->description ?? null) }}</textarea>
                @include('shared._errors',['entity'=>'description'])
        </div>
        <div class="form-group">
                <label for="" class="form-label">
                        Travelling Period<span class="text-danger">*</span> 
                        @isset($application) <span class="badge badge-info">{{getTravelTotalDays($application)}}
                                Days</span>@endisset
                </label>

                <div class="row">
                        <div class="col">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input travel-from {{$errors->has('travel_start_date') ? 'is-invalid':''}}"
                                                name="travel_start_date" placeholder="Start Date" value="{{old('travel_start_date',isset($application) ? $application->travel_start_date: '')}}" />
                                </div>
                                @include('shared._errors',['entity'=>'travel_start_date'])
                        </div>
                        <div class="col">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input travel-to {{$errors->has('travel_end_date') ? 'is-invalid':''}}"
                                                name="travel_end_date" placeholder="End Date" value="{{old('travel_end_date',isset($application) ? $application->travel_end_date : '')}}" />

                                </div>
                                @include('shared._errors',['entity'=>'travel_end_date'])
                        </div>
                </div>
        </div>
        <div class="form-group">
                <label for="" class="form-label">
                        Event Period<span class="text-danger">*</span> @isset($application) <span class="badge badge-info">{{getEventTotalDays($application)}}
                                Days</span>@endisset
                </label>
                <p id="calculated" class="calculated"></p>
                <div class="row">
                        <div class="col">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input event-from {{$errors->has('event_start_date') ? 'is-invalid':''}}"
                                                name="event_start_date" placeholder="Start Date" value="{{old('event_start_date',isset($application) ? $application->event_start_date: '')}}" />
                                </div>
                                @include('shared._errors',['entity'=>'event_start_date'])
                        </div>
                        <div class="col">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input event-to {{$errors->has('event_end_date') ? 'is-invalid':''}}"
                                                name="event_end_date" placeholder="End Date" value="{{old('event_end_date',isset($application) ? $application->event_end_date : '')}}" />

                                </div>
                                @include('shared._errors',['entity'=>'event_end_date'])
                        </div>

                </div>
        </div>
        <div class="form-group">
                <div class="form-group">
                        <label for="" class="form-label">Event Attachments<span class="text-danger">*</span></label>
                        <div class="file-drop-area">
                                <span class="fake-btn">Choose your attachments</span>
                                <span class="file-msg">Please attach supporting document (Letter of invitation, etc).</span>
                                <input class="file-input" type="file" name="attachments[]" multiple>

                        </div>
                        <p class="help-block sr-only">You are allowed to upload more thank one attachment</p>
                        @include('shared._errors',['entity'=>'attachments'])
                </div>

                @if(isset($application) && $application->applicationAttachments->count() > 0)
                <hr>
                <h5>Uploaded Attachments</h5>
                <div class="form-group">
                        <div class="row gutters-sm" id="attachment">
                                @foreach($application->applicationAttachments as $t)
                                <div class="col-6 col-sm-4">
                                        @if (pathinfo($t->path, PATHINFO_EXTENSION) == 'jpg' ||
                                        pathinfo($t->path, PATHINFO_EXTENSION) == 'png')
                                        <a href="{{asset($t->path)}}" data-toggle="lightbox" data-gallery="attachment-gallery">
                                                <img src="{{asset($t->path)}}" width="200px" class="img-fluid">
                                                <br>
                                                <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                                        </a> @endif @if(pathinfo($t->path, PATHINFO_EXTENSION) == 'doc' ||
                                        pathinfo($t->path,
                                        PATHINFO_EXTENSION) == 'docx')
                                        <a href="{{asset($t->path)}}">
                                                <img src="{{asset('img/file-icons/doc.png')}}" alt="" width="128px">
                                                <br>
                                                <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                                        </a> @elseif(pathinfo($t->path, PATHINFO_EXTENSION) == 'pdf')
                                        <a href="{{asset($t->path)}}">
                                                <img src="{{asset('img/file-icons/pdf.png')}}" alt="" width="128px">
                                                <br>
                                                <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                                        </a> @elseif(pathinfo($t->path, PATHINFO_EXTENSION) == 'xls' ||
                                        pathinfo($t->path,
                                        PATHINFO_EXTENSION) == 'csv' )
                                        <a href="{{asset($t->path)}}">
                                                <img src="{{asset('img/file-icons/xls.png')}}" alt="" width="128px">
                                                <br>
                                                <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                                        </a> @endif
                                </div>
                                @endforeach
                        </div>
                        
                </div>
                @endif

        </div>

</div>
@endslot
@enddynamicCard