{{--
    Status Code 
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
 
{{-- If the user is HOD and ticket has been submitted to HOD --}}
@role('HOD') 
@if($ticket->status == 2 || $ticket->status == 11)
<button type="submit" name="approve_hod" class="btn btn-sm btn-success">
    <i class="fe fe-check-circle"></i> Approve</button>
<button type="submit" name="reject_hod" class="btn btn-sm btn-danger">
    <i class="fe fe-x-circle"></i> Reject</button>
@endif
{{-- if have approved by HOD, make it submit to ptm --}}
@if($ticket->status == 3)
{{-- <button type="submit" name="submit_to_dasar" class="btn btn-sm btn-success">
    <i class="fe fe-send"></i> Submit to Dasar</button> --}}
@endif
@endrole

{{-- If the user is Dasar and ticket has been submitted to Dasar --}}
@role('Dasar') @if($ticket->status == 5 || $ticket->status == 12)
<button type="submit" name="approve_dasar" class="btn btn-sm btn-success">
    <i class="fe fe-check-circle"></i> Approve</button>
<button type="submit" name="reject_dasar" class="btn btn-sm btn-danger">
    <i class="fe fe-x-circle"></i> Reject</button>
@endif
{{-- if have approved by Dasar, make it submit to ptm --}}
@if($ticket->status == 6)
    {{-- <button type="submit" name="submit_to_ptm" class="btn btn-sm btn-success">
            <i class="fe fe-send"></i> Submit to PTM</button> --}}
@endif
@endrole

{{-- If the user is HPTM and ticket has been submitted to PTM --}}
@role('PTM') 
@if($ticket->status == 8 || $ticket->status == 13)
<button type="submit" name="approve_ptm" class="btn btn-sm btn-success">
    <i class="fe fe-check-circle"></i> Approve</button>
<button type="submit" name="reject_ptm" class="btn btn-sm btn-danger">
    <i class="fe fe-x-circle"></i> Reject</button>
@endif
@endrole