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
<span class="status-icon bg-success"></span> Submitted to {{Auth::user()->hasRole('HOD')?'You':'HOD'}} 
@elseif($result->status == 3)
<span class="status-icon bg-primary"></span> Approved by {{Auth::user()->hasRole('HOD')?'You':'HOD'}} 
@elseif($result->status == 4)
<span class="status-icon bg-danger"></span> Rejected by {{Auth::user()->hasRole('HOD')?'You':'HOD'}}
@elseif($result->status == 5)
<span class="status-icon bg-green"></span> Submitted to {{Auth::user()->hasRole('Dasar')?'You':'Dasar'}}
@elseif($result->status == 6)
<span class="status-icon bg-primary"></span> Approved by {{Auth::user()->hasRole('Dasar')?'You':'Dasar'}}
@elseif($result->status == 7)
<span class="status-icon bg-danger"></span> Rejected by {{Auth::user()->hasRole('Dasar')?'You':'Dasar'}}
@elseif($result->status == 8)
<span class="status-icon bg-green"></span> Submitted to {{Auth::user()->hasRole('PTM')?'You':'PTM'}}
@elseif($result->status == 9)
<span class="status-icon bg-primary"></span> Approved by {{Auth::user()->hasRole('PTM')?'You':'PTM'}}
@elseif($result->status == 10)
<span class="status-icon bg-danger"></span> Rejected by {{Auth::user()->hasRole('PTM')?'You':'PTM'}}
@elseif($result->status == 11)
<span class="status-icon bg-success"></span> Read by {{Auth::user()->hasRole('HOD')?'You':'HOD'}}
@elseif($result->status == 12)
<span class="status-icon bg-success"></span> Read by {{Auth::user()->hasRole('Dasar')?'You':'Dasar'}}
@elseif($result->status == 13)
<span class="status-icon bg-success"></span> Read by {{Auth::user()->hasRole('PTM')?'You':'PTM'}}
@endif