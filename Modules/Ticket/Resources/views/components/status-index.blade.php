@if($result->status == 1)
<span class="status-icon bg-warning"></span> Draft @elseif($result->status ==2)
<span class="status-icon bg-success"></span> Published @elseif($result->status ==3)
<span class="status-icon bg-primary"></span> Approved @elseif($result->status ==4)
<span class="status-icon bg-danger"></span> Rejected @endif