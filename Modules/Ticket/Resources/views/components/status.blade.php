@if($status == 1)
<a href="#" class="btn btn-warning btn-sm">Draft</a>
@elseif($status == 2)
<a href="#" class="btn btn-success btn-sm">Published</a>
@elseif($status == 3)
<a href="#" class="btn btn-success btn-sm">Approved</a>
@elseif($status == 4)
<a href="#" class="btn btn-success btn-sm">Rejected</a>
@endif