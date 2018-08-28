<?php 

use Carbon\Carbon;
use Modules\Application\Entities\Application as App;

function getApplicationStatusState($application)
{
    switch ($application->status) {
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
