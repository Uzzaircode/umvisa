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
                                <input type="text" class="form-control" placeholder="Start Date" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                </div>
                <div class="col">
                        <div class="input-group ">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fe fe-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="End Date" aria-label="Username" aria-describedby="basic-addon1">
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
                          <input type="radio" class="custom-control-input university" id="university" name="financial_aid" value="option1" onclick="showFinancialAidAccNoForm(this)">
                          <span class="custom-control-label">University</span>
                        </label>
                <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input faculty"  id ="faculty" name="financial_aid" value="option2" onclick="showFinancialAidAccNoForm(this)">
                          <span class="custom-control-label">Faculty</span>
                        </label>
                <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input grant" id="grant" name="financial_aid" value="option3" onclick="showFinancialAidAccNoForm(this)">
                          <span class="custom-control-label">Research Grant</span>
                        </label>
                <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" name="financial_aid" id="sponsorship" value="option3">
                <span class="custom-control-label">Sponsorship</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input others" id="others" name="financial_aid" value="option3">
                                <span class="custom-control-label">Others</span>
                              </label>
        </div>
</div>
<div class="form-group acc-no-input" style="display:none;" id="acc_no_input">
        <label for="" class="form-label">Please specify</label>
        <input type="text" class="form-control" name="financial_aid_acc_no" id="financial_aid_acc_no" placeholder="Account No">
        <p class="help-block">If comes from University/Faculty/Grant</p>
</div>