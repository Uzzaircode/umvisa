<?php 



function getApplicationStatusState($application){
    
    switch ($application->status) {
        case 'Draft':
        return $state = 'warning';
        break;

        case 'Submitted':
        return $state = 'success';
        break;

        case 'Read':
        return $state = 'info';
        break;

        case 'Rejected':
        return $state = 'danger';
        break;
    }
}
