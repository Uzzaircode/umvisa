@extends('backend.master') @section('content') 
{{--
// Status Codes
1  = Draft - yellow
2  = Submitted to HOD - green
3  = Approved by HOD - blue
4  = Rejected by HOD - red
5  = Submitted to Dasar - green
6  = Approved by Dasar - blue
7  = Rejected by Dasar - red
8  = Submitted to PTM - green
9  = Approved by PTM - blue
10 = Rejected by PTM -red

// Buttons  
1. approve_hod = Approve by HOD
2. reject_hod  = Reject by HOD
3. approve_dasar = Approve by Dasar
4. reject_dasar = Reject by Dasar
5. approve_ptm = Approve by PTM
6. reject_ptm = Reject by PTM  
--}}

<form action="{{route('tickets.approve', ['id'=>$ticket->id])}}" method="POST">
  {{csrf_field()}}
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fe fe-tag"></i> 
            {{$ticket->subject}} 
            @include('ticket::components.status')
          </h3>
          <div class="card-options">
            @include('ticket::components.approve-reject-buttons')
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
      @include('ticket::layouts.comments')
    </div>
  </div>
</form>
@endsection @include('asset-partials.selectize') @section('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<style>
  .card-options .btn:first-child {
    margin-right: 10px !important;
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