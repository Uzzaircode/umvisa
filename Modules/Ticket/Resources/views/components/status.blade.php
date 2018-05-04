{{-- 
 * 1  = Draft - yellow
 * 2  = Submitted to HOD - green
 * 3  = Approved by HOD - blue
 * 4  = Rejected by HOD - red
 * 5  = Submitted to Dasar - green
 * 6  = Approved by Dasar - blue
 * 7  = Rejected by Dasar - red
 * 8  = Submitted to PTM - green
 * 9  = Approved by PTM - blue
 * 10 = Rejected by PTM -red
  --}}

@if($ticket->status == 1)
<a href="#" class="btn btn-warning btn-sm text-white">Draft</a>
@elseif($ticket->status == 2)
<a href="#" class="btn btn-success btn-sm text-white">Submitted to HOD on {{$ticket->submitted_hod_date}}</a>
@elseif($ticket->status == 3)
<a href="#" class="btn btn-primary btn-sm text-white">{{Auth::user()->hasRole('HOD')?'You have approved this ticket':'Approved by HOD'}} on {{$ticket->approved_hod_date}}</a>
@elseif($ticket->status == 4)
<a href="#" class="btn btn-danger btn-sm text-white">{{Auth::user()->hasRole('HOD')?'You have rejected this ticket':'Rejected by HOD'}} on {{$ticket->rejected_hod_date}}</a>
@elseif($ticket->status == 5)
<a href="#" class="btn btn-success btn-sm text-white">{{Auth::user()->hasRole('Dasar')?'You have received this ticket':'Submitted to Dasar'}} on {{$ticket->submitted_dasar_date}}</a>
@elseif($ticket->status == 6)
<a href="#" class="btn btn-primary btn-sm text-white">{{Auth::user()->hasRole('Dasar')?'You have approved this ticket':'Approved by Dasar'}} on {{$ticket->approved_dasar_date}}</a>
@elseif($ticket->status == 7)
<a href="#" class="btn btn-danger btn-sm text-white">{{Auth::user()->hasRole('Dasar')?'You have rejected this ticket':'Rejected by Dasar'}} on {{$ticket->rejected_dasar_date}}</a>
@elseif($ticket->status == 8)
<a href="#" class="btn btn-success btn-sm text-white">{{Auth::user()->hasRole('PTM')?'You have received this ticket':'Submitted to PTM'}} on {{$ticket->submitted_ptm_date}}</a>
@elseif($ticket->status == 9)
<a href="#" class="btn btn-primary btn-sm text-white">{{Auth::user()->hasRole('PTM')?'You have approved this ticket':'Approved by PTM'}} on {{$ticket->approved_ptm_date}}</a>
@elseif($ticket->status == 10)
<a href="#" class="btn btn-danger btn-sm text-white">{{Auth::user()->hasRole('PTM')?'You have rejected this ticket':'Rejected by PTM'}} on {{$ticket->rejected_ptm_date}}</a>
@endif
