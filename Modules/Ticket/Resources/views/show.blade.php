@extends('backend.master') 
@section('content')
<div class="row">
    <div class="col-md-8">       
    <div class="invoice-w">                
            <div class="invoice-heading">
            <h3>{{$ticket->subject}} 
            @if($status == 1)    
                <a href="#" class="btn btn-warning btn-sm">Draft</a>
            @elseif($status == 2)
                <a href="#" class="btn btn-warning btn-sm">Draft</a>
            @endif
            </h3>
            <div class="invoice-date">{{$ticket->created_at}}</div>
            </div>
            <div class="invoice-body">
                <div class="invoice-desc">
                    <div class="desc-label"><h4>Invoice #</h4></div>
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
                    @if($ticket->attachments->count() > 1)               
                    <div class="row gutters-sm" id="attachment">
                        @foreach($ticket->attachments as $t)             
                            <div class="col-6 col-sm-4" >
                            <a href="{{asset($t->path)}}" data-toggle="lightbox" data-gallery="attachment-gallery">                 
                                <img src="{{asset($t->path)}}" width="100px" class="img-fluid"> 
                            </a>                
                            </div>              
                        @endforeach
                    </div>                             
                    @endif
                @endif

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<style>
.invoice-w {
  background-image: linear-gradient(to bottom, #ffffff, #fdfdff, #fbfbff, #f9f9ff, #f7f7ff);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>  
@endsection