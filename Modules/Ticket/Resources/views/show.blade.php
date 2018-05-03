@extends('backend.master') @section('content')
<form action="{{route('tickets.approve', ['id'=>$ticket->id])}}" method="POST">
  {{csrf_field()}}
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fe fe-tag"></i> {{$ticket->subject}} @include('ticket::components.status')
          </h3>
          <div class="card-options">
            @role('HOD') @if($ticket->status == 2)
            <button type="submit" name="approve" class="btn btn-md btn-success">
              <i class="fe fe-check-circle"></i> Approve</button>
            <button type="submit" name="reject" class="btn btn-md btn-danger">
              <i class="fe fe-x-circle"></i> Reject</button>
            @endif @endrole
          </div>
        </div>
        <div class="card-body">
          <table class="card-table table table-bordered">
            <tr>
              <td class="font-weight-bold">Ticket #</td>
              <td>{{$ticket->ticket_number}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Subject</td>
              <td>{{$ticket->subject}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Ticket Created At</td>
              <td>{{$ticket->created_at->toDayDateTimeString()}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Ticket Type</td>
              <td>{{ucwords($ticket->ticket_type)}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Department</td>
              <td>{{$ticket->department->name}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">SAP Modules</td>
              <td>{{$ticket->sap->name}}</td>
            </tr>
            @if($ticket->integration == 1)
            <tr>
              <td class="font-weight-bold">App Integration?</td>
              <td>{{$ticket->integration == 1 ? 'Yes':'No'}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">App Name</td>
              <td>{{$ticket->application->name}}</td>
            </tr>
            @endif
            <tr>
              <td colspan="2" class="text-center font-weight-bold">Issue</td>
            </tr>
            <tr>
              <td colspan="2">
                {{$ticket->body}}
              </td>
            </tr>
            @if(isset($ticket)) @if($ticket->attachments->count() > 0)
            <tr>
              <td colspan="2" class="font-weight-bold">Attachments</td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="row gutters-sm" id="attachment">
                  @foreach($ticket->attachments as $t)
                  <div class="col-6 col-sm-4">
                    <a href="{{asset($t->path)}}" data-toggle="lightbox" data-gallery="attachment-gallery">
                      <img src="{{asset($t->path)}}" width="200px" class="img-fluid">
                    </a>
                  </div>
                  @endforeach
                </div>
              </td>
            </tr>
            @endif @endif
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="card">
        @cardHeader @slot('card_title')
        <i class="fe fe-message-circle"></i> Remarks @endslot @endcardHeader @cardBody
        <div class="form-group" @if ($errors->has('replybody')) has-error @endif>
          <label for="" class="form-label">Leave a remark</label>
          <textarea name="replybody" id="" cols="30" rows="5" class="form-control"></textarea>
          @if ($errors->has('replybody'))
          <p class="text-danger">{{ $errors->first('replybody') }}</p>
          @endif
        </div>
        @if($ticket->status == 2 || $ticket->status == 3 || $ticket->status == 4) @can('add_replies')
        <div class="form-group text-right">
          <button type="submit" class="btn btn-primary btn-md" name="comment">
            <i class="fe fe-send"></i> Submit Comment</button>
        </div>
        @endcan @endif @isset($replies)
        <div class="o-auto" style="{{$replies->count() > 3 ? 'height:17rem':''}}">
          <ul class="list-group list-card-group">
            @foreach($replies as $reply)
            <li class="list-group-item py-5">
              <div class="media">
                <div class="media-object avatar avatar-md mr-4" style="background-image: url({{asset($reply->user->profile->avatar)}})"></div>
                <div class="media-body">
                  <div class="media-heading">
                    <small class="float-right text-muted">{{$reply->created_at->toDayDateTimeString()}}</small>
                    <h5>{{$reply->user->name}}</h5>
                  </div>
                  <br>
                  <div>
                    {{$reply->body}}
                  </div>

                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
        @endisset @endcardBody
      </div>
    </div>
  </div>
</form>
@endsection @include('asset-partials.selectize') @section('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<style>
  .card-options .btn:first-child {
    margin-right: 10px !important;
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

  .invoice-footer .invoice-info span+span {
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
    .element-box,
    .invoice-w,
    .big-error-w,
    .invoice-w,
    .big-error-w {
      padding: 1rem 1.5rem;
    }
    .element-box .os-tabs-controls,
    .invoice-w .os-tabs-controls,
    .big-error-w .os-tabs-controls,
    .invoice-w .os-tabs-controls,
    .big-error-w .os-tabs-controls {
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

    .element-box .os-tabs-controls,
    .invoice-w .os-tabs-controls,
    .big-error-w .os-tabs-controls,
    .invoice-w .os-tabs-controls,
    .big-error-w .os-tabs-controls {
      margin-left: -1rem;
      margin-right: -1rem;
    }
  }
</style>
@endsection @section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script>
  $(document).on('click', '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
</script>
@endsection