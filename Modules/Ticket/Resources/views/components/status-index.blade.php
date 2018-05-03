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

@if($result->status == 1)
<span class="status-icon bg-warning"></span> Draft 
@elseif($result->status == 2)
<span class="status-icon bg-success"></span> Submitted to HOD 
@elseif($result->status == 3)
<span class="status-icon bg-primary"></span> Approved by HOD 
@elseif($result->status == 4)
<span class="status-icon bg-danger"></span> Rejected by HOD 
@endif