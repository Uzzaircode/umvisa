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

@if($status == 1)
<a href="#" class="btn btn-warning btn-sm text-white">Draft</a>
@elseif($status == 2)
<a href="#" class="btn btn-success btn-sm text-white">Submitted to HOD on {{$ticket->submitted_hod_date->toDayDateTimeString()}}</a>
@elseif($status == 3)
<a href="#" class="btn btn-primary btn-sm text-white">Approved by HOD</a>
@elseif($status == 4)
<a href="#" class="btn btn-danger btn-sm text-white">Rejected by HOD</a>
@endif