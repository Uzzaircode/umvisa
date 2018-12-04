<?php 

use Carbon\Carbon;
use Modules\Application\Entities\Application;

function getApplicationStatusState($application)
{
    switch ($application->status) {
        case 'Draft':
        return $state = 'success';
        break;

        case 'Submitted To Supervisor':
        return $state = 'success';
        break;

        case 'Submitted To Deputy Dean':
        return $state = 'success';
        break;

        case 'Read':
        return $state = 'info';
        break;

        case 'Approved':
        return $state = 'success';
        break;

        case 'Rejected':
        return $state = 'danger';
        break;
    }
}

function getApplicationStatusByName($s)
{
    switch ($s->name) {
        case 'Draft':
        return $state = 'warning';
        break;

        case 'Submitted To Supervisor':
        return $state = 'success';
        break;

        case 'Submitted To Deputy Dean':
        return $state = 'success';
        break;

        case 'Read':
        return $state = 'info';
        break;

        case 'Approved':
        return $state = 'success';
        break;

        case 'Rejected':
        return $state = 'danger';
        break;
    }
}

function totalSubmittedApplication($application)
{
    return $application->statuses->whereIn('name', ['Submitted To Supervisor'])->count();
}

function setDateObject($value){
    return Carbon::createFromFormat(config('app.date_format'),$value)->format('Y-m-d');
}

function getDiffDays($df,$dt){
    return Carbon::parse($df)->diffInDays(Carbon::parse($dt));
}
function getEventTotalDays($application)
{
   $df = setDateObject($application->event_start_date);
   $dt = setDateObject($application->event_end_date);
   return getDiffDays($df,$dt);
}

function getTravelTotalDays($application){
    $df = setDateObject($application->travel_start_date);
    $dt = setDateObject($application->travel_end_date);
    return getDiffDays($df,$dt);
}

function getApplicationRunningNumber($application){    
    $year = Carbon::parse($application->created_at)->format('Y');
    $month = Carbon::parse($application->created_at)->format('m');
    $running_number = $year.'/'.$month;
    return $running_number;

}
// <br><b>Please provide valid reasons supporting this late submission in the text box above. Don\'t forget to click the Submit Remark button.</b>