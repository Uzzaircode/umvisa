<div class="mt-5"></div>
<div class="form-group">
        <label for="" class="form-label">Title of Activity/Event</label>
        <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid':''}}" name="title" value="{{ old('title',$application->title ?? null) }}" placeholder="e.g: 4th International Conference on New Direction In Multidisciplinary Research & Practice 2018">
        @include('shared._errors',['entity'=>'title'])
</div>
<div class="form-group">
        <div class="row">
                <div class="col-6">
                        <label for="" class="form-label">Venue</label>
                        <input type="text" class="form-control {{$errors->has('venue') ? 'is-invalid':''}}" name="venue" value="@isset($application){{$application ? $application->venue : ''}}
                        @endisset" placeholder="University of Cambridge">
        @include('shared._errors',['entity'=>'venue'])
                </div>
                <div class="col-6">
                        <label for="" class="form-label">Country</label>
                        <select name="country" id="" class="selectize form-control {{$errors->has('country') ? 'is-invalid':''}}">
                                <option value="">Please select a country</option>
                        @foreach($countries as $c) 
                        <option value="{{ $c }}" @if(isset($application) && $application->country == $c) selected @endif>{!! $c !!} </option>
                            
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
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input from {{$errors->has('start_date') ? 'is-invalid':''}}" name="start_date"
                                        placeholder="Start date" value="{{old('start_date',isset($application) ? $application->start_date: '')}}"
                                />
                        </div>
        @include('shared._errors',['entity'=>'start_date'])
                </div>
                <div class="col">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input to {{$errors->has('end_date') ? 'is-invalid':''}}" name="end_date"
                                        placeholder="End date" value="{{old('end_date',isset($application) ? $application->end_date : '')}}"
                                />

                        </div>
        @include('shared._errors',['entity'=>'end_date'])
                </div>
        </div>
</div>