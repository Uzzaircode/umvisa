<?php 



function getApplicationStatusState($application){
    
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

function getApplicationStatusByName($s){
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

function totalSubmittedApplication($application){
    return $application->statuses->whereIn('name',['Submitted To Supervisor'])->count();
}
