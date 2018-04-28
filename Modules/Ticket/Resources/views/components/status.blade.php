@if($status == 1)
<a href="#" class="btn btn-warning btn-sm text-white">Draft</a>
@elseif($status == 2)
<a href="#" class="btn btn-success btn-sm text-white">Published</a>
@elseif($status == 3)
<a href="#" class="btn btn-success btn-sm text-white">Approved</a>
@elseif($status == 4)
<a href="#" class="btn btn-danger btn-sm text-white">Rejected</a>
@endif