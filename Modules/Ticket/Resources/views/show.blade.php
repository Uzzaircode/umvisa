@extends('backend.master') 
@section('content')
<form action="{{route('tickets.approve', ['id'=>$ticket->id])}}" method="POST">
  {{csrf_field()}}  
<div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$ticket->subject}} 
                @include('ticket::components.status')
                </h3>
          <div class="card-options">
            @role('HOD')
            @if($ticket->status == 2)
            <button type="submit" name="approve" class="btn btn-md btn-success"><i class="fe fe-check-circle"></i> Approve</button>
            <button type="submit" name="reject" class="btn btn-md btn-danger"><i class="fe fe-x-circle"></i> Reject</button>  
            @endif 
            @endrole         
          </div>
        </div>
        <div class="card-body">
            <div class="invoice-w">                           
            <div class="invoice-body">
                <div class="invoice-desc">
                    <div class="desc-label"><h4>Ticket Created At</h4></div>
                    <div class="desc-value"><p>{{$ticket->created_at->toDayDateTimeString()}}</p></div>
                    <br>
                    <div class="desc-label"><h4>Ticket #</h4></div>
                    <div class="desc-value"><p>{{$ticket->ticket_number}}</p></div>
                    <br>
                    <div class="desc-label"><h4>Ticket Type</h4></div>
                    <div class="desc-value">{{ucwords($ticket->ticket_type)}}</div>
                    <br>
                    <div class="desc-label"><h4>Department</h4></div>
                    <div class="desc-value">{{$ticket->department->name}}</div>
                    <br>
                    <div class="desc-label"><h4>SAP Modules</h4></div>
                    <div class="desc-value">{{$ticket->sap->name}}</div>
                    @if($ticket->integration == 1)
                    <br>
                    <div class="desc-label"><h4>Application Integration</h4></div>
                    <div class="desc-value">{{$ticket->application->name}}</div>
                    @endif
                </div>
                <div>
                <h4>Issue</h4>
                <p>{{$ticket->body}}</p>
                <div style="padding-top:30px"></div>
                <h4>Ticket Attachments</h4>
                @if(isset($ticket))
                    @if($ticket->attachments->count() > 0)               
                    <div class="row gutters-sm" id="attachment">
                        @foreach($ticket->attachments as $t)             
                            <div class="col-6 col-sm-4" >
                            <a href="{{asset($t->path)}}" data-toggle="lightbox" data-gallery="attachment-gallery">
                                <img src="{{asset($t->path)}}" width="200px" class="img-fluid"> 
                            </a>                
                            </div>              
                        @endforeach
                    </div>                             
                    @endif
                @endif

                </div>                            
            </div>            
        </div>
        </div>
      </div>            
    
    </div>
    <div class="col-md-4" >
      <div class="card">
              @cardHeader 
              @slot('card_title')
              <i class="fe fe-message-circle"></i> Remarks @endslot 
              @endcardHeader 
              @cardBody   
              <div class="form-group" @if ($errors->has('replybody')) has-error @endif>
                  <label for="" class="form-label">Leave a remark</label>
              <textarea name="replybody" id="" cols="30" rows="5" class="form-control"></textarea>

                  @if ($errors->has('replybody'))
                  <p class="text-danger">{{ $errors->first('replybody') }}</p>
                  @endif
              </div>
              @if($ticket->status == 2 || $ticket->status == 3 || $ticket->status == 4)
              @can('add_replies')
              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-md" name="comment"><i class="fe fe-send"></i> Submit Comment</button>
              </div>
              @endcan
              @endif
              
              @isset($replies)
              <ul class="list-group list-card-group">
                  @foreach($replies as $reply)
                      <li class="list-group-item py-5">
                              <div class="media">
                                <div class="media-object avatar avatar-md mr-4" style="background-image: url({{asset($reply->user->profile->avatar)}})"></div>
                                <div class="media-body">
                                  <div class="media-heading">                                          
                                    <h5>{{$reply->user->name}}</h5>                                          
                                  </div>
                                  <div>
                                    {{$reply->body}}                                          
                                  </div>
                                  <small class="text-muted">{{$reply->created_at->toDayDateTimeString()}}</small>
                                </div>
                              </div>
                            </li>
                  @endforeach
              </ul>
              @endisset  
              @endcardBody
          </div>
</div>
</div>
</form>
@endsection
@include('asset-partials.selectize')
@section('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<style>
  .card-options  .btn:first-child{
    margin-right:10px !important;
  }
.invoice-w {  
  background: white;
  max-width: 800px;
  position: relative;
  overflow: hidden;
  /* padding: 100px; */
  padding-bottom: 20px;
}

.invoice-w:before {
  width: 140%;
  height: 450px;  
  position: absolute;
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
  margin-top: 1rem;
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
  /* font-size: 1.17rem; */
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
    
  .element-box .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls, .invoice-w .os-tabs-controls, .big-error-w .os-tabs-controls {
    margin-left: -1rem;
    margin-right: -1rem;
  }
}   
</style>
@endsection

@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>  
@endsection