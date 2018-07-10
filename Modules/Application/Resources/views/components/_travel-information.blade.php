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
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="start_date" placeholder="Start date"/>

                        </div>
                </div>
                <div class="col">
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fe fe-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="end_date" placeholder="End date"/>

                        </div>
                </div>
        </div>
</div>
<div class="form-group">
        <label for="" class="form-label">
                Sources of financial assistance for the visit
        </label>
        <div>
                <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input university" id="university" name="financial_aid" value="option1">
                          <span class="custom-control-label">University</span>
                        </label>
                <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input faculty"  id ="faculty" name="financial_aid" value="option2">
                          <span class="custom-control-label">Faculty</span>
                        </label>
                <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input grant" id="grant" name="financial_aid" value="option3">
                          <span class="custom-control-label">Research Grant</span>
                        </label>
                <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input sponsorship" name="financial_aid" id="sponsorship" value="option3">
                <span class="custom-control-label">Sponsorship</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input others" id="others" name="financial_aid" value="option3">
                                <span class="custom-control-label">Others</span>
                              </label>
        </div>
</div>
<div class="form-group acc-no-input" style="display:none;" id="acc_no_input">
        <label for="" class="form-label">Please specify the account number</label>
        <input type="text" class="form-control" name="financial_aid_acc_no" id="financial_aid_acc_no" placeholder="">
        <p class="help-block">If comes from University/Faculty/Grant</p>
</div>
<div class="form-group sponsorship-input" style="display:none;" id="sponsorship_input">
        <label for="" class="form-label">Sponsorship? Please specify the name of sponsor</label>
        <input type="text" class="form-control" name="financial_aid_acc_no" id="financial_aid_acc_no" placeholder="Account No">
</div>
<div class="form-group others-input" style="display:none;" id="others_input">
        <label for="" class="form-label">Others? Please specify</label>
        <input type="text" class="form-control" name="financial_aid_acc_no" id="financial_aid_acc_no" placeholder="">
</div>