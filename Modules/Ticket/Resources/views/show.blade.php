@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-8">
        {{-- Start Form --}} 
    @if(isset($ticket->id))
    <form action="{{route('tickets.update',['id'=>$ticket->id])}}" class="card" method="POST" enctype="multipart/form-data">
        {{method_field('PUT')}}
    @else
    <form action="{{route('tickets.store')}}" class="card" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
            @cardHeader
    @slot('card_title')<i class="fe fe-tag"></i> {{isset($ticket) ? 'Edit Ticket':'New Ticket'}}  
    @endslot
    <div class="card-options">           
    <button class="btn btn-sm btn-primary"># {{isset($ticket) ? $ticket->ticket_number:$ticket_rn}}
    </button>       
    </div>
            @endcardHeader                
        @cardBody                                           
        <div class="form-group"  @if ($errors->has('subject')) has-error @endif>
                <label for="" class="form-label">Subject</label>
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                @if(!isset($ticket))
                <input type="hidden" name="ticket_number" value="{{isset($ticket) ? $ticket->ticket_number:$ticket_rn}}">
                @endif
                <input type="text" class="form-control" name="subject" value="{{old('subject',$ticket->subject ?? null)}}" readonly>
                @if ($errors->has('subject'))
                        <p class="text-danger">{{ $errors->first('subject') }}</p> 
                    @endif   
        </div>
            <div class="form-group"  @if ($errors->has('body')) has-error @endif>
                    <label for="" class="form-label">Issue</label>
            <textarea name="body" id="" cols="30" rows="5" class="form-control" readonly>{{old('body',$ticket->body ?? null)}}</textarea> 
            @if ($errors->has('body'))
                        <p class="text-danger">{{ $errors->first('body') }}</p> 
                    @endif                 
            </div>
            <div class="form-group"  @if ($errors->has('name')) has-error @endif>
                    <label for="" class="form-label">Attachments</label>
                <input type="file" class="" name="files[]" multiple disabled>
                    @if ($errors->has('files'))
                        <p class="text-danger">{{ $errors->first('files') }}</p> 
                    @endif            
            </div>
            @if(isset($ticket))
            @if($ticket->attachments->count() > 1)
                <div class="form-group">
                    <label for="" class="form-label">Attached Files</label>
                    <div class="row gutters-sm" id="attachment">
                        @foreach($ticket->attachments as $t)             
                            <div class="col-6 col-sm-4" >
                        <a href="{{asset($t->path)}}" data-effect="mfp-move-from-top">                  
                            <img src="{{asset($t->path)}}" class="img-fluid"> 
                        </a>                
                            </div>              
                        @endforeach
                    </div>             
                </div>
            @endif
            @endif
            <div class="form-group"  @if ($errors->has('dept_id')) has-error @endif>
                    <label for="" class="form-label">Department</label>
            <select name="dept_id" id="" class="form-control selectize" placeholder="Select department" disabled>
                    @foreach($depts as $dept)                                    
                        <option value="{{$dept->id}}" 
                                @if(isset($ticket))
                                     {{$ticket->dept_id == $dept->id ? 'selected':'' }}    
                                @endif
                        >
                            {{$dept->name}}
                        </option>
                    @endforeach            
            </select>                                               
                    @if ($errors->has('dept_id'))
                    <p class="text-danger">{{ $errors->first('dept_id') }}</p> 
                    @endif            
            </div>
            <div class="form-group"  @if ($errors->has('sap_id')) has-error @endif>
                    <label for="" class="form-label">SAP Modules</label>
            <select name="sap_id" id="" class="form-control selectize" disabled>
                @foreach($sap_users as $sap)
            <option value="{{$sap->id}}"
                @if(isset($ticket))
                    {{$ticket->sap->id == $sap->id ? 'selected':''}}
                @endif                
                >{{$sap->name}}</option>
                @endforeach                    
            </select>                    
                    @if ($errors->has('saps'))
                    <p class="text-danger">{{ $errors->first('saps') }}</p> @endif            
            </div>
            <div class="form-group">                 
                <label for="" class="form-label">Integration with another application?</label>
                <select name="sap_integration" id="" onchange="showDiv(this)" class="form-control selectize" placeholder="Please select" disabled>
                        <option value="">Please Select</option>
                <option value="1" {{isset($ticket) && $ticket->integration == 1 ? 'selected':''}}>Yes</option>
                        <option value="0" {{isset($ticket) && $ticket->integration == 0 ? 'selected':''}}>No</option>
                    </select>
              </div> 
             
            <div class="form-group"  @if ($errors->has('application_id')) has-error @endif>
                    <label for="" class="form-label">Applications</label>

                <select name="application_id" id="app_id" class="form-control selectize" placeholder="Select the application">
                    @foreach($apps as $app) 
                <option value="{{$app->id}}" {{isset($ticket) && $ticket->application_id == $app->id ? 'selected':''}}>{{$app->name}}</option> 
                    @endforeach 
                </select>
                @if ($errors->has('application_id'))
                        <p class="text-danger">{{ $errors->first('application_id') }}</p> 
                @endif                 
            </div>
            
            <div class="form-group"  @if ($errors->has('ticket_type')) has-error @endif>
                    <label for="" class="form-label">Ticket Type</label>
                <select name="ticket_type" id="" class="form-control selectize" onchange="showRecurring(this)" disabled>
                <option value="new" {{isset($ticket) && $ticket->ticket_type == 'new' ? 'selected':''}}>{{ucwords('new')}}</option>
                    <option value="open" {{isset($ticket) && $ticket->ticket_type == 'open' ? 'selected':''}}>{{ucwords('open')}}</option>
                    <option value="pending" {{isset($ticket) && $ticket->ticket_type == 'pending' ? 'selected':''}}>{{ucwords('pending')}}</option>
                    <option value="recurring" {{isset($ticket) && $ticket->ticket_type == 'recurring' ? 'selected':''}}>{{ucwords('recurring')}}</option>
                </select>
                @if ($errors->has('ticket_type'))
                        <p class="text-danger">{{ $errors->first('ticket_type') }}</p> 
                @endif 
            </div>
            <div id="old_ticket" class="form-group">
                <label for="" class="form-label">Which Ticket as recurring issue?</label>
                <select name="recurring_ticket_id" id="" class="form-control selectize">
                @foreach($user_tickets as $t)
                <option value="{{$t->id}}" {{isset($ticket) && $t->id == $ticket->recurring_ticket_id ? 'selected':''}}>{{$t->subject}}</option>
                @endforeach
                </select>
            </div>            
        @endcardBody
    </form>
    <div class="invoice-w">                
            <div class="invoice-heading">
                <h3>Invoice</h3>
                <div class="invoice-date">22 December 2017</div>
            </div>
            <div class="invoice-body">
                <div class="invoice-desc">
                    <div class="desc-label">Invoice #</div>
                    <div class="desc-value">HSFB 342823</div>
                </div>
                <div class="invoice-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Qty</th>
                                <th class="text-right">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>User Interface</td>
                                <td>2</td>
                                <td class="text-right">$4,500</td>
                            </tr>
                            <tr>
                                <td>Framework Development</td>
                                <td>4</td>
                                <td class="text-right">$9,750</td>
                            </tr>
                            <tr>
                                <td>Widgets and Plugins</td>
                                <td>1</td>
                                <td class="text-right">$1,240</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td class="text-right" colspan="2">$15,490</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="terms">
                        <div class="terms-header">Terms and Conditions</div>
                        <div class="terms-content">Should be paid as soon as received, otherwise a 5% penalty fee is applied</div>
                    </div>
                </div>
            </div>
            <div class="invoice-footer">
                <div class="invoice-logo">
                    <img alt="" src="img/logo.png">
                    <span>Paper Inc</span>
                </div>
                <div class="invoice-info">
                    <span>hello@paper.inc</span>
                    <span>858.757.4455</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
          @can('add_replies')  
            @include('ticket::reply')
          @endcan
    </div>
</div>
@endsection
@include('asset-partials.selectize')
@section('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
<style>
.mfp-move-from-top {
  /* start state */
  /* animate in */
  /* animate out */
}
.mfp-move-from-top .mfp-content {
  vertical-align: top;
}
.mfp-move-from-top .mfp-with-anim {
  opacity: 0;
  transition: all 0.2s;
  transform: translateY(-100px);
}
.mfp-move-from-top.mfp-bg {
  opacity: 0;
  transition: all 0.2s;
}
.mfp-move-from-top.mfp-ready .mfp-with-anim {
  opacity: 1;
  transform: translateY(0);
}
.mfp-move-from-top.mfp-ready.mfp-bg {
  opacity: 0.8;
}
.mfp-move-from-top.mfp-removing .mfp-with-anim {
  transform: translateY(-50px);
  opacity: 0;
}
.mfp-move-from-top.mfp-removing.mfp-bg {
  opacity: 0;
}
    .invoice-w {
        background-image: linear-gradient(to bottom, #ffffff, #dcdbde, #b9b9bd, #97979e, #777780);
  max-width: 800px;
  position: relative;
  overflow: hidden;
  padding: 100px;
  padding-bottom: 20px;
}

.invoice-w:before {
  width: 140%;
  height: 450px;  
  position: absolute;
  content: "";
  z-index: 1;
}

.invoice-w .infos {
  position: relative;
  z-index: 2;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.invoice-w .infos .info-1 {
  font-size: 1.08rem;
}

.invoice-w .infos .info-1 .company-name {
  font-size: 2.25rem;
  margin-bottom: 0.5rem;
  margin-top: 10px;
}

.invoice-w .infos .info-1 .company-extra {
  font-size: 0.81rem;
  color: rgba(0, 0, 0, 0.4);
  margin-top: 1rem;
}

.invoice-w .infos .info-2 {
  padding-top: 140px;
  text-align: right;
}

.invoice-w .infos .info-2 .company-name {
  margin-bottom: 1rem;
  font-size: 1.26rem;
}

.invoice-w .infos .info-2 .company-address {
  color: rgba(0, 0, 0, 0.6);
}

.invoice-w .terms {
  font-size: 0.81rem;
  margin-top: 2.5rem;
}

.invoice-w .terms .terms-header {
  font-size: 0.9rem;
  margin-bottom: 10px;
}

.invoice-w .terms .terms-content {
  color: rgba(0, 0, 0, 0.4);
}

.invoice-table thead th {
  border-bottom: 2px solid #333;
}

.invoice-table tbody tr td {
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.invoice-table tbody tr:last-child td {
  padding-bottom: 40px;
}

.invoice-table tfoot tr td {
  border-top: 3px solid #333;
  font-size: 1.26rem;
}

.invoice-heading {
  margin-bottom: 4rem;
  margin-top: 3rem;
  position: relative;
  z-index: 2;
}

.invoice-heading h3 {
  margin-bottom: 0px;
}

.invoice-footer {
  padding-top: 1rem;
  padding-bottom: 1rem;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin-top: 6rem;
}

.invoice-footer .invoice-logo img {
  vertical-align: middle;
  height: 20px;
  width: auto;
  display: inline-block;
}

.invoice-footer .invoice-logo span {
  vertical-align: middle;
  margin-left: 10px;
  display: inline-block;
}

.invoice-footer .invoice-info span {
  display: inline-block;
}

.invoice-footer .invoice-info span + span {
  margin-left: 1rem;
  padding-left: 1rem;
  border-left: 1px solid rgba(0, 0, 0, 0.1);
}

.invoice-body {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.invoice-body .invoice-desc {
  -webkit-box-flex: 0;
      -ms-flex: 0 1 250px;
          flex: 0 1 250px;
  font-size: 1.17rem;
}
@media (max-width: 1250px) {
  .element-box, .invoice-w, .big-error-w, .invoice-w, .big-error-w {
    padding: 1rem 1.5rem;
  }
  .element-box .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls {
    margin-left: -1.5rem;
    margin-right: -1.5rem;
  }
}
@media (max-width: 1024px) {
  .invoice-w {
    padding: 50px;
  }
}
@media (min-width: 768px) and (max-width: 1024px) {
    .element-box, .invoice-w, .big-error-w, .invoice-w, .big-error-w {
    padding: 1rem 1rem;
  }
  .element-box .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls {
    margin-left: -1rem;
    margin-right: -1rem;
  }
}
.element-box, .invoice-w, .big-error-w, .invoice-w, .big-error-w {
    padding: 1rem 1rem;
  }
  .element-box .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls {
    margin-left: -1rem;
    margin-right: -1rem;
  }
  .invoice-w {
    padding: 30px;
  }
</style>
@endsection

@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
// Image popups
$('#attachment').magnificPopup({
  delegate: 'a',
  type: 'image',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
    beforeOpen: function() {
      // just a hack that adds mfp-anim class to markup 
       this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  }
});    
</script> 
  <script type="text/javascript">
  $(document).ready(function(){
    $('#app_id')[0].selectize.disable();
    @if(isset($ticket) && !empty($ticket->recurring_ticket_id))
        $('#old_ticket').show();
    @else
        $('#old_ticket').hide();
    @endif    
  });
  </script>
  <script type="text/javascript">
    function showDiv(elem){
   if(elem.value == 1){
    $('#app_id')[0].selectize.enable();
    }else{
  $('#app_id')[0].selectize.disable();
}
}
function showRecurring(elem){
    if(elem.value == 'recurring'){
        $('#old_ticket').show();
    }else{
        $('#old_ticket').hide();
    }
}
</script>
@endsection